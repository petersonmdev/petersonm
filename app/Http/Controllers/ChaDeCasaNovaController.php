<?php

namespace App\Http\Controllers;

use App\ChaDeCasaNovaGuest;
use Illuminate\Http\Request;

class ChaDeCasaNovaController extends Controller
{
    public function landing()
    {
        return view('site.cha-de-casa-nova');
    }

    public function confirmationForm()
    {
        return view('site.cha-de-casa-nova-confirmacao');
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'min:3', 'max:120', 'regex:/^\S+\s+.+$/u'],
            'companions_count' => ['required', 'integer', 'between:0,5'],
        ], [
            'full_name.regex' => 'Informe nome e sobrenome.',
        ]);

        ChaDeCasaNovaGuest::create($validated);

        return redirect()->route('site.cha-de-casa-nova-obrigado')
            ->with('success', 'Presenca confirmada com sucesso. Obrigado!');
    }

    public function thanks()
    {
        $guests = ChaDeCasaNovaGuest::orderBy('full_name')->get();

        return view('site.cha-de-casa-nova-obrigado', [
            'guests' => $guests,
        ]);
    }

    public function gifts()
    {
        return view('site.cha-de-casa-nova-lista-de-presentes');
    }

    public function dashboard()
    {
        $guests = ChaDeCasaNovaGuest::latest()->get();

        return view('dashboard.cha-de-casa-nova-convidados', [
            'guests' => $guests,
            'totalGuests' => $guests->count(),
            'totalCompanions' => (int) $guests->sum('companions_count'),
        ]);
    }

    public function destroy(ChaDeCasaNovaGuest $guest)
    {
        $guest->delete();

        return redirect()->route('dashboard.cha-de-casa-nova-convidados')
            ->with('success', 'Confirmacao excluida com sucesso.');
    }
}
