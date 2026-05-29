@extends('cha.layout')

@section('title', 'Lista de Presentes · Chá de Casa Nova')

@push('styles')
<style>
.page-header{
  position:relative;z-index:1;
  padding:7rem 3.5rem 3.5rem;
  border-bottom:1px solid var(--border-dim);
  display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;
}
.header-img{position:relative;border-radius:4px;overflow:hidden;height:280px}
.header-img img{width:100%;height:100%;object-fit:cover;object-position:top center;display:block;opacity:.85}
.header-img::after{content:'';position:absolute;inset:0;background:linear-gradient(to left,#040d06,transparent 60%)}
.header-img::before{content:'';position:absolute;bottom:0;left:0;right:0;height:40%;background:linear-gradient(to top,#040d06,transparent);z-index:2}

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
.gift-thumb{
  height:130px;display:flex;align-items:center;justify-content:center;
  background:linear-gradient(135deg,rgba(0,77,38,.2),rgba(0,39,118,.15));
  border-bottom:1px solid var(--border-dim);position:relative;overflow:hidden;
}
.gift-thumb::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(45deg,transparent,transparent 18px,rgba(245,196,0,.018) 18px,rgba(245,196,0,.018) 19px)}
.gift-thumb svg{color:rgba(253,255,245,.12);position:relative;z-index:1}
.badge{position:absolute;top:.65rem;left:.65rem;font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:.58rem;letter-spacing:.15em;text-transform:uppercase;padding:.22rem .6rem;border-radius:2px;z-index:2}
.b-red{background:rgba(200,16,46,.15);color:#f48;border:1px solid rgba(200,16,46,.25)}
.b-gold{background:rgba(245,196,0,.1);color:var(--ouro-cl);border:1px solid rgba(245,196,0,.2)}
.b-green{background:rgba(0,168,79,.1);color:var(--verde-cl);border:1px solid rgba(0,168,79,.18)}
.gift-body{padding:1.3rem;display:flex;flex-direction:column;flex:1}
.gift-cat{font-family:'Barlow Condensed',sans-serif;font-size:.58rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);margin-bottom:.4rem}
.gift-name{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:1rem;color:var(--branco);line-height:1.2;margin-bottom:.5rem}
.gift-desc{font-size:.82rem;font-weight:300;color:var(--muted);line-height:1.55;flex:1;margin-bottom:1.1rem}
.gift-foot{display:flex;align-items:center;justify-content:space-between;padding-top:.9rem;border-top:1px solid var(--border-dim)}
.price-lbl{font-size:.55rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:var(--muted);display:block;margin-bottom:.1rem}
.price{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:1.05rem;color:var(--branco)}
.price-gold{color:var(--ouro-cl)}
.btn-gift{display:inline-flex;align-items:center;gap:.35rem;font-family:'Barlow Condensed',sans-serif;font-size:.62rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;padding:.45rem .9rem;border-radius:2px;background:transparent;border:1px solid var(--border-dim);color:var(--muted);text-decoration:none;cursor:pointer;transition:all .2s;white-space:nowrap}
.btn-gift:hover{border-color:rgba(245,196,0,.3);color:var(--ouro-cl);background:rgba(245,196,0,.05)}

.cta-foot{position:relative;z-index:1;padding:5rem 3.5rem;border-top:1px solid var(--border-dim);text-align:center}
.cta-foot-title{font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,4vw,3rem);letter-spacing:.04em;color:var(--branco);margin-bottom:.4rem}
.cta-foot-title em{font-style:normal;color:var(--verde-cl)}
.cta-foot p{font-size:.9rem;font-weight:300;color:var(--muted);line-height:1.7;margin-bottom:2rem}
.cta-btns{display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center}

@media(max-width:900px){
  .page-header{grid-template-columns:1fr;padding:6rem 1.5rem 2rem}
  .header-img{height:200px}
  .filter-bar,.gifts-wrap,.cta-foot{padding-left:1.2rem;padding-right:1.2rem}
  .gifts-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:560px){.gifts-grid{grid-template-columns:1fr}}
</style>
@endpush

@section('content')

<div class="page-header">
  <div>
    <p class="s-label">Peterson &amp; Amanda · 2026</p>
    <h1 class="s-title">Lista de<br><em>Presentes</em></h1>
    <p style="font-size:.9rem;font-weight:300;color:var(--muted);line-height:1.7;margin-bottom:2rem">Sugestões para ajudar a montar nosso lar com carinho. Mas lembre: <strong style="color:var(--branco);font-weight:500">sua presença já é o maior presente!</strong></p>
    <div style="display:flex;flex-wrap:wrap;gap:.8rem">
      <a href="{{ route('cha.confirmacao') }}" class="btn-amarelo"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Confirmar Presença</a>
      <a href="{{ route('cha.confirmados') }}" class="btn-ghost"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>Ver Confirmados</a>
    </div>
  </div>
  <div class="header-img">
    <img src="{{ asset('images/cha/hero_bg.jpg') }}" alt="Peterson e Amanda">
  </div>
</div>

<div class="filter-bar">
  <span class="filter-lbl">Filtrar:</span>
  <button class="f-btn on" data-f="all">Todos · {{ count($presentes) }}</button>
  <button class="f-btn" data-f="cozinha">Cozinha</button>
  <button class="f-btn" data-f="sala">Sala</button>
  <button class="f-btn" data-f="quarto">Quarto</button>
  <button class="f-btn" data-f="decoracao">Decoração</button>
  <button class="f-btn" data-f="eletro">Eletro</button>
</div>

<div class="gifts-wrap">
  <div class="gifts-grid" id="grid">
    @forelse($presentes as $presente)
        <div class="gift-card" data-cat="{{ $presente['categoria_slug'] }}">
            <div class="gift-thumb">
                <span class="badge b-{{ $presente['prioridade'] }}">
                    @if($presente['prioridade'] === 'alta') Prioritário
                    @elseif($presente['prioridade'] === 'media') Sugerido
                    @else Opcional
                    @endif
                </span>
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".8">
                    <path d="{{ $presente['icone_path'] }}"/>
                </svg>
            </div>
            <div class="gift-body">
                <span class="gift-cat">{{ $presente['categoria'] }}</span>
                <h3 class="gift-name">{{ $presente['nome'] }}</h3>
                <p class="gift-desc">{{ $presente['descricao'] }}</p>
                <div class="gift-foot">
                    <div>
                        <span class="price-lbl">A partir de</span>
                        <span class="price {{ $presente['prioridade'] === 'alta' ? 'price-gold' : '' }}">
                            {{ $presente['preco'] }}
                        </span>
                    </div>
                    @if($presente['link'])
                        <a href="{{ $presente['link'] }}" target="_blank" rel="noopener" class="btn-gift">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <rect x="3" y="8" width="18" height="14" rx="1"/>
                                <path d="M12 8V22M8 8C8 5.8 9.8 4 12 4s4 1.8 4 4"/>
                            </svg>
                            Presentear
                        </a>
                    @else
                        <span class="btn-gift" style="opacity:.4;cursor:default">Em breve</span>
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
    <a href="{{ route('cha.confirmacao') }}" class="btn-amarelo"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Confirmar Presença</a>
    <a href="{{ route('cha.index') }}" class="btn-ghost"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>Início</a>
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

@push('scripts')
<script>
const btns  = document.querySelectorAll('.f-btn');
const cards = document.querySelectorAll('.gift-card');

btns.forEach(btn => {
    btn.addEventListener('click', () => {
        btns.forEach(b => b.classList.remove('on'));
        btn.classList.add('on');
        const f = btn.dataset.f;
        cards.forEach(c => {
            c.classList.toggle('hidden', f !== 'all' && c.dataset.cat !== f);
        });
    });
});
</script>
@endpush
