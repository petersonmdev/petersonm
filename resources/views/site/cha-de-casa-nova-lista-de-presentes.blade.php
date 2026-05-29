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
$presentesJson = <<<'JSON'
[
  {"nome":"Geladeira French Door 3 Portas","descricao":"O sonho de consumo de todo casal! Espaço para tudo: as compras do mês, as sobras do jantar, a tortinha da sogra e ainda aquela garrafa de vinho gelando para o fim de semana. A geladeira que a casa nova merece!","categoria":"Eletrodomésticos","recebido":true,"presenteado_por":"Alex, Gustavo, Gracyelle, Heloysa, Itallo, Juliano, Kethlen, Leidiane e Luiz"},
  {"nome":"Máquina de Lavar 13Kg","descricao":"Porque lavar roupa à mão é coisa do passado! Com 13kg de capacidade, dá pra resolver a roupa da semana toda de uma vez e ainda sobrar tempo para o que realmente importa: curtir a vida a dois!","categoria":"Eletrodomésticos","recebido":true,"presenteado_por":"Gleice e Pablo"},
  {"nome":"Fogão Cooktop 5 Bocas","descricao":"Cinco bocas para cozinhar tudo ao mesmo tempo! Porque na vida a dois, a cozinha vira palco e o casal que cozinha junto, fica junto. Aqui não tem desculpa para pedir delivery!","categoria":"Eletrodomésticos","recebido":true,"presenteado_por":"Karita e Remolo"},
  {"nome":"Air Fryer","descricao":"Porque amor é lindo, mas batata frita sem culpa é melhor ainda. Com essa air fryer, a vida a dois fica muito mais gostosa!","categoria":"Eletrodomésticos"},
  {"nome":"Panela Elétrica","descricao":"Para o arroz não queimar enquanto os dois estão distraídos um com o outro. Praticidade é o tempero do relacionamento!","categoria":"Eletrodomésticos"},
  {"nome":"Panela de Pressão Elétrica","descricao":"Feijão pronto em minutos! Porque o casal tem coisa mais importante pra fazer do que ficar na cozinha o dia todo.","categoria":"Eletrodomésticos"},
  {"nome":"Panela de Pressão","descricao":"A panela de pressão de todo lar que se preza. Para o feijão, para a carne e para aquele almoço de domingo que vai reunir todo mundo.","categoria":"Cozinha"},
  {"nome":"Jogo de Panelas Antiaderente","descricao":"Para nada grudar, nem na panela e nem no relacionamento. O kit perfeito para a cozinha dos dois!","categoria":"Cozinha"},
  {"nome":"Jogo de Frigideiras Antiaderente","descricao":"Ovos mexidos no café da manhã, jantar romântico na sexta... as frigideiras certas fazem toda a diferença na vida a dois.","categoria":"Cozinha"},
  {"nome":"Tábua de Corte","descricao":"O item que parece simples mas salva qualquer cozinha! Para picar, cortar e preparar tudo com segurança. Nenhuma bancada merece ser maltratada.","categoria":"Cozinha"},
  {"nome":"Escorredor de Macarrão","descricao":"Porque macarrão ao molho é programa de casal e ninguém merece perder o macarrão pelo ralo. Um clássico indispensável!","categoria":"Cozinha"},
  {"nome":"Suporte para Temperos","descricao":"Para a cozinha ter aquele charme de chef! Organiza os temperos, decora a bancada e ainda evita aquela pilha de potinhos espalhados.","categoria":"Cozinha"},
  {"nome":"Lixeira com Pedal","descricao":"Detalhe que faz toda a diferença no dia a dia! Prática, higiênica e essencial para manter a cozinha organizada sem precisar usar as mãos.","categoria":"Organização"},
  {"nome":"Jogo de Jantar","descricao":"Para impressionar nas visitas, nas jantinhas a dois e em tudo mais. Um belo aparelho de jantar é o começo de muitas histórias à mesa!","categoria":"Mesa Posta"},
  {"nome":"Jogo de Taças","descricao":"Todo lar novo merece um brinde! Essas taças vão estar presentes nas comemorações, nas sextas à noite e em todos os momentos especiais do casal.","categoria":"Mesa Posta"},
  {"nome":"Jogo de Xícaras","descricao":"Para o café da manhã juntinhos, aquele chazinho à tarde e as conversas que não têm hora para acabar. O começo do dia fica muito melhor assim!","categoria":"Mesa Posta"},
  {"nome":"Jogo de Bowls","descricao":"Para a salada, o caldo, o açaí de domingo e tudo mais. Versáteis e charmosos, esses bowls vão aparecer em todo cardápio do casal!","categoria":"Mesa Posta"},
  {"nome":"Abridor de Vinho","descricao":"Porque toda sexta-feira merece uma garrafinha. O presentinho pequeno que vai ser lembrado em cada taça aberta com amor!","categoria":"Mesa Posta"},
  {"nome":"Jogo de Facas","descricao":"Porque uma boa faca resolve qualquer situação na cozinha! O presente que parece simples, mas que o casal vai agradecer toda vez que cozinhar.","categoria":"Cozinha"},
  {"nome":"Jogo de Travessas de Vidro","descricao":"Para guardar as sobras do jantar, organizar a geladeira e ainda servir aquela salada bonita pra visita. Clássico e indispensável!","categoria":"Cozinha"},
  {"nome":"Jogo de Talheres","descricao":"Nada de comer com talher emprestado! Com esse conjunto, a mesa do casal fica completa e pronta para receber todo mundo.","categoria":"Mesa Posta"},
  {"nome":"Jogo de Assadeiras","descricao":"Para o bolo de domingo, o frango assado da semana e as receitas que os dois vão descobrir juntos. Porque cozinhar a dois é um programa e tanto!","categoria":"Cozinha"},
  {"nome":"Cafeteira","descricao":"O primeiro café na casa nova é sagrado. Presenteie o casal com muitas manhãs gostosas com esse presente que aquece o coração (e a xícara)!","categoria":"Eletrodomésticos"},
  {"nome":"Multiprocessador de Alimentos","descricao":"Para picar, fatiar e processar tudo em segundos. Porque o tempo que sobra na cozinha pode ser aproveitado muito melhor a dois!","categoria":"Eletrodomésticos"},
  {"nome":"Sanduicheira Preta","descricao":"Para os lanches da madrugada, o café da manhã preguiçoso de sábado e tudo mais. O presentinho pequeno que vai ser usado todo dia!","categoria":"Eletrodomésticos"},
  {"nome":"Bebedouro de Água","descricao":"Água gelada, natural ou quentinha para o chá. Porque hidratação também é cuidado, e cuidar um do outro começa em casa!","categoria":"Eletrodomésticos"},
  {"nome":"Potes Herméticos (Tupperware)","descricao":"Para organizar a geladeira, guardar as sobras e manter tudo no lugar. Porque um lar organizado é um lar feliz!","categoria":"Cozinha"},
  {"nome":"Micro-ondas","descricao":"Para esquentar a comida, descongelar a carne que esqueceu de tirar do freezer e salvar o jantar nos dias corridos. Essencial na vida a dois!","categoria":"Eletrodomésticos"},
  {"nome":"Forno Elétrico","descricao":"Para as pizzas caseiras, os bolos de aniversário e os assados de fim de semana. O forno que vai transformar a cozinha deles num espaço ainda mais especial.","categoria":"Eletrodomésticos"},
  {"nome":"Aspirador de Pó","descricao":"Porque a casa nova precisa ficar sempre linda! E cá entre nós, ninguém quer passar o fim de semana de vassourinha na mão quando dá pra resolver em minutos.","categoria":"Limpeza"},
  {"nome":"Ferro de Passar Roupa","descricao":"Para a roupa do trabalho, para o look do date e para aquela camisa que amassou na mala. Um presente discreto que o casal vai usar pra sempre!","categoria":"Limpeza"},
  {"nome":"Varal de Chão","descricao":"O herói silencioso de todo lar! Para os dias de chuva, as peças delicadas e tudo que não pode ir pra secadora. Simples e indispensável.","categoria":"Limpeza"},
  {"nome":"Kit de Limpeza","descricao":"Rodo, vassoura, balde e esfregão. Não é o presente mais glamouroso, mas é o mais honesto! Porque casa nova também precisa de uma boa faxina.","categoria":"Limpeza"},
  {"nome":"Cesto de Roupa Suja","descricao":"Para acabar de vez com a roupa jogada na cadeira! Um cesto bonito e prático que vai deixar o quarto organizado e evitar aquele atrito clássico do casal.","categoria":"Organização"},
  {"nome":"Jogo de Cama King","descricao":"Porque dormir bem juntinho é o começo de tudo! Um jogo de cama confortável e bonito é o presente que o casal vai adorar todo dia.","categoria":"Cama e Banho"},
  {"nome":"Jogo de Toalhas","descricao":"Para o banheiro ficar cheiroso, aconchegante e com aquele toque especial. Todo casal merece se enrolar numa toalha macia depois de um longo dia!","categoria":"Cama e Banho"},
  {"nome":"Jogo de Tapetes de Banheiro","descricao":"Para o banheiro ganhar personalidade e aquele toque acolhedor. Pisarão neles todo dia, com certeza com um sorriso no rosto!","categoria":"Cama e Banho"},
  {"nome":"Acessórios de Banheiro","descricao":"Saboneteira, porta-escovas, porta-shampoo... os detalhes que transformam um banheiro comum num espacinho com a cara do casal!","categoria":"Cama e Banho"},
  {"nome":"Almofadas Decorativas","descricao":"Para o sofá ficar com aquele charme de revista! Conforto, cor e personalidade para a sala onde os dois vão relaxar juntos.","categoria":"Decoração"},
  {"nome":"Quadros Decorativos","descricao":"Para as paredes não ficarem em branco na casa nova! Uma arte bonita transforma qualquer ambiente e conta um pouco da história do casal.","categoria":"Decoração"},
  {"nome":"Luminária de Cabeceira","descricao":"Para a leitura antes de dormir, para o clima mais intimista e para não ter que levantar até o interruptor. Um detalhezinho que muda tudo!","categoria":"Decoração"},
  {"nome":"Manta para Sofá","descricao":"Para as noites de filme, as tardes frias e os abraços no sofá. O presente mais aconchegante da lista, com certeza!","categoria":"Decoração"},
  {"nome":"Caixa de Ferramentas","descricao":"Martelo, chave de fenda, fita métrica... o presente que ninguém pensa em dar, mas que vai ser o primeiro a ser procurado na casa nova. Herói absoluto!","categoria":"Utilidades"},
  {"nome":"Régua de Extensão","descricao":"Porque tomada nunca é suficiente! Esse presentinho resolve qualquer pepino elétrico e vai ser usado desde o primeiro dia na casa nova.","categoria":"Utilidades"},
  {"nome":"Kit de Primeiros Socorros","descricao":"Torcicolos, um cortezinho na cozinha, dor de cabeça... o kit de primeiros socorros é aquele presente que demonstra cuidado de verdade com o casal!","categoria":"Utilidades"},
  {"nome":"Mesa de Jantar 6 Lugares","descricao":"O lugar onde as histórias vão ser contadas, os amigos vão se reunir e as refeições vão virar memórias. Um presente para a vida toda!","categoria":"Móveis"},
  {"nome":"Lava-Louças","descricao":"Acabou a briga de casal sobre quem lava a louça! Esse é o presente que traz paz, harmonia e muito mais tempo de qualidade para os dois. (consultar especificações de tamanho)","categoria":"Eletrodomésticos"}
]
JSON;

$presentes = collect(json_decode($presentesJson, true) ?: [])->map(function ($item) {
  $categoria = $item['categoria'] ?? 'Outros';

  return [
    'nome' => $item['nome'] ?? '',
    'descricao' => $item['descricao'] ?? '',
    'categoria' => $categoria,
    'categoria_slug' => \Illuminate\Support\Str::slug($categoria),
    'recebido' => (bool) ($item['recebido'] ?? false),
    'presenteado_por' => $item['presenteado_por'] ?? null,
  ];
})->values();

$categorias = $presentes->pluck('categoria')->unique()->values();
$whatsNumber = '556293625728';
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
  <button class="f-btn on" data-f="all">Todos · {{ count($presentes) }}</button>
  @foreach($categorias as $categoria)
    <button class="f-btn" data-f="{{ \Illuminate\Support\Str::slug($categoria) }}">{{ $categoria }}</button>
  @endforeach
</div>

<div class="gifts-wrap">
  <div class="gifts-grid" id="grid">
    @forelse($presentes as $presente)
        <div class="gift-card {{ $presente['recebido'] ? 'received' : '' }}" data-cat="{{ $presente['categoria_slug'] }}">
            <div class="gift-body">
                <span class="gift-cat">{{ $presente['categoria'] }}</span>
                <h3 class="gift-name">{{ $presente['nome'] }}</h3>
              @if($presente['recebido'])
                <div class="gift-received-badge">
                  <span class="gift-received-label">Presente ja ganho</span>
                  @if($presente['presenteado_por'])
                    <span class="gift-received-by">Presenteado por: {{ $presente['presenteado_por'] }}</span>
                  @endif
                </div>
              @endif
              @if($presente['categoria_slug'] === 'eletrodomesticos' && !$presente['recebido'])
                <span class="gift-note">Cor preferencial: Preto ou Inox</span>
              @endif
                <p class="gift-desc">{{ $presente['descricao'] }}</p>
                <div class="gift-foot">
                  @if($presente['recebido'])
                    <span class="text-success text-xs font-weight-bold">Item indisponivel para presentear.</span>
                  @else
                    @php
                      $msgPresente = rawurlencode("Oi! Quero presentear vocês com o {$presente['nome']}.\n\nPodem me passar os detalhes?");
                      $msgPix = rawurlencode("Oi! Prefiro fazer um pix para presentear vocês com o {$presente['nome']}.\n\nPodem me enviar a chave?");
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
    <a href="{{ route('site.cha-de-casa-nova-confirmacao') }}" class="btn-amarelo"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Confirmar Presença</a>
    <a href="{{ route('site.cha-de-casa-nova') }}" class="btn-ghost"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>Início</a>
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
