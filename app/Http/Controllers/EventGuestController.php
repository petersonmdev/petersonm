<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventGuest;
use Illuminate\Http\Request;

class EventGuestController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'min:3', 'max:120', 'regex:/^\S+\s+.+$/u'],
            'companions_count' => ['required', 'integer', 'between:0,10'],
        ], [
            'full_name.regex' => 'Informe nome e sobrenome.',
        ]);

        $event->guests()->create($validated);

        return back()->with('success', 'Convidado confirmado com sucesso.');
    }

    public function destroy(Event $event, EventGuest $guest)
    {
        if ((int) $guest->event_id !== (int) $event->id) {
            abort(404);
        }

        $guest->delete();

        return back()->with('success', 'Confirmacao excluida com sucesso.');
    }
}
