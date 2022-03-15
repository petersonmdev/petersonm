<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('site/assets/img/favicons/apple-touch-icon.png.js') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('site/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('site/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('site/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('site/assets/img/favicons/mstile-150x150.png') }}">


    <!-- ===============================================-->
    <!--    Fonts-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;700&display=swap" rel="stylesheet">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('site/vendors/plyr/plyr.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendors/owl/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendors/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/assets/css/theme.css') }}" rel="stylesheet" />

  </head>


  <body data-theme="light">

    <!-- Loading - Splash -->
    <div class="loader">
      <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0.000000,100.000000) scale(0.052083,-0.051813)" fill="none" stroke="#fff" stroke-width="20">
          <path d="M940 1915 c-18 -22 -6 -42 30 -50 17 -4 37 -17 45 -29 21 -31 285
          -623 285 -638 0 -14 -269 -618 -283 -636 -6 -8 -27 -21 -46 -30 -24 -11 -36
          -24 -36 -37 0 -19 8 -20 310 -23 332 -3 351 0 384 47 10 14 79 164 154 332
          103 230 137 316 137 347 0 30 -34 116 -136 344 -74 167 -142 313 -150 326 -8
          13 -29 32 -47 42 -30 19 -52 20 -333 20 -255 0 -303 -2 -314 -15z m604 -55
          c31 -11 40 -28 196 -379 84 -190 120 -280 116 -296 -12 -48 -269 -611 -289
          -633 -20 -22 -25 -22 -255 -22 -183 0 -233 3 -229 13 3 6 67 148 141 314 97
          217 136 313 136 340 0 27 -40 128 -140 352 -77 173 -140 316 -140 318 0 8 442
          2 464 -7z"/>
          <path d="M319 1437 c-30 -20 -51 -61 -176 -337 -119 -264 -142 -323 -142 -365
          -1 -42 17 -91 130 -345 72 -162 140 -309 150 -326 37 -62 54 -65 391 -62 l303
          3 3 23 c3 18 -4 26 -32 37 -20 8 -42 25 -50 38 -28 42 -276 609 -276 629 0 17
          192 458 262 602 20 41 36 56 81 70 12 4 17 14 15 28 l-3 23 -311 3 c-310 2
          -311 2 -345 -21z m380 -348 c-114 -255 -139 -319 -139 -357 0 -37 19 -88 92
          -252 50 -113 113 -254 139 -313 l48 -108 -234 3 c-219 3 -236 4 -254 23 -24
          24 -291 618 -291 646 0 11 55 143 121 292 141 316 156 348 178 364 11 9 81 12
          248 13 l231 0 -139 -311z"/>
        </g>
      </svg>
    </div>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg fixed-top backdrop shadow-transition py-3">
        <div class="container p-0">
          <a class="navbar-brand d-flex fw-bold fs-2" href="{{ route('site.home') }}">
            <div class="d-inline-block align-top img-fluid logo-svg">
              <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,100.000000) scale(0.052083,-0.051813)" fill="none" stroke-width="20">
                  <path fill="#307982" d="M940 1915 c-18 -22 -6 -42 30 -50 17 -4 37 -17 45 -29 21 -31 285
                  -623 285 -638 0 -14 -269 -618 -283 -636 -6 -8 -27 -21 -46 -30 -24 -11 -36
                  -24 -36 -37 0 -19 8 -20 310 -23 332 -3 351 0 384 47 10 14 79 164 154 332
                  103 230 137 316 137 347 0 30 -34 116 -136 344 -74 167 -142 313 -150 326 -8
                  13 -29 32 -47 42 -30 19 -52 20 -333 20 -255 0 -303 -2 -314 -15z m604 -55
                  c31 -11 40 -28 196 -379 84 -190 120 -280 116 -296 -12 -48 -269 -611 -289
                  -633 -20 -22 -25 -22 -255 -22 -183 0 -233 3 -229 13 3 6 67 148 141 314 97
                  217 136 313 136 340 0 27 -40 128 -140 352 -77 173 -140 316 -140 318 0 8 442
                  2 464 -7z"/>
                  <path fill="#add05b" d="M319 1437 c-30 -20 -51 -61 -176 -337 -119 -264 -142 -323 -142 -365
                  -1 -42 17 -91 130 -345 72 -162 140 -309 150 -326 37 -62 54 -65 391 -62 l303
                  3 3 23 c3 18 -4 26 -32 37 -20 8 -42 25 -50 38 -28 42 -276 609 -276 629 0 17
                  192 458 262 602 20 41 36 56 81 70 12 4 17 14 15 28 l-3 23 -311 3 c-310 2
                  -311 2 -345 -21z m380 -348 c-114 -255 -139 -319 -139 -357 0 -37 19 -88 92
                  -252 50 -113 113 -254 139 -313 l48 -108 -234 3 c-219 3 -236 4 -254 23 -24
                  24 -291 618 -291 646 0 11 55 143 121 292 141 316 156 348 178 364 11 9 81 12
                  248 13 l231 0 -139 -311z"/>
                </g>
              </svg>
            </div>
          <!-- <img class="d-inline-block align-top img-fluid" src="assets/img/gallery/logo.png" alt="" width="200" /> -->
          </a>
          <button id="toggleDarkModeMobile" type="button" class="btn btn-toggle btn-acessibility me-0 ms-auto d-block d-mb-none d-lg-none" onclick="toggleDarkModeMobile()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-moon-fill" viewBox="0 0 16 16">
              <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
            </svg>
            <svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
              <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
            </svg>
          </button>
          <button class="navbar-toggler collapsed border-0 p-0 me-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenuContent" aria-controls="navbarMenuContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="50" onclick="this.classList.toggle('active')">
              <path class="line top" d="m 30,35 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
              <path class="line middle" d="m 30,50 h 40" />
              <path class="line bottom" d="m 30,65 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
            </svg>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0 d-lg-flex justify-content-end" id="navbarMenuContent">
            <div class="h-100">
              <ul class="navbar-nav ms-auto py-sm-2 py-0 d-md-12 d-lg-12 text-lg-right">
                <li class="nav-item py-3 py-lg-0 {{ (Route::current()->getName() === 'site.about' ? 'active': '') }}">
                  <a class="nav-link" href="{{ route('site.about') }}">
                    <small class="small-top-menu fw-normal lh-1 d-block">Um pouco</small>
                    Sobre mim
                    <small class="small-bottom-menu fw-normal lh-1 d-block">e minha experiência</small>
                  </a>
                </li>
                <li class="nav-item py-3 py-lg-0 {{ (Route::current()->getName() === 'site.portfolio' ? 'active': '') }}">
                  <a class="nav-link" href="{{ route('site.portfolio') }}">
                    <small class="small-top-menu fw-normal lh-1 d-block">Acesse o</small>
                    Portfólio
                    <small class="small-bottom-menu fw-normal lh-1 d-block">com meus projetos</small>
                  </a>
                </li>
                <li class="nav-item py-3 py-lg-0 {{ (Route::current()->getName() === 'site.service' ? 'active': '') }}">
                  <a class="nav-link" href="{{ route('site.service') }}">
                    <small class="small-top-menu fw-normal lh-1 d-block">Veja quais</small>
                    Serviços
                    <small class="small-bottom-menu fw-normal lh-1 d-block">eu poderia lhe ajudar</small>
                  </a>
                </li>
                <li class="nav-item py-3 py-lg-0 {{ (Route::current()->getName() === 'site.contact' ? 'active': '') }}">
                  <a class="nav-link" href="{{ route('site.contact') }}">
                    <small class="small-top-menu fw-normal lh-1 d-block">Entre em</small>
                    Contato
                    <small class="small-bottom-menu fw-normal lh-1 d-block">comigo</small>
                  </a>
                </li>
              </ul>
              <div class="d-md-12 d-lg-none w-100 pt-4 menu-link-social">
                <ul class="list-unstyled list-inline">
                  <li class="list-inline-item me-3">
                    <a href="https://api.whatsapp.com/send?phone=5562985261191&text=Ol%C3%A1%20Peterson!%20Poderia%20me%20ajudar%3F" target="_blank" rel="noopener noreferrer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                      </svg>
                    </a>
                  </li>
                  <li class="list-inline-item me-3">
                    <a href="https://www.instagram.com/petersondemacedo/" target="_blank" rel="noopener noreferrer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                      </svg>
                    </a>
                  </li>
                  <li class="list-inline-item me-3">
                    <a href="https://www.linkedin.com/in/peterson-macedo" target="_blank" rel="noopener noreferrer">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m160.007812 423h-70v-226h70zm6.984376-298.003906c0-22.628906-18.359376-40.996094-40.976563-40.996094-22.703125 0-41.015625 18.367188-41.015625 40.996094 0 22.636718 18.3125 41.003906 41.015625 41.003906 22.617187 0 40.976563-18.367188 40.976563-41.003906zm255.007812 173.667968c0-60.667968-12.816406-105.664062-83.6875-105.664062-34.054688 0-56.914062 17.03125-66.246094 34.742188h-.066406v-30.742188h-68v226h68v-112.210938c0-29.386718 7.480469-57.855468 43.90625-57.855468 35.929688 0 37.09375 33.605468 37.09375 59.722656v110.34375h69zm90 153.335938v-392c0-33.085938-26.914062-60-60-60h-392c-33.085938 0-60 26.914062-60 60v392c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60zm-60-412c11.027344 0 20 8.972656 20 20v392c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-392c0-11.027344 8.972656-20 20-20zm0 0" fill="currentColor"/></g></svg>
                    </a>
                  </li>
                </ul>
              </div>
              <h2 class="d-md-12 d-lg-none w-100 pt-3 m-0 fw-bold menu-link-social">
                <a href="https://api.whatsapp.com/send?phone=5562985261191&text=Ol%C3%A1%20Peterson!%20Poderia%20me%20ajudar%3F" target="_blank" rel="noopener noreferrer">
                  +55 62 98526-1191
                </a>
              </h2>
              <p class="d-md-12 d-lg-none w-100 menu-link-social">
                <a href="mailto:contato@petersonmacedo.com.br" target="_blank" rel="noopener noreferrer">
                  contato@petersonmacedo.com.br
                </a>
              </p>
            </div>
            <div class="btn-nav ms-5">
              <a href="{{ route('dashboard.home') }}" class="btn btn-lg btn-outline-primary d-none d-mb-inline-block d-lg-inline-block" type="submit">Acesso cliente</a>
            </div>
            
          </div>
        </div>
      </nav>

      @yield('content')


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6">

        <div class="container">
          <div class="row text-center">
            <div class="w-100">
              <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item me3 me-sm-4"><a class="text-decoration-none" href="{{ route('site.terms') }}">Termos e condições</a></li>
                <li class="list-inline-item me3 me-sm-4"><a class="text-decoration-none" href="{{ route('site.privacy') }}">Política de privacidade</a></li>
              </ul>
            </div>
          </div>
          <footer class="row text-center pt-3 mt-5 mb-0 pb-0">
            <div class="w-100">
              <p class="mx-auto my-0">Desenvolvido por <b>Peterson Macedo</b></p>
              <p class="mx-auto my-0">Todos direitos reservados &copy; {{ Date("Y") }} Peterson Macedo</p>
            </div>
          </footer>
          <div class="row text-center d-mb-none d-lg-none d-block pt-3">
            <div class="w-100 ">
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item me-3">
                  <a href="https://api.whatsapp.com/send?phone=5562985261191&text=Ol%C3%A1%20Peterson!%20Poderia%20me%20ajudar%3F" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                  </a>
                </li>
                <li class="list-inline-item me-3">
                  <a href="https://www.instagram.com/petersondemacedo/" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                  </a>
                </li>
                <li class="list-inline-item me-3">
                  <a href="https://github.com/petersonmdev/" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                      <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                  </a>
                </li>
                <li class="list-inline-item me-3">
                  <a href="https://www.behance.net/petersonmacedo" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-behance" viewBox="0 0 24 24"><path d="M22 7h-7v-2h7v2zm1.726 10c-.442 1.297-2.029 3-5.101 3-3.074 0-5.564-1.729-5.564-5.675 0-3.91 2.325-5.92 5.466-5.92 3.082 0 4.964 1.782 5.375 4.426.078.506.109 1.188.095 2.14h-8.027c.13 3.211 3.483 3.312 4.588 2.029h3.168zm-7.686-4h4.965c-.105-1.547-1.136-2.219-2.477-2.219-1.466 0-2.277.768-2.488 2.219zm-9.574 6.988h-6.466v-14.967h6.953c5.476.081 5.58 5.444 2.72 6.906 3.461 1.26 3.577 8.061-3.207 8.061zm-3.466-8.988h3.584c2.508 0 2.906-3-.312-3h-3.272v3zm3.391 3h-3.391v3.016h3.341c3.055 0 2.868-3.016.05-3.016z"/></svg>
                  </a>
                </li>
                <li class="list-inline-item me-3">
                  <a href="https://www.linkedin.com/in/peterson-macedo" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m160.007812 423h-70v-226h70zm6.984376-298.003906c0-22.628906-18.359376-40.996094-40.976563-40.996094-22.703125 0-41.015625 18.367188-41.015625 40.996094 0 22.636718 18.3125 41.003906 41.015625 41.003906 22.617187 0 40.976563-18.367188 40.976563-41.003906zm255.007812 173.667968c0-60.667968-12.816406-105.664062-83.6875-105.664062-34.054688 0-56.914062 17.03125-66.246094 34.742188h-.066406v-30.742188h-68v226h68v-112.210938c0-29.386718 7.480469-57.855468 43.90625-57.855468 35.929688 0 37.09375 33.605468 37.09375 59.722656v110.34375h69zm90 153.335938v-392c0-33.085938-26.914062-60-60-60h-392c-33.085938 0-60 26.914062-60 60v392c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60zm-60-412c11.027344 0 20 8.972656 20 20v392c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-392c0-11.027344 8.972656-20 20-20zm0 0" fill="currentColor"/></g></svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('site/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('site/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('site/vendors/plyr/plyr.polyfilled.min.js') }}"></script>
    <script src="{{ asset('site/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('site/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script type="text/javascript">
      $(window).on('load', function() {
        $('.loader').addClass('complete');
      })
    </script>
    

    
    <script src="{{ asset('site/assets/js/theme.js') }}"></script>
    <?php
    if ( Request::url() === route('site.home') ) : ?>
      <script type="text/javascript">
        consoleText(['Web develeper.', 'Desinger UX/UI.', 'Designer.'], 'text');
      </script>
    <?php endif; ?>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

</html>
