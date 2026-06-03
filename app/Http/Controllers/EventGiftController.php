<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventGift;
use Illuminate\Http\Request;

class EventGiftController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $event->gifts()->create($this->validateGiftData($request));

        return back()->with('success', 'Presente cadastrado com sucesso.');
    }

    public function update(Request $request, Event $event, EventGift $gift)
    {
        if ((int) $gift->event_id !== (int) $event->id) {
            abort(404);
        }

        $gift->update($this->validateGiftData($request));

        return back()->with('success', 'Presente atualizado com sucesso.');
    }

    public function destroy(Event $event, EventGift $gift)
    {
        if ((int) $gift->event_id !== (int) $event->id) {
            abort(404);
        }

        $gift->delete();

        return back()->with('success', 'Presente excluido com sucesso.');
    }

    private function validateGiftData(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'category' => ['required', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:2000'],
            'received' => ['nullable', 'boolean'],
            'gifted_by' => ['nullable', 'string', 'max:255', 'required_if:received,1'],
        ], [
            'gifted_by.required_if' => 'Informe quem presenteou quando o item estiver marcado como recebido.',
        ]);

        $validated['received'] = $request->boolean('received');

        if (!$validated['received']) {
            $validated['gifted_by'] = null;
        }

        return $validated;
    }
}
