@extends('site.layout.cha-casa-nova')

@section('title', $event->name)

@section('content')
<div style="padding:8rem 1.5rem 3rem;max-width:900px;margin:0 auto;">
    <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2.5rem,6vw,4rem);line-height:1;color:var(--branco);margin-bottom:1rem;">{{ $event->name }}</h1>
    <p style="color:var(--muted);margin-bottom:2rem;">Bem-vindo ao evento. Use os atalhos abaixo para confirmar presenca e acessar lista de presentes.</p>

    <div style="display:flex;gap:.8rem;flex-wrap:wrap;">
        <a class="btn-amarelo" href="{{ route('site.eventos.confirmacao', $event) }}">Confirmar presenca</a>
        <a class="btn-ghost" href="{{ route('site.eventos.presentes', $event) }}">Lista de presentes</a>
        <a class="btn-ghost" href="{{ route('site.eventos.obrigado', $event) }}">Confirmados</a>
    </div>
</div>
@endsection
