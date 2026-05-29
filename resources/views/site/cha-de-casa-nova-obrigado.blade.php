@extends('site.layout.cha-casa-nova')

@section('title', 'Presenca Confirmada · Cha de Casa Nova')

@push('styles')
<style>
.ty-intro{position:relative;z-index:1;max-width:900px;margin:0 auto;padding:7.5rem 2rem 2.5rem;border-bottom:1px solid var(--border-dim)}
.check-wrap{width:72px;height:72px;border-radius:50%;border:1.5px solid rgba(0,168,79,.35);display:flex;align-items:center;justify-content:center;margin-bottom:1.8rem;position:relative;animation:ringPop 2.5s ease infinite}
.check-wrap::before{content:'';position:absolute;inset:-7px;border-radius:50%;border:1px solid rgba(0,168,79,.1)}
@keyframes ringPop{0%,100%{box-shadow:0 0 0 0 rgba(0,168,79,.15)}50%{box-shadow:0 0 0 10px rgba(0,168,79,0)}}
.check-wrap svg{color:var(--verde-cl)}
.ty-eyebrow{font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.68rem;letter-spacing:.3em;text-transform:uppercase;color:var(--verde-cl);margin-bottom:.6rem}
.ty-title{font-family:'Bebas Neue',sans-serif;font-size:clamp(3rem,6vw,5rem);letter-spacing:.04em;color:var(--branco);line-height:.9;margin-bottom:.5rem}
.ty-title em{font-style:normal;color:var(--amarelo)}
.ty-desc{font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.7;margin-bottom:2rem;max-width:420px}
.loc-note{display:inline-flex;align-items:center;gap:.7rem;padding:.8rem 1.1rem;background:rgba(245,196,0,.06);border:1px solid var(--border);border-radius:3px;font-size:.82rem;font-weight:300;color:var(--muted);margin-bottom:2rem}
.loc-note svg{color:var(--ouro-cl);flex-shrink:0}
.loc-note strong{color:var(--ouro-cl);font-weight:600}
.ty-ctas{display:flex;flex-wrap:wrap;gap:.8rem}
.stats{position:relative;z-index:1;display:grid;grid-template-columns:repeat(3,1fr);border-bottom:1px solid var(--border-dim);max-width:900px;margin:0 auto}
.stat{padding:2rem;text-align:center;border-right:1px solid var(--border-dim)}
.stat:last-child{border-right:none}
.stat-n{font-family:'Bebas Neue',sans-serif;font-size:3rem;line-height:1;color:var(--verde-cl);display:block;margin-bottom:.2rem}
.stat-n.gold{color:var(--amarelo)}
.stat-l{font-family:'Barlow Condensed',sans-serif;font-size:.65rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--muted)}
.list-wrap{position:relative;z-index:1;max-width:900px;margin:0 auto;padding:3rem 2rem 5rem}
.list-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;padding-bottom:1rem;border-bottom:1px solid var(--border-dim)}
.list-head-title{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:1rem;letter-spacing:.08em;color:var(--branco)}
.list-count{font-family:'Barlow Condensed',sans-serif;font-size:.68rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--verde-cl)}
.list{display:flex;flex-direction:column}
.row{display:flex;align-items:center;gap:1rem;padding:.85rem 0;border-bottom:1px solid var(--border-dim);transition:background .15s}
.row:last-child{border-bottom:none}
.row:hover{background:rgba(245,196,0,.02)}
.row-n{font-family:'Barlow Condensed',sans-serif;font-size:.72rem;font-weight:700;color:var(--muted);width:22px;text-align:right;flex-shrink:0}
.row-av{width:34px;height:34px;border-radius:50%;background:rgba(0,77,38,.4);border:1px solid rgba(0,168,79,.18);display:flex;align-items:center;justify-content:center;font-family:'Barlow Condensed',sans-serif;font-size:.7rem;font-weight:700;color:var(--verde-cl);flex-shrink:0}
.row-name{font-size:.9rem;font-weight:400;color:var(--branco);flex:1}
.row-comp{font-family:'Barlow Condensed',sans-serif;font-size:.68rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}
.row-check{width:18px;height:18px;border-radius:50%;background:rgba(0,168,79,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.row-check svg{color:var(--verde-cl)}
.cta-bar{position:relative;z-index:1;max-width:900px;margin:0 auto;padding:0 2rem 4rem;display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center}

.confirm-modal{position:fixed;inset:0;z-index:1200;display:flex;align-items:center;justify-content:center;padding:1rem;background:rgba(0,0,0,.65);backdrop-filter:blur(2px)}
.confirm-modal[hidden]{display:none}
.confirm-modal-card{width:min(520px,100%);background:#071109;border:1px solid var(--border);border-radius:8px;padding:1.4rem 1.2rem 1.2rem;box-shadow:0 16px 48px rgba(0,0,0,.45);animation:modalIn .22s ease}
@keyframes modalIn{from{opacity:0;transform:translateY(10px) scale(.98)}to{opacity:1;transform:translateY(0) scale(1)}}
.confirm-modal-head{display:flex;align-items:center;justify-content:space-between;gap:.8rem;margin-bottom:.7rem}
.confirm-modal-title{font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:1rem;letter-spacing:.08em;text-transform:uppercase;color:var(--verde-cl)}
.confirm-modal-close{border:1px solid var(--border-dim);background:transparent;color:var(--muted);border-radius:4px;padding:.35rem .5rem;cursor:pointer;line-height:1}
.confirm-modal-close:hover{color:var(--branco);border-color:var(--border)}
.confirm-modal-body{font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.65}
.confirm-modal-body strong{color:var(--branco);font-weight:500}
@media(max-width:800px){.ty-intro{padding:6.5rem 1.2rem 2rem}.stats{grid-template-columns:repeat(3,1fr)}.stat{padding:1.2rem .5rem}.list-wrap,.cta-bar{padding-left:1.2rem;padding-right:1.2rem}}
</style>
@endpush

@section('content')
@php
  $totalConfirmados = $guests->count();
  $totalPessoas = $guests->count() + $guests->sum('companions_count');
  $diasRestantes = max(0, now()->startOfDay()->diffInDays(\Illuminate\Support\Carbon::parse('2026-06-13 18:00'), false));
@endphp

<div class="ty-intro">
  <div class="check-wrap">
    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg>
  </div>
  <p class="ty-eyebrow">Lista oficial</p>
  <h1 class="ty-title">Quem já <em>confirmou</em></h1>
  <p class="ty-desc">Confira os convidados que já garantiram presença no Chá de Casa Nova.</p>
  <div class="loc-note">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
    <span>O <strong>endereço</strong> será enviado em breve. Fique de olho!</span>
  </div>
  <div class="ty-ctas">
    <a href="{{ route('site.cha-de-casa-nova-lista-de-presentes') }}" class="btn-amarelo">Lista de Presentes</a>
    <a href="{{ route('site.cha-de-casa-nova') }}" class="btn-ghost">Página Inicial</a>
  </div>
</div>

<div class="stats">
  <div class="stat"><span class="stat-n">{{ $totalConfirmados }}</span><span class="stat-l">Confirmados</span></div>
  <div class="stat"><span class="stat-n">{{ $totalPessoas }}</span><span class="stat-l">Pessoas no Total</span></div>
  <div class="stat"><span class="stat-n gold">{{ $diasRestantes }}</span><span class="stat-l">Dias para o Evento</span></div>
</div>

<div class="list-wrap">
  <div class="list-head">
    <span class="list-head-title">Lista de Convocados</span>
    <span class="list-count">{{ $totalConfirmados }} {{ $totalConfirmados == 1 ? 'Confirmado' : 'Confirmados' }}</span>
  </div>

  <div class="list">
    @forelse($guests as $i => $guest)
      @php
        $parts = preg_split('/\s+/', trim($guest->full_name));
        $firstInitial = strtoupper(substr($parts[0] ?? 'A', 0, 1));
        $secondInitial = strtoupper(substr($parts[1] ?? 'A', 0, 1));
      @endphp
      <div class="row" style="animation-delay:{{ $i * 0.04 }}s">
        <span class="row-n">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
        <div class="row-av">{{ $firstInitial }}{{ $secondInitial }}</div>
        <span class="row-name">{{ $guest->full_name }}</span>
        <span class="row-comp">{{ $guest->companions_count == 0 ? 'Sozinho(a)' : '+' . $guest->companions_count . ' acomp.' }}</span>
        <div class="row-check">
          <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
      </div>
    @empty
      <div style="padding:3rem;text-align:center;font-family:'Barlow Condensed',sans-serif;font-size:1rem;letter-spacing:.1em;color:var(--muted)">
        Nenhuma confirmacao ainda. Seja o primeiro!
      </div>
    @endforelse
  </div>
</div>

<div class="cta-bar">
  <a href="{{ route('site.cha-de-casa-nova-lista-de-presentes') }}" class="btn-amarelo">Ver Lista de Presentes</a>
</div>

@if(session('success'))
  <div class="confirm-modal" id="confirm-modal" role="dialog" aria-modal="true" aria-labelledby="confirm-modal-title">
    <div class="confirm-modal-card">
      <div class="confirm-modal-head">
        <h2 class="confirm-modal-title" id="confirm-modal-title">Confirmacao recebida</h2>
        <button type="button" class="confirm-modal-close" id="confirm-modal-close" aria-label="Fechar">X</button>
      </div>
      <div class="confirm-modal-body">
        <p><strong>Sua presenca esta confirmada.</strong></p>
        <p>Agora e so contar os dias para celebrar com a gente no Cha de Casa Nova.</p>
      </div>
    </div>
  </div>
@endif
@endsection

@if(session('success'))
  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('confirm-modal');
      const closeButton = document.getElementById('confirm-modal-close');
      if (!modal) return;

      const closeModal = function () {
        modal.setAttribute('hidden', 'hidden');
      };

      closeButton.addEventListener('click', closeModal);
      modal.addEventListener('click', function (event) {
        if (event.target === modal) closeModal();
      });
      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeModal();
      });
    });
  </script>
  @endpush
@endif
