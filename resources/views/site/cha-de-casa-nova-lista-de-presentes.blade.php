@extends('site.layout.cha-casa-nova')

@section('title', 'Lista de Presentes · Chá de Casa Nova')

@push('styles')
<style>
.page-header{
  position:relative;z-index:1;
  max-width:900px;margin:0 auto;
  padding:7.5rem 2rem 2.6rem;
  border-bottom:1px solid var(--border-dim);
  display:block;
}

.pg-eyebrow{font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.68rem;letter-spacing:.3em;text-transform:uppercase;color:var(--verde-cl);margin-bottom:.6rem}
.pg-title{font-family:'Bebas Neue',sans-serif;font-size:clamp(3rem,6vw,5rem);letter-spacing:.04em;color:var(--branco);line-height:.9;margin-bottom:.5rem}
.pg-title em{font-style:normal;color:var(--amarelo)}
.pg-desc{font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.7;margin-bottom:2rem;max-width:540px}

.filter-bar{
  position:relative;z-index:1;
  padding:1.5rem 3.5rem;
  border-bottom:1px solid var(--border-dim);
  display:flex;align-items:center;gap:.5rem;flex-wrap:wrap;
}
.filter-lbl{font-family:'Barlow Condensed',sans-serif;font-size:.62rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);margin-right:.4rem}
.f-btn{font-family:'Barlow Condensed',sans-serif;font-size:.7rem;font-weight:600;letter-spacing:.14em;text-transform:uppercase;padding:.4rem 1rem;border-radius:2px;border:1px solid var(--border-dim);background:transparent;color:var(--muted);cursor:pointer;transition:all .2s}
.f-btn:hover,.f-btn.on{background:rgba(245,196,0,.06);border-color:rgba(245,196,0,.25);color:var(--branco)}

.gifts-wrap{position:relative;z-index:1;padding:2.5rem 3.5rem 5rem}
.gifts-grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
  gap:1px;
  background:var(--border-dim);
  border:1px solid var(--border-dim);
  border-radius:4px;overflow:hidden;
}

.gift-card{background:#040d06;display:flex;flex-direction:column;transition:background .2s;position:relative}
.gift-card:hover{background:rgba(255,255,255,.018)}
.gift-card.hidden{display:none}
.gift-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--amarelo),var(--verde-cl));opacity:.85}
.gift-card.received{
  background:
    radial-gradient(circle at top right, rgba(22,163,74,.18), transparent 55%),
    linear-gradient(160deg, rgba(6,22,12,1) 0%, rgba(5,17,10,1) 100%);
  box-shadow:inset 0 0 0 1px rgba(22,163,74,.35);
}
.gift-card.received::before{background:linear-gradient(90deg,#22c55e,#86efac)}
.gift-body{padding:1.5rem 1.3rem;display:flex;flex-direction:column;flex:1}
.gift-cat{display:inline-flex;align-self:flex-start;font-family:'Barlow Condensed',sans-serif;font-size:.58rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--ouro-cl);margin-bottom:.7rem;padding:.2rem .45rem;border:1px solid rgba(245,196,0,.2);background:rgba(245,196,0,.07);border-radius:2px}
.gift-name{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:1.12rem;color:var(--branco);line-height:1.2;margin-bottom:.6rem}
.gift-note{display:inline-flex;align-self:flex-start;font-family:'Barlow Condensed',sans-serif;font-size:.55rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:#111827;background:linear-gradient(135deg,#cbd5e1,#f3f4f6);border:1px solid #94a3b8;border-radius:2px;padding:.22rem .5rem;margin:-.2rem 0 .6rem}
.gift-received-badge{display:flex;flex-direction:column;align-self:flex-start;gap:.2rem;margin:-.15rem 0 .6rem;padding:.38rem .52rem .34rem;border-radius:4px;background:rgba(22,163,74,.13);border:1px solid rgba(34,197,94,.55)}
.gift-received-label{display:inline-flex;align-items:center;gap:.34rem;font-family:'Barlow Condensed',sans-serif;font-size:.58rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:#bbf7d0}
.gift-received-label::before{content:'✓';display:inline-flex;align-items:center;justify-content:center;width:14px;height:14px;border-radius:50%;background:rgba(34,197,94,.22);border:1px solid rgba(34,197,94,.5);font-size:.55rem;line-height:1}
.gift-received-by{font-size:.73rem;font-weight:400;color:#dcfce7;line-height:1.35;padding-left:1.05rem}
.gift-card.received .gift-name{color:#ecfdf5}
.gift-desc{font-size:.82rem;font-weight:300;color:var(--muted);line-height:1.55;flex:1;margin-bottom:1.1rem}
.gift-foot{display:flex;align-items:center;justify-content:flex-end;padding-top:.9rem;border-top:1px solid var(--border-dim);margin-top:auto}
.gift-actions{display:flex;flex-wrap:wrap;gap:.5rem;justify-content:flex-end}
.btn-gift{display:inline-flex;align-items:center;gap:.35rem;font-family:'Barlow Condensed',sans-serif;font-size:.62rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:.45rem .9rem;border-radius:2px;background:transparent;border:1px solid var(--border-dim);color:var(--muted);text-decoration:none;cursor:pointer;transition:all .2s;white-space:nowrap}
.btn-gift:hover{border-color:rgba(245,196,0,.3);color:var(--ouro-cl);background:rgba(245,196,0,.05)}
.btn-gift-alt{border-color:rgba(0,168,79,.35);color:var(--verde-cl)}
.btn-gift-alt:hover{border-color:rgba(0,168,79,.55);color:#b6ffd9;background:rgba(0,168,79,.12)}

.cta-foot{position:relative;z-index:1;padding:5rem 3.5rem;border-top:1px solid var(--border-dim);text-align:center}
.cta-foot-title{font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,4vw,3rem);letter-spacing:.04em;color:var(--branco);margin-bottom:.4rem}
.cta-foot-title em{font-style:normal;color:var(--verde-cl)}
.cta-foot p{font-size:.9rem;font-weight:300;color:var(--muted);line-height:1.7;margin-bottom:2rem}
.cta-btns{display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center}

@media(max-width:900px){
  .page-header{padding:6.6rem 1.2rem 2rem}
  .filter-bar,.gifts-wrap,.cta-foot{padding-left:1.2rem;padding-right:1.2rem}
  .gifts-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:560px){.gifts-grid{grid-template-columns:1fr}}
</style>
@endpush

@section('content')

@php
  $event = $event ?? null;
@endphp

<div class="page-header">
  <div>
    <p class="pg-eyebrow">Lista oficial</p>
    <h1 class="pg-title">Escolha um <em>presente</em></h1>
    <p class="pg-desc">Selecionamos algumas sugestões para quem quiser nos ajudar a montar nosso lar. Se preferir, também aceitamos PIX.</p>
  </div>
</div>

<div class="filter-bar">
  <span class="filter-lbl">Filtrar:</span>
  <button class="f-btn on" data-f="all">Todos · {{ $presentes->count() }}</button>
  @foreach($categorias as $categoria)
    <button class="f-btn" data-f="{{ \Illuminate\Support\Str::slug($categoria) }}">{{ $categoria }}</button>
  @endforeach
</div>

<div class="gifts-wrap">
  <div class="gifts-grid" id="grid">
    @forelse($presentes as $presente)
        <div class="gift-card {{ $presente->received ? 'received' : '' }}" data-cat="{{ \Illuminate\Support\Str::slug($presente->category) }}">
            <div class="gift-body">
                <span class="gift-cat">{{ $presente->category }}</span>
                <h3 class="gift-name">{{ $presente->name }}</h3>
              @if($presente->received)
                <div class="gift-received-badge">
                  <span class="gift-received-label">Presente ja ganho</span>
                  @if($presente->gifted_by)
                    <span class="gift-received-by">Presenteado por: {{ $presente->gifted_by }}</span>
                  @endif
                </div>
              @endif
              @if(\Illuminate\Support\Str::slug($presente->category) === 'eletrodomesticos' && !$presente->received)
                <span class="gift-note">Cor preferencial: Preto ou Inox</span>
              @endif
                <p class="gift-desc">{{ $presente->description }}</p>
                <div class="gift-foot">
                  @if($presente->received)
                    <span class="text-success text-xs font-weight-bold">Item indisponivel para presentear.</span>
                  @else
                    @php
                      $msgPresente = rawurlencode("Oi! Quero presentear vocês com o {$presente->name}.\n\nPodem me passar os detalhes?");
                      $msgPix = rawurlencode("Oi! Prefiro fazer um pix para presentear vocês com o {$presente->name}.\n\nPodem me enviar a chave?");
                    @endphp
                    <div class="gift-actions">
                      <a href="https://wa.me/{{ $whatsNumber }}?text={{ $msgPresente }}" target="_blank" rel="noopener" class="btn-gift">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                          <rect x="3" y="8" width="18" height="14" rx="1"/>
                          <path d="M12 8V22M8 8C8 5.8 9.8 4 12 4s4 1.8 4 4"/>
                        </svg>
                        Presentear
                      </a>
                      <a href="https://wa.me/{{ $whatsNumber }}?text={{ $msgPix }}" target="_blank" rel="noopener" class="btn-gift btn-gift-alt">Prefiro fazer um pix</a>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    @empty
        <div style="padding:3rem;text-align:center;color:var(--muted);font-family:'Barlow Condensed',sans-serif;grid-column:1/-1">
            Nenhum presente cadastrado ainda.
        </div>
    @endforelse
</div>
</div>

<div class="cta-foot">
  <h2 class="cta-foot-title">Sua presença é o<br><em>maior presente</em></h2>
  <p>Mas se quiser ajudar a montar nosso lar, ficamos muito felizes com qualquer gesto de carinho!</p>
  <div class="cta-btns">
    <a href="{{ route('site.eventos.confirmacao', $event) }}" class="btn-amarelo"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Confirmar Presença</a>
    <a href="{{ route('site.eventos.landing', $event) }}" class="btn-ghost"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>Início</a>
  </div>
</div>

<script>
const btns=document.querySelectorAll('.f-btn');
const cards=document.querySelectorAll('.gift-card');
btns.forEach(b=>b.addEventListener('click',()=>{
  btns.forEach(x=>x.classList.remove('on'));
  b.classList.add('on');
  const f=b.dataset.f;
  cards.forEach(c=>c.classList.toggle('hidden',f!=='all'&&c.dataset.cat!==f));
}));
</script>

@endsection
