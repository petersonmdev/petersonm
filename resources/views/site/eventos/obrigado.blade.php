@extends('site.layout.cha-casa-nova')

@section('title', 'Confirmados · ' . $event->name)

@section('content')
<div style="padding:8rem 1.5rem 3rem;max-width:900px;margin:0 auto;">
    <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2.2rem,5vw,3.6rem);margin-bottom:1rem;">Confirmados</h1>

    <div style="display:grid;gap:.6rem;">
        @forelse($guests as $guest)
            <div style="padding:.8rem 1rem;border:1px solid rgba(245,196,0,.16);background:rgba(255,255,255,.02);display:flex;justify-content:space-between;">
                <span>{{ $guest->full_name }}</span>
                <span style="color:var(--muted);">{{ $guest->companions_count == 0 ? 'Sozinho(a)' : '+' . $guest->companions_count . ' acompanhante(s)' }}</span>
            </div>
        @empty
            <p style="color:var(--muted);">Nenhuma confirmacao ainda.</p>
        @endforelse
    </div>
</div>
@endsection
