<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EventPublicController extends Controller
{
    private function resolveEvent($event)
    {
        if ($event instanceof Event) {
            return $event;
        }

        return Event::query()->where('slug', (string) $event)->firstOrFail();
    }

    public function landing($event)
    {
        $event = $this->resolveEvent($event);
        $this->ensureActive($event);

        $view = $event->landing_view ?: 'site.eventos.default-landing';

        if (!View::exists($view)) {
            $view = 'site.eventos.default-landing';
        }

        return view($view, [
            'event' => $event,
        ]);
    }

    public function confirmationForm($event)
    {
        $event = $this->resolveEvent($event);
        $this->ensureActive($event);

        return view('site.eventos.confirmacao', [
            'event' => $event,
        ]);
    }

    public function confirm(Request $request, $event)
    {
        $event = $this->resolveEvent($event);
        $this->ensureActive($event);

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'min:3', 'max:120', 'regex:/^\S+\s+.+$/u'],
            'companions_count' => ['required', 'integer', 'between:0,10'],
        ], [
            'full_name.regex' => 'Informe nome e sobrenome.',
        ]);

        $event->guests()->create($validated);

        return redirect()->route('site.eventos.obrigado', $event)
            ->with('success', 'Presenca confirmada com sucesso. Obrigado!');
    }

    public function thanks($event)
    {
        $event = $this->resolveEvent($event);
        $this->ensureActive($event);

        return view('site.eventos.obrigado', [
            'event' => $event,
            'guests' => $event->guests()->orderBy('full_name')->get(),
        ]);
    }

    public function gifts($event)
    {
        $event = $this->resolveEvent($event);
        $this->ensureActive($event);

        $presentes = $event->gifts()->orderBy('received')->orderBy('category')->orderBy('name')->get();

        return view('site.eventos.lista-de-presentes', [
            'event' => $event,
            'presentes' => $presentes,
            'categorias' => $presentes->pluck('category')->filter()->unique()->values(),
            'whatsNumber' => '556293625728',
        ]);
    }

    private function ensureActive(Event $event)
    {
        if (!$event->is_active) {
            abort(404);
        }
    }
}
