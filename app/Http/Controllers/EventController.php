<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();

        return view('dashboard.eventos-index', [
            'events' => $events,
            'totalEvents' => $events->count(),
            'activeEvents' => (int) $events->where('is_active', true)->count(),
            'inactiveEvents' => (int) $events->where('is_active', false)->count(),
        ]);
    }

    public function create()
    {
        return view('dashboard.eventos-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:120'],
            'style_css' => ['nullable', 'file', 'mimes:css', 'max:2048'],
            'layout_blade' => ['nullable', 'file', 'mimetypes:text/plain,text/x-php,application/octet-stream', 'max:5120'],
            'page_blade' => ['nullable', 'file', 'mimetypes:text/plain,text/x-php,application/octet-stream', 'max:5120'],
        ]);

        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 2;

        while (Event::query()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $event = Event::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'is_active' => true,
        ]);

        $this->handleTemplateUploads($request, $event);

        return redirect()->route('dashboard.eventos.show', $event)
            ->with('success', 'Evento cadastrado com sucesso.');
    }

    public function show(Event $event)
    {
        $event->load(['guests', 'gifts']);

        return view('dashboard.eventos-show', [
            'event' => $event,
            'guests' => $event->guests()->latest()->get(),
            'gifts' => $event->gifts()->latest()->get(),
            'totalGuests' => $event->guests()->count(),
            'totalCompanions' => (int) $event->guests()->sum('companions_count'),
            'totalGifts' => $event->gifts()->count(),
            'receivedGifts' => (int) $event->gifts()->where('received', true)->count(),
        ]);
    }

    public function edit(Event $event)
    {
        return view('dashboard.eventos-edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:120'],
            'is_active' => ['nullable', 'boolean'],
            'style_css' => ['nullable', 'file', 'mimes:css', 'max:2048'],
            'layout_blade' => ['nullable', 'file', 'mimetypes:text/plain,text/x-php,application/octet-stream', 'max:5120'],
            'page_blade' => ['nullable', 'file', 'mimetypes:text/plain,text/x-php,application/octet-stream', 'max:5120'],
        ]);

        $event->update([
            'name' => $validated['name'],
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->handleTemplateUploads($request, $event);

        return redirect()->route('dashboard.eventos.show', $event)
            ->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('dashboard.eventos.index')
            ->with('success', 'Evento excluido com sucesso.');
    }

    private function handleTemplateUploads(Request $request, Event $event)
    {
        $baseDir = 'eventos/' . $event->slug;

        if ($request->hasFile('style_css')) {
            $stylePath = $request->file('style_css')->storeAs($baseDir, 'style.css', 'public');
            $event->style_path = $stylePath;
        }

        if ($request->hasFile('layout_blade')) {
            $layoutContent = file_get_contents($request->file('layout_blade')->getRealPath());
            $layoutView = 'site.layout.evento-' . $event->slug;
            $layoutFilePath = resource_path('views/site/layout/evento-' . $event->slug . '.blade.php');
            file_put_contents($layoutFilePath, $layoutContent);
            $event->layout_view = $layoutView;
        }

        if ($request->hasFile('page_blade')) {
            $pageContent = file_get_contents($request->file('page_blade')->getRealPath());
            $landingView = 'site.eventos.page-' . $event->slug;
            $pageFilePath = resource_path('views/site/eventos/page-' . $event->slug . '.blade.php');
            if (!is_dir(dirname($pageFilePath))) {
                mkdir(dirname($pageFilePath), 0755, true);
            }
            file_put_contents($pageFilePath, $pageContent);
            $event->landing_view = $landingView;
        }

        $event->save();
    }
}
