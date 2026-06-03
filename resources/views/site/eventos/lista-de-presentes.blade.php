@extends('site.layout.cha-casa-nova')

@section('title', 'Lista de presentes · ' . $event->name)

@section('content')
<div style="padding:8rem 1.5rem 3rem;max-width:1000px;margin:0 auto;">
    <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2.2rem,5vw,3.6rem);margin-bottom:1rem;">Lista de presentes</h1>

    <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1rem;">
        <button class="f-btn on" data-f="all">Todos · {{ $presentes->count() }}</button>
        @foreach($categorias as $categoria)
            <button class="f-btn" data-f="{{ \Illuminate\Support\Str::slug($categoria) }}">{{ $categoria }}</button>
        @endforeach
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:.8rem;" id="grid">
        @forelse($presentes as $presente)
            <div class="gift-card" data-cat="{{ \Illuminate\Support\Str::slug($presente->category) }}" style="border:1px solid rgba(245,196,0,.16);padding:1rem;background:rgba(255,255,255,.02);">
                <div style="font-size:.7rem;color:var(--muted);text-transform:uppercase;">{{ $presente->category }}</div>
                <h3 style="margin:.35rem 0 .6rem;">{{ $presente->name }}</h3>
                @if($presente->received)
                    <div style="font-size:.8rem;color:#bbf7d0;margin-bottom:.5rem;">Recebido{{ $presente->gifted_by ? ' por ' . $presente->gifted_by : '' }}</div>
                @endif
                <p style="color:var(--muted);font-size:.9rem;">{{ $presente->description }}</p>
            </div>
        @empty
            <p style="color:var(--muted);">Nenhum presente cadastrado.</p>
        @endforelse
    </div>
</div>

<script>
const btns=document.querySelectorAll('.f-btn');
const cards=document.querySelectorAll('.gift-card');
btns.forEach(b=>b.addEventListener('click',()=>{
  btns.forEach(x=>x.classList.remove('on'));
  b.classList.add('on');
  const f=b.dataset.f;
  cards.forEach(c=>{
    const hide = f!=='all' && c.dataset.cat!==f;
    c.style.display = hide ? 'none' : 'block';
  });
}));
</script>
@endsection
