@extends('site.layout.cha-casa-nova')

@section('title', 'Confirmar Presença · Chá de Casa Nova')

@push('styles')
<style>
.page{position:relative;z-index:1;min-height:100vh;display:grid;grid-template-columns:1fr 1fr;padding-top:64px}
.left-panel{position:sticky;top:64px;height:calc(100vh - 64px);overflow:hidden;display:flex;flex-direction:column}
.panel-img{flex:1;overflow:hidden;position:relative}
.panel-img img{width:100%;height:100%;object-fit:cover;object-position:top center;display:block}
.panel-img::after{content:'';position:absolute;inset:0;background:linear-gradient(to top,rgba(4,13,6,.9) 0%,rgba(4,13,6,.3) 50%,rgba(4,13,6,.1) 100%)}
.panel-img::before{content:'';position:absolute;top:0;bottom:0;right:0;width:40%;background:linear-gradient(to left,#040d06,transparent);z-index:2}
.panel-info{
  position:absolute;bottom:0;left:0;right:0;z-index:3;
  padding:2.5rem;
  background:linear-gradient(to top,rgba(4,13,6,1) 0%,rgba(4,13,6,.7) 60%,transparent 100%);
}
.panel-pre{font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.65rem;letter-spacing:.28em;text-transform:uppercase;color:var(--ouro-cl);margin-bottom:.4rem}
.panel-title{font-family:'Bebas Neue',sans-serif;font-size:2.2rem;letter-spacing:.04em;color:var(--branco);margin-bottom:.3rem}
.panel-sub{font-size:.85rem;font-weight:300;color:var(--muted);line-height:1.6}
.chips-row{display:flex;flex-wrap:wrap;gap:.5rem;margin-top:1rem}
.chip{display:inline-flex;align-items:center;gap:.4rem;padding:.35rem .75rem;background:rgba(0,77,38,.4);border:1px solid rgba(0,168,79,.18);border-radius:2px;font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:var(--verde-cl)}
.chip.gold{background:rgba(245,196,0,.08);border-color:rgba(245,196,0,.2);color:var(--amarelo)}

.right-panel{position:relative;z-index:1;padding:5rem 3.5rem;display:flex;flex-direction:column;justify-content:center;border-left:1px solid var(--border-dim);overflow-y:auto}
.form-head{margin-bottom:2.5rem;margin-top:1rem}
.form-title{font-family:'Bebas Neue',sans-serif;font-size:2.8rem;letter-spacing:.04em;color:var(--branco);margin-bottom:.4rem}
.form-title em{font-style:normal;color:var(--amarelo)}
.form-desc{font-size:.9rem;font-weight:300;color:var(--muted);line-height:1.7}
.alert-box{display:flex;align-items:flex-start;gap:.8rem;padding:1rem 1.2rem;background:rgba(245,196,0,.06);border:1px solid rgba(245,196,0,.18);border-radius:3px;margin-bottom:2rem}
.alert-box svg{color:var(--ouro-cl);flex-shrink:0;margin-top:.1rem}
.alert-box p{font-size:.82rem;font-weight:300;color:rgba(253,255,245,.65);line-height:1.6}
.alert-box p strong{color:var(--ouro-cl);font-weight:600}
.field{margin-bottom:1.6rem}
.field label{display:block;font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.65rem;letter-spacing:.22em;text-transform:uppercase;color:var(--muted);margin-bottom:.55rem}
.field input,.field select{width:100%;background:rgba(255,255,255,.03);border:1px solid rgba(245,196,0,.12);border-radius:3px;padding:.9rem 1.1rem;font-family:'Barlow',sans-serif;font-size:.95rem;font-weight:300;color:var(--branco);outline:none;transition:border-color .2s,background .2s;appearance:none}
.field input::placeholder{color:rgba(253,255,245,.2)}
.field input:focus,.field select:focus{border-color:rgba(0,168,79,.5);background:rgba(0,168,79,.04)}
.select-wrap{position:relative}
.select-wrap::after{content:'';position:absolute;right:1rem;top:50%;transform:translateY(-50%);width:0;height:0;border-left:4px solid transparent;border-right:4px solid transparent;border-top:5px solid var(--muted);pointer-events:none}
.field select option{background:#0a1a0f;color:var(--branco)}
.btn-submit{width:100%;display:flex;align-items:center;justify-content:center;gap:.6rem;background:var(--amarelo);color:var(--escuro);font-family:'Barlow Condensed',sans-serif;font-weight:700;font-size:.88rem;letter-spacing:.2em;text-transform:uppercase;padding:1.1rem 2rem;border-radius:3px;border:none;cursor:pointer;transition:all .22s;box-shadow:0 4px 20px rgba(245,196,0,.25);margin-top:.5rem}
.btn-submit:hover{background:var(--amarelo-cl);transform:translateY(-2px);box-shadow:0 8px 28px rgba(245,196,0,.35)}
.form-footer{margin-top:1.5rem;font-size:.78rem;font-weight:300;color:var(--muted);text-align:center;line-height:1.7}
.form-footer a{color:var(--ouro-cl);text-decoration:none;font-weight:500}
.form-footer a:hover{text-decoration:underline}
@media(max-width:900px){.page{grid-template-columns:1fr}.left-panel{position:relative;height:55vw;min-height:260px}.right-panel{padding:3rem 1.5rem;border-left:none;border-top:1px solid var(--border-dim)}}
</style>
@endpush

@section('content')

<div class="page">
  <div class="left-panel">
    <div class="panel-img">
      <img src="{{ asset('images/cha/hero_bg.jpg') }}" alt="Peterson e Amanda">
    </div>
    <div class="panel-info">
      <p class="panel-pre">Chá de Casa Nova · 2026</p>
      <h2 class="panel-title">Peterson &amp; Amanda</h2>
      <p class="panel-sub">Confirme sua presença e receba o endereço do evento.</p>
      <div class="chips-row">
        <span class="chip"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/></svg>13 de Junho</span>
        <span class="chip"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>18h</span>
        <span class="chip gold"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>Copa 2026</span>
      </div>
    </div>
  </div>
  <div class="right-panel">
    <div class="form-head">
      <p class="s-label">Convocação Oficial</p>
      <h1 class="form-title">Confirme sua<br><em>Presença</em></h1>
      <p class="form-desc">Preencha abaixo para garantir seu lugar. Após confirmar você receberá o endereço do evento.</p>
    </div>
    <div class="alert-box">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      <p>O <strong>endereço do evento</strong> será enviado por mensagem após a sua confirmação. Fique de olho!</p>
    </div>

    {{-- Alertas de sessão --}}
    @if(session('success'))
        <div style="padding:1rem 1.2rem;background:rgba(0,168,79,.12);border:1px solid rgba(0,168,79,.3);border-radius:3px;margin-bottom:1.5rem;font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.9rem;color:#7fffc4;letter-spacing:.05em">
            ✓ {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div style="padding:1rem 1.2rem;background:rgba(200,16,46,.1);border:1px solid rgba(200,16,46,.25);border-radius:3px;margin-bottom:1.5rem;font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.9rem;color:#fca5a5;letter-spacing:.05em">
            @foreach($errors->all() as $error)
                <div>⚠ {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('site.eventos.confirmacao.store', $event) }}">
            @csrf
      <div class="field">
        <label for="full_name">Nome completo</label>
        <input type="text" id="full_name" name="full_name" placeholder="Ex: João da Silva" required autocomplete="name"
                   value="{{ old('full_name') }}">
                @error('full_name')
                    <span style="color:#fca5a5;font-size:.78rem;margin-top:.3rem;display:block;font-family:'Barlow Condensed',sans-serif">{{ $message }}</span>
                @enderror
      </div>
      <div class="field" id="companions-wrapper" style="display:none;">
        <label for="companions_count">Acompanhantes</label>
        <div class="select-wrap">
          <select id="companions_count" name="companions_count" required>
            <option value="" disabled selected>Selecione...</option>
            <option value="0" {{ old('companions_count') === '0' ? 'selected' : '' }}>Vou sozinho(a) — apenas eu</option>
            <option value="1" {{ old('companions_count') === '1' ? 'selected' : '' }}>+1 acompanhante (2 no total)</option>
            <option value="2" {{ old('companions_count') === '2' ? 'selected' : '' }}>+2 acompanhantes (3 no total)</option>
            <option value="3" {{ old('companions_count') === '3' ? 'selected' : '' }}>+3 acompanhantes (4 no total)</option>
            <option value="4" {{ old('companions_count') === '4' ? 'selected' : '' }}>+4 acompanhantes (5 no total)</option>
            <option value="5" {{ old('companions_count') === '5' ? 'selected' : '' }}>+5 ou mais acompanhantes</option>
          </select>
        </div>
      </div>
                @error('companions_count')
                    <span style="color:#fca5a5;font-size:.78rem;margin-top:.3rem;display:block;font-family:'Barlow Condensed',sans-serif">{{ $message }}</span>
                @enderror
      <button type="submit" class="btn-submit">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        Confirmar Presença
      </button>
    </form>
    <p class="form-footer">
      Já confirmou? <a href="{{ route('site.eventos.obrigado', $event) }}">Ver lista de confirmados →</a><br>
      Quer dar um presente? <a href="{{ route('site.eventos.presentes', $event) }}">Ver sugestões →</a>
    </p>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const fullNameInput = document.getElementById('full_name');
  const companionsWrapper = document.getElementById('companions-wrapper');

  const toggleCompanions = function () {
    const hasName = fullNameInput.value.trim().length > 0;
    companionsWrapper.style.display = hasName ? 'block' : 'none';
  };

  fullNameInput.addEventListener('input', toggleCompanions);
  toggleCompanions();
});
</script>

@endsection
