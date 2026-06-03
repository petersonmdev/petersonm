@extends('site.layout.cha-casa-nova')

@section('title', 'Confirmacao · ' . $event->name)

@section('content')
<div style="padding:8rem 1.5rem 3rem;max-width:720px;margin:0 auto;">
    <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2.2rem,5vw,3.6rem);margin-bottom:1rem;">Confirmar presenca</h1>

    @if(session('success'))
        <div style="padding:1rem;background:rgba(0,168,79,.12);border:1px solid rgba(0,168,79,.35);margin-bottom:1rem;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="padding:1rem;background:rgba(200,16,46,.12);border:1px solid rgba(200,16,46,.35);margin-bottom:1rem;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('site.eventos.confirmacao.store', $event) }}">
        @csrf
        <div style="margin-bottom:1rem;">
            <label>Nome completo</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}" required style="width:100%;padding:.8rem;">
        </div>
        <div style="margin-bottom:1rem;">
            <label>Acompanhantes</label>
            <input type="number" name="companions_count" min="0" max="10" value="{{ old('companions_count', 0) }}" required style="width:100%;padding:.8rem;">
        </div>
        <button type="submit" class="btn-amarelo">Confirmar</button>
    </form>
</div>
@endsection
