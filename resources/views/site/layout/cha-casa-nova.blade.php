<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Chá de Casa Nova · Peterson & Amanda')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@400;600;700;900&family=Barlow:wght@300;400;500&display=swap" rel="stylesheet">
<style>
/* ── RESET & TOKENS ── */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --verde:       #004d26;
  --verde-vivo:  #00843D;
  --verde-cl:    #00A84F;
  --amarelo:     #F5C400;
  --amarelo-cl:  #FFD700;
  --ouro:        #C9941A;
  --ouro-cl:     #E8B84B;
  --azul:        #002776;
  --vermelho:    #C8102E;
  --escuro:      #040d06;
  --escuro-2:    #081208;
  --branco:      #FDFFF5;
  --muted:       rgba(253,255,245,.55);
  --border:      rgba(245,196,0,.18);
  --border-dim:  rgba(245,196,0,.08);
}

html{scroll-behavior:smooth}
body{
  font-family:'Barlow',sans-serif;
  background:var(--escuro);
  color:var(--branco);
  overflow-x:hidden;
}

/* ── GRAIN ── */
body::after{
  content:'';position:fixed;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  pointer-events:none;z-index:9999;
}

/* ── STRIPE TOPO ── */
.stripe{
  height:4px;
  background:linear-gradient(90deg,
    var(--verde-vivo) 0%,var(--verde-vivo) 33.3%,
    var(--amarelo) 33.3%,var(--amarelo) 66.6%,
    var(--azul) 66.6%,var(--azul) 100%);
}

/* ── NAV ── */
.nav{
  position:fixed;top:4px;left:0;right:0;z-index:500;
  height:60px;
  display:flex;align-items:center;justify-content:space-between;
  padding:0 3.5rem;
  background:rgba(4,13,6,.88);
  backdrop-filter:blur(18px);
  border-bottom:1px solid var(--border-dim);
}
.nav-brand{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:700;font-size:.82rem;
  letter-spacing:.25em;text-transform:uppercase;
  color:var(--amarelo);text-decoration:none;
}
.nav-links{display:flex;gap:2.2rem;list-style:none}
.nav-links a{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:600;font-size:.78rem;
  letter-spacing:.18em;text-transform:uppercase;
  color:var(--muted);text-decoration:none;
  transition:color .2s;
}
.nav-links a:hover,.nav-links a.on{color:var(--branco)}
.nav-btn{
  font-family:'Barlow Condensed',sans-serif;
  font-weight:700;font-size:.78rem;
  letter-spacing:.18em;text-transform:uppercase;
  padding:.5rem 1.5rem;
  background:var(--amarelo);color:var(--escuro);
  border-radius:2px;text-decoration:none;
  transition:background .2s;
}
.nav-btn:hover{background:var(--amarelo-cl)}

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

.footer{
  border-top:1px solid var(--border-dim);
  padding:2rem 3.5rem;
  text-align:center!important;
}

@media(max-width:900px){
  .nav{padding:0 1.2rem}
  .nav-links{display:none}
  .footer{padding:1.5rem;flex-direction:column;text-align:center}
}
</style>
@stack('styles')
</head>
<body>

{{-- ── STRIPE TRICOLOR ── --}}
<div class="stripe"></div>

{{-- ── NAVBAR ── --}}
<nav class="nav">
    <a href="{{ route('site.cha-de-casa-nova') }}" class="nav-brand">Peterson &amp; Amanda</a>
    <ul class="nav-links">
        <li>
            <a href="{{ route('site.cha-de-casa-nova') }}"
             @if(request()->routeIs('site.cha-de-casa-nova')) class="on" @endif>
                Início
            </a>
        </li>
        <li>
            <a href="{{ route('site.cha-de-casa-nova-confirmacao') }}"
             @if(request()->routeIs('site.cha-de-casa-nova-confirmacao')) class="on" @endif>
                Confirmar
            </a>
        </li>
        <li>
            <a href="{{ route('site.cha-de-casa-nova-obrigado') }}"
             @if(request()->routeIs('site.cha-de-casa-nova-obrigado')) class="on" @endif>
                Confirmados
            </a>
        </li>
        <li>
            <a href="{{ route('site.cha-de-casa-nova-lista-de-presentes') }}"
             @if(request()->routeIs('site.cha-de-casa-nova-lista-de-presentes')) class="on" @endif>
                Lista de presentes
            </a>
        </li>
    </ul>
    <a href="{{ route('site.cha-de-casa-nova-confirmacao') }}" class="nav-btn">Confirmar Presença</a>
</nav>

{{-- ── CONTEÚDO DA VIEW ── --}}
<main>
    @yield('content')
</main>

{{-- ── FOOTER ── --}}
<footer class="footer">
    <span class="footer-brand">Peterson &amp; Amanda &middot; Chá de Casa Nova &middot; 13 de Junho 2026</span>
</footer>

@stack('scripts')
</body>
</html>
