@extends('site.layout.cha-casa-nova')

@section('title', 'Chá de Casa Nova · Peterson & Amanda · 13 de Junho 2026')

@push('styles')
<style>
/* ── HERO ── */
.hero{
  position:relative;
  min-height:100vh;
  display:grid;
  grid-template-columns:1fr 1fr;
  overflow:hidden;
  padding-top:64px;
}

/* Fundo verde degradê profundo */
.hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 90% 70% at 60% 40%, rgba(0,132,61,.18) 0%, transparent 65%),
    radial-gradient(ellipse 50% 50% at 10% 80%, rgba(0,39,118,.22) 0%, transparent 60%),
    linear-gradient(160deg, #04100a 0%, #061a0c 50%, #050e14 100%);
}

/* Linhas de campo de futebol sutis */
.hero-field{
  position:absolute;inset:0;
  background-image:
    repeating-linear-gradient(0deg, transparent, transparent 49px, rgba(0,168,79,.055) 49px, rgba(0,168,79,.055) 50px),
    repeating-linear-gradient(90deg, transparent, transparent 49px, rgba(0,168,79,.035) 49px, rgba(0,168,79,.035) 50px);
  pointer-events:none;
}

/* Glow dourado atrás da imagem */
.hero-glow{
  position:absolute;
  right:0;top:10%;
  width:55%;height:85%;
  background:radial-gradient(ellipse at 60% 40%, rgba(245,196,0,.12) 0%, transparent 65%);
  pointer-events:none;
}

.hero-left{
  position:relative;z-index:2;
  display:flex;flex-direction:column;
  justify-content:center;
  padding:4rem 3.5rem 4rem 4rem;
}

/* Bandeira pequena + label */
.hero-pre{
  display:flex;align-items:center;gap:.7rem;
  margin-bottom:1.8rem;
}
.flag-strip{
  display:flex;gap:3px;
  align-items:center;
}
.flag-strip span{
  display:block;width:18px;height:12px;border-radius:1px;
}
.flag-verde{background:var(--verde-vivo)}
.flag-amarelo{background:var(--amarelo)}
.flag-azul{background:var(--azul)}
.hero-pre-text{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:600;font-size:.72rem;
  letter-spacing:.28em;text-transform:uppercase;
  color:var(--ouro-cl);
}

/* Título principal */
.hero-label{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:400;font-size:clamp(1rem,2vw,1.3rem);
  letter-spacing:.3em;text-transform:uppercase;
  color:rgba(253,255,245,.45);
  margin-bottom:.2rem;
}
.hero-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(4.5rem,10vw,7.5rem);
  line-height:.9;
  letter-spacing:.02em;
  color:var(--amarelo);
  text-shadow:
    0 0 60px rgba(245,196,0,.25),
    3px 3px 0 rgba(0,77,38,.9),
    6px 6px 0 rgba(0,39,118,.5);
  margin-bottom:.15em;
}
.hero-title-sub{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2rem,4.5vw,3.2rem);
  letter-spacing:.12em;
  color:var(--branco);
  margin-bottom:.8rem;
  text-shadow:2px 2px 0 rgba(0,77,38,.7);
}
.hero-names{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:600;font-size:clamp(.9rem,2vw,1.15rem);
  letter-spacing:.22em;text-transform:uppercase;
  color:var(--ouro-cl);
  margin-bottom:2.8rem;
}
.hero-names span{color:rgba(253,255,245,.4);font-weight:400;margin:0 .4em}

/* Data badge */
.date-badge{
  display:inline-flex;align-items:center;gap:.9rem;
  background:rgba(0,77,38,.5);
  border:1px solid var(--border);
  border-radius:3px;
  padding:.7rem 1.2rem;
  margin-bottom:2.2rem;
  width:fit-content;
}
.date-badge svg{color:var(--amarelo);flex-shrink:0}
.date-badge-text{}
.date-badge-label{font-size:.6rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);display:block}
.date-badge-val{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:.98rem;color:var(--branco)}
.hero-notes{display:flex;flex-direction:column;gap:.55rem;margin:0 0 2.2rem;padding:0;list-style:none;max-width:640px}
.hero-note{display:flex;align-items:flex-start;gap:.55rem;font-size:.9rem;font-weight:300;color:var(--muted);line-height:1.5}
.hero-note strong{font-weight:500;color:var(--branco)}

/* CTAs */
.hero-ctas{display:flex;flex-wrap:wrap;gap:.9rem}
.btn-verde{
  display:inline-flex;align-items:center;gap:.55rem;
  background:var(--verde-vivo);
  color:var(--branco);
  font-family:'Barlow Condensed',sans-serif;
  font-weight:700;font-size:.82rem;
  letter-spacing:.18em;text-transform:uppercase;
  padding:.85rem 2rem;border-radius:2px;
  text-decoration:none;border:none;cursor:pointer;
  transition:all .22s;
  box-shadow:0 4px 20px rgba(0,132,61,.35);
}
.btn-verde:hover{background:var(--verde-cl);transform:translateY(-2px)}
.btn-amarelo{
  display:inline-flex;align-items:center;gap:.55rem;
  background:var(--amarelo);
  color:var(--escuro);
  font-family:'Barlow Condensed',sans-serif;
  font-weight:700;font-size:.82rem;
  letter-spacing:.18em;text-transform:uppercase;
  padding:.85rem 2rem;border-radius:2px;
  text-decoration:none;border:none;cursor:pointer;
  transition:all .22s;
  box-shadow:0 4px 20px rgba(245,196,0,.3);
}
.btn-amarelo:hover{background:var(--amarelo-cl);transform:translateY(-2px)}
.btn-ghost{
  display:inline-flex;align-items:center;gap:.55rem;
  background:transparent;
  color:var(--muted);
  font-family:'Barlow Condensed',sans-serif;
  font-weight:600;font-size:.82rem;
  letter-spacing:.18em;text-transform:uppercase;
  padding:.85rem 1.5rem;border-radius:2px;
  text-decoration:none;
  border:1px solid rgba(245,196,0,.2);
  transition:all .22s;
}
.btn-ghost:hover{color:var(--branco);border-color:rgba(245,196,0,.5)}

/* Imagem hero direita */
.hero-right{
  position:relative;z-index:2;
  display:flex;align-items:flex-end;justify-content:center;
  overflow:hidden;
}
.hero-photo{
  position:absolute;bottom:0;right:0;
  width:100%;height:100%;
  object-fit:cover;
  object-position:center top;
  mask-image:linear-gradient(to left, black 40%, transparent 100%),
             linear-gradient(to top, black 60%, transparent 100%);
  mask-composite:intersect;
  -webkit-mask-image:linear-gradient(to left, rgba(0,0,0,1) 30%, rgba(0,0,0,0) 100%);
  opacity:.9;
}
/* Fade inferior */
.hero-right::after{
  content:'';
  position:absolute;bottom:0;left:0;right:0;
  height:35%;
  background:linear-gradient(to top, var(--escuro) 0%, transparent 100%);
  pointer-events:none;
  z-index:3;
}
/* Fade esquerdo */
.hero-right::before{
  content:'';
  position:absolute;top:0;bottom:0;left:0;
  width:35%;
  background:linear-gradient(to right, var(--escuro) 0%, transparent 100%);
  pointer-events:none;
  z-index:3;
}

/* ── DATA STRIP ── */
.data-strip{
  display:grid;grid-template-columns:repeat(4,1fr);
  border-top:1px solid var(--border-dim);
  border-bottom:1px solid var(--border-dim);
  position:relative;z-index:2;
}
.ds-item{
  padding:1.6rem 2rem;
  display:flex;align-items:center;gap:.9rem;
  border-right:1px solid var(--border-dim);
  transition:background .2s;
}
.ds-item:last-child{border-right:none}
.ds-item:hover{background:rgba(245,196,0,.04)}
.ds-icon{
  width:36px;height:36px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  background:rgba(0,77,38,.5);
  border:1px solid rgba(0,168,79,.2);
  border-radius:3px;color:var(--verde-cl);
}
.ds-label{font-size:.6rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);display:block;margin-bottom:.2rem}
.ds-val{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:1rem;color:var(--branco)}
.ds-val.gold{color:var(--amarelo)}

/* ── SECTIONS ── */
.section{max-width:1200px;margin:0 auto;padding:6rem 3.5rem}
.section-sm{max-width:1200px;margin:0 auto;padding:3rem 3.5rem}

.s-label{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:600;font-size:.68rem;
  letter-spacing:.28em;text-transform:uppercase;
  color:var(--ouro-cl);margin-bottom:.9rem;
  display:flex;align-items:center;gap:.7rem;
}
.s-label::before{content:'';width:24px;height:1px;background:var(--ouro-cl);opacity:.5}
.s-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.5rem,5vw,4rem);
  letter-spacing:.04em;
  color:var(--branco);line-height:.95;margin-bottom:.5rem;
}
.s-title em{font-style:normal;color:var(--amarelo)}
.s-lead{font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.7;max-width:500px}

/* ── CONVITE SHOWCASE ── */
.showcase{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:0;
  border:1px solid var(--border-dim);
  border-radius:6px;
  overflow:hidden;
  margin-top:4rem;
}
.showcase-img{
  position:relative;
  background:#040d06;
  overflow:hidden;
}
.showcase-img img{
  width:100%;height:100%;
  object-fit:cover;
  object-position:top center;
  display:block;
  transition:transform .5s ease;
}
.showcase-img:hover img{transform:scale(1.03)}
.showcase-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top, rgba(4,13,6,.85) 0%, transparent 50%);
  display:flex;align-items:flex-end;
  padding:1.5rem;
  pointer-events:none;
}
.showcase-caption{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:700;font-size:.72rem;
  letter-spacing:.2em;text-transform:uppercase;
  color:var(--muted);
}
.showcase-info{
  padding:3rem;
  background:rgba(0,77,38,.06);
  border-left:1px solid var(--border-dim);
  display:flex;flex-direction:column;justify-content:center;gap:1.8rem;
}
.info-row{
  display:flex;align-items:flex-start;gap:1rem;
  padding-bottom:1.8rem;
  border-bottom:1px solid var(--border-dim);
}
.info-row:last-child{border-bottom:none;padding-bottom:0}
.info-icon-wrap{
  width:40px;height:40px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  background:rgba(0,77,38,.4);
  border:1px solid rgba(0,168,79,.2);
  border-radius:3px;margin-top:.1rem;
  color:var(--verde-cl);
}
.info-tag{
  font-size:.6rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;
  color:var(--ouro-cl);display:block;margin-bottom:.2rem;
}
.info-main{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:700;font-size:1.05rem;
  color:var(--branco);margin-bottom:.1rem;
}
.info-sub{font-size:.85rem;font-weight:300;color:var(--muted);line-height:1.5}

/* ── ANFITRIÃO SECTION ── */
.anf-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:0;
  margin-top:4rem;
  border:1px solid var(--border-dim);
  border-radius:6px;overflow:hidden;
}
.anf-photo-wrap{
  position:relative;overflow:hidden;
  min-height:480px;
  background:var(--escuro-2);
}
.anf-photo{
  width:100%;height:100%;
  object-fit:cover;object-position:top center;
  display:block;
}
.anf-photo-wrap::after{
  content:'';position:absolute;
  bottom:0;left:0;right:0;height:40%;
  background:linear-gradient(to top,var(--escuro-2),transparent);
}
.anf-photo-wrap::before{
  content:'';position:absolute;
  top:0;bottom:0;right:0;width:30%;
  background:linear-gradient(to left,var(--escuro-2),transparent);
  z-index:2;
}
.anf-text{
  background:rgba(0,77,38,.07);
  border-left:1px solid var(--border-dim);
  padding:3.5rem 3rem;
  display:flex;flex-direction:column;justify-content:center;
}
.anf-text .s-label{margin-bottom:.8rem}
.anf-text .s-title{margin-bottom:1rem}
.anf-desc{
  font-size:.95rem;font-weight:300;
  color:var(--muted);line-height:1.75;
  margin-bottom:2rem;
}
.anf-highlight{
  display:flex;align-items:center;gap:.8rem;
  padding:1rem 1.2rem;
  background:rgba(245,196,0,.06);
  border:1px solid rgba(245,196,0,.15);
  border-radius:3px;
  margin-bottom:2rem;
}
.anf-highlight svg{color:var(--amarelo);flex-shrink:0}
.anf-highlight p{font-size:.88rem;font-weight:400;color:rgba(253,255,245,.7);line-height:1.5}
.anf-highlight p strong{color:var(--amarelo);font-weight:600}

/* ── FOOTER ── */
.footer{
  border-top:1px solid var(--border-dim);
  padding:2rem 3.5rem;
  text-align:center;
}
.footer-nav{display:flex;gap:2rem;list-style:none}
.footer-nav a{font-size:.72rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:var(--muted);text-decoration:none;transition:color .2s}
.footer-nav a:hover{color:var(--branco)}

/* ── ANIMATIONS ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
.hero-left>*{animation:fadeUp .7s ease both}
.hero-left>*:nth-child(1){animation-delay:.05s}
.hero-left>*:nth-child(2){animation-delay:.12s}
.hero-left>*:nth-child(3){animation-delay:.2s}
.hero-left>*:nth-child(4){animation-delay:.28s}
.hero-left>*:nth-child(5){animation-delay:.36s}
.hero-left>*:nth-child(6){animation-delay:.44s}

/* ── RESPONSIVE ── */
@media(max-width:900px){
  .nav{padding:0 1.2rem}.nav-links{display:none}
  .hero{grid-template-columns:1fr;min-height:auto}
  .hero-right{height:55vw;min-height:280px}
  .hero-left{padding:2rem 1.5rem 1.5rem}
  .hero-photo{object-position:top center}
  .data-strip{grid-template-columns:repeat(2,1fr)}
  .ds-item{padding:1.2rem 1rem}
  .section{padding:4rem 1.5rem}
  .section-sm{padding:2rem 1.5rem}
  .showcase{grid-template-columns:1fr}
  .showcase-info{border-left:none;border-top:1px solid var(--border-dim)}
  .anf-grid{grid-template-columns:1fr}
  .anf-photo-wrap{min-height:280px}
  .anf-text{padding:2rem 1.5rem}
  .footer{padding:1.5rem;flex-direction:column;text-align:center}.footer-nav{display:none}
}
</style>
@endpush

@section('content')

<!-- ── HERO ── -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-field"></div>
  <div class="hero-glow"></div>

  <div class="hero-left">
    <div class="hero-pre">
      <div class="flag-strip">
        <span class="flag-verde"></span>
        <span class="flag-amarelo"></span>
        <span class="flag-azul"></span>
      </div>
      <span class="hero-pre-text">Convite Especial · Copa do Mundo 2026</span>
    </div>

    <p class="hero-label">Chá de</p>
    <h1 class="hero-title">Casa Nova</h1>
    <p class="hero-title-sub">Você foi convocado!</p>
    <p class="hero-names">Peterson <span>&amp;</span> Amanda</p>

    <div class="date-badge">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="16" y1="2" x2="16" y2="6"/></svg>
      <div class="date-badge-text">
        <span class="date-badge-label">Data do Evento</span>
        <span class="date-badge-val">13 de Junho de 2026 · A partir das 18h</span>
      </div>
    </div>

    <div class="hero-ctas">
      <a href="{{ route('site.cha-de-casa-nova-confirmacao') }}" class="btn-amarelo">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        Confirmar Presença
      </a>
      <a href="{{ route('site.cha-de-casa-nova-lista-de-presentes') }}" class="btn-ghost">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="8" width="18" height="14" rx="1"/><path d="M12 8V22M8 8C8 5.8 9.8 4 12 4s4 1.8 4 4"/></svg>
        Lista de Presentes
      </a>
    </div>
  </div>

  <div class="hero-right">
    <img
      class="hero-photo"
      src="{{ asset('images/cha/hero_bg.jpg') }}"
      alt="Peterson e Amanda - Chá de Casa Nova"
      loading="eager"
    >
  </div>
</section>

<!-- ── DATA STRIP ── -->
<div class="data-strip">
  <div class="ds-item">
    <div class="ds-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="16" y1="2" x2="16" y2="6"/></svg>
    </div>
    <div>
      <span class="ds-label">Data</span>
      <span class="ds-val">13 de Junho, 2026</span>
    </div>
  </div>
  <div class="ds-item">
    <div class="ds-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
    </div>
    <div>
      <span class="ds-label">Transmissão</span>
      <span class="ds-val gold">Brasil x Marrocos</span>
    </div>
  </div>
  <div class="ds-item">
    <div class="ds-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3"/></svg>
    </div>
    <div>
      <span class="ds-label">Dress Code</span>
      <span class="ds-val">Camisa do Brasil obrigatoria</span>
    </div>
  </div>
  <div class="ds-item">
    <div class="ds-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/></svg>
    </div>
    <div>
      <span class="ds-label">Bebidas</span>
      <span class="ds-val">Traga sua bebida</span>
    </div>
  </div>
</div>

<!-- ── ANFITRIÃO SECTION ── -->
<div class="section">
  <div class="anf-grid">
    <div class="anf-photo-wrap">
      <img class="anf-photo" src="{{ asset('images/cha/rostos.jpg') }}" alt="Peterson e Amanda segurando a chave da nova casa">
    </div>
    <div class="anf-text">
      <p class="s-label">Os Anfitriões</p>
      <h2 class="s-title">Peterson<br>&amp; <em>Amanda</em></h2>
      <p class="anf-desc">
        Depois de muito sonho, planejamento e trabalho, chegou a hora de abrir as portas do nosso lar para as pessoas mais especiais da nossa vida. Queremos celebrar essa conquista com vocês — nossos amigos, nossa família.
      </p>
      <div class="anf-highlight">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <p>Uma casa nova, uma conquista celebrada com <strong>muita festa, jogo de Copa e comida boa.</strong> Você faz parte disso!</p>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:.8rem">
        <a href="{{ route('site.cha-de-casa-nova-confirmacao') }}" class="btn-amarelo">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          Confirmar Presença
        </a>
        <a href="{{ route('site.cha-de-casa-nova-lista-de-presentes') }}" class="btn-ghost">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="8" width="18" height="14" rx="1"/><path d="M12 8V22M8 8C8 5.8 9.8 4 12 4s4 1.8 4 4"/></svg>
          Lista de Presentes
        </a>
      </div>
    </div>
  </div>
</div>

@endsection
