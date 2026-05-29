@extends('cha.layout')

@section('title', 'Presença Confirmada · Chá de Casa Nova')

@push('styles')
<style>
.ty-hero{
  position:relative;z-index:1;
  display:grid;grid-template-columns:1fr 1fr;
  min-height:55vh;padding-top:64px;
  border-bottom:1px solid var(--border-dim);
}
.ty-left{
  padding:4rem 3.5rem;
  display:flex;flex-direction:column;justify-content:center;
  position:relative;z-index:2;
  background:linear-gradient(to right, #040d06 60%, transparent 100%);
}
.check-wrap{
  width:72px;height:72px;border-radius:50%;
  border:1.5px solid rgba(0,168,79,.35);
  display:flex;align-items:center;justify-content:center;
  margin-bottom:1.8rem;
  position:relative;
  animation:ringPop 2.5s ease infinite;
}
.check-wrap::before{content:'';position:absolute;inset:-7px;border-radius:50%;border:1px solid rgba(0,168,79,.1)}
@keyframes ringPop{0%,100%{box-shadow:0 0 0 0 rgba(0,168,79,.15)}50%{box-shadow:0 0 0 10px rgba(0,168,79,0)}}
.check-wrap svg{color:var(--verde-cl)}
.ty-eyebrow{font-family:'Barlow Condensed',sans-serif;font-weight:600;font-size:.68rem;letter-spacing:.3em;text-transform:uppercase;color:var(--verde-cl);margin-bottom:.6rem}
.ty-title{font-family:'Bebas Neue',sans-serif;font-size:clamp(3rem,6vw,5rem);letter-spacing:.04em;color:var(--branco);line-height:.9;margin-bottom:.5rem}
.ty-title em{font-style:normal;color:var(--amarelo)}
.ty-desc{font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.7;margin-bottom:2rem;max-width:400px}
.loc-note{display:inline-flex;align-items:center;gap:.7rem;padding:.8rem 1.1rem;background:rgba(245,196,0,.06);border:1px solid var(--border);border-radius:3px;font-size:.82rem;font-weight:300;color:var(--muted);margin-bottom:2rem}
.loc-note svg{color:var(--ouro-cl);flex-shrink:0}
.loc-note strong{color:var(--ouro-cl);font-weight:600}
.ty-ctas{display:flex;flex-wrap:wrap;gap:.8rem}

.ty-right{
  position:relative;overflow:hidden;
}
.ty-right img{width:100%;height:100%;object-fit:cover;object-position:top center;display:block;opacity:.75}
.ty-right::before{content:'';position:absolute;top:0;bottom:0;left:0;width:50%;background:linear-gradient(to right,#040d06,transparent);z-index:2}
.ty-right::after{content:'';position:absolute;bottom:0;left:0;right:0;height:35%;background:linear-gradient(to top,#040d06,transparent);z-index:2}

/* STATS */
.stats{
  position:relative;z-index:1;
  display:grid;grid-template-columns:repeat(3,1fr);
  border-bottom:1px solid var(--border-dim);
  max-width:900px;margin:0 auto;
}
.stat{padding:2rem;text-align:center;border-right:1px solid var(--border-dim)}
.stat:last-child{border-right:none}
.stat-n{font-family:'Bebas Neue',sans-serif;font-size:3rem;line-height:1;color:var(--verde-cl);display:block;margin-bottom:.2rem}
.stat-n.gold{color:var(--amarelo)}
.stat-l{font-family:'Barlow Condensed',sans-serif;font-size:.65rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--muted)}

/* LIST */
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

@media(max-width:800px){
  .ty-hero{grid-template-columns:1fr}
  .ty-right{height:50vw;min-height:200px}
  .ty-left{padding:3rem 1.5rem}
  .stats{grid-template-columns:repeat(3,1fr)}
  .stat{padding:1.2rem .5rem}
  .list-wrap,.cta-bar{padding-left:1.2rem;padding-right:1.2rem}
}
</style>
@endpush

@section('content')

<div class="ty-hero">
  <div class="ty-left">
    <div class="check-wrap">
      <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <p class="ty-eyebrow">Convocação confirmada</p>
    <h1 class="ty-title">Presença<br><em>Confirmada!</em></h1>
    <p class="ty-desc">Você está na lista! Agora é só esperar o grande dia e torcer juntos pelo Hexa.</p>
    <div class="loc-note">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      <span>O <strong>endereço</strong> será enviado em breve. Fique de olho!</span>
    </div>
    <div class="ty-ctas">
      <a href="{{ route('cha.presentes') }}" class="btn-amarelo"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="8" width="18" height="14" rx="1"/><path d="M12 8V22M8 8C8 5.8 9.8 4 12 4s4 1.8 4 4"/></svg>Lista de Presentes</a>
      <a href="{{ route('cha.index') }}" class="btn-ghost"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>Página Inicial</a>
    </div>
  </div>
  <div class="ty-right">
    <img src="{{ asset('images/cha/hero_bg.jpg') }}" alt="Peterson e Amanda">
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
    @forelse($confirmados as $i => $confirmado)
        <div class="row" style="animation-delay:{{ $i * 0.04 }}s">
            <span class="row-n">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
            <div class="row-av">{{ strtoupper(substr($confirmado->nome, 0, 1)) }}{{ strtoupper(substr(Str::of($confirmado->nome)->explode(' ')->get(1, 'A'), 0, 1)) }}</div>
            <span class="row-name">{{ $confirmado->nome }}</span>
            <span class="row-comp">
                {{ $confirmado->acompanhantes == 0 ? 'Sozinho(a)' : '+' . $confirmado->acompanhantes . ' acomp.' }}
            </span>
            <div class="row-check">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
        </div>
    @empty
        <div style="padding:3rem;text-align:center;font-family:'Barlow Condensed',sans-serif;font-size:1rem;letter-spacing:.1em;color:var(--muted)">
            Nenhuma confirmação ainda. Seja o primeiro!
        </div>
    @endforelse
</div>
      <span class="row-name">Ana Clara Souza</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">02</span>
      <div class="row-av">BF</div>
      <span class="row-name">Bruno Ferreira</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">03</span>
      <div class="row-av">CR</div>
      <span class="row-name">Camila &amp; Rafael</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">04</span>
      <div class="row-av">DA</div>
      <span class="row-name">Diego Almeida</span>
      <span class="row-comp">+2 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">05</span>
      <div class="row-av">FC</div>
      <span class="row-name">Fernanda Costa</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">06</span>
      <div class="row-av">GO</div>
      <span class="row-name">Gabriel Oliveira</span>
      <span class="row-comp">+3 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">07</span>
      <div class="row-av">HM</div>
      <span class="row-name">Helena Martins</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">08</span>
      <div class="row-av">IS</div>
      <span class="row-name">Igor Santos</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">09</span>
      <div class="row-av">JP</div>
      <span class="row-name">Juliana Pereira</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">10</span>
      <div class="row-av">LR</div>
      <span class="row-name">Lucas Rodrigues</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">11</span>
      <div class="row-av">ML</div>
      <span class="row-name">Mariana Lima</span>
      <span class="row-comp">+2 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">12</span>
      <div class="row-av">NC</div>
      <span class="row-name">Nathan Carvalho</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">13</span>
      <div class="row-av">ON</div>
      <span class="row-name">Olivia Nascimento</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">14</span>
      <div class="row-av">PH</div>
      <span class="row-name">Paulo Henrique Silva</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">15</span>
      <div class="row-av">RG</div>
      <span class="row-name">Renata Gomes</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">16</span>
      <div class="row-av">TM</div>
      <span class="row-name">Thiago Mendes</span>
      <span class="row-comp">+2 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">17</span>
      <div class="row-av">VR</div>
      <span class="row-name">Vanessa Ribeiro</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">18</span>
      <div class="row-av">WB</div>
      <span class="row-name">Wesley Barros</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">19</span>
      <div class="row-av">YT</div>
      <span class="row-name">Yasmin Torres</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">20</span>
      <div class="row-av">ZC</div>
      <span class="row-name">Zé Carlos Pinto</span>
      <span class="row-comp">+3 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">21</span>
      <div class="row-av">AF</div>
      <span class="row-name">Aline Freitas</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">22</span>
      <div class="row-av">BA</div>
      <span class="row-name">Bernardo Araújo</span>
      <span class="row-comp">+1 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">23</span>
      <div class="row-av">CV</div>
      <span class="row-name">Cíntia Vieira</span>
      <span class="row-comp">Sozinho(a)</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div><div class="row">
      <span class="row-n">24</span>
      <div class="row-av">DC</div>
      <span class="row-name">Danilo Campos</span>
      <span class="row-comp">+2 acomp.</span>
      <div class="row-check"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
    </div></div>
</div>
<div class="cta-bar">
  <a href="{{ route('cha.presentes') }}" class="btn-amarelo"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="8" width="18" height="14" rx="1"/><path d="M12 8V22M8 8C8 5.8 9.8 4 12 4s4 1.8 4 4"/></svg>Ver Lista de Presentes</a>
  <a href="{{ route('cha.confirmacao') }}" class="btn-ghost"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>Indicar um Amigo</a>
</div>

@endsection
