
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard.home') }}">
        <svg class="navbar-brand-img h-100" version="1.0" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
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
        <span class="ms-1 font-weight-bold">PetersonMDev</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('app/eventos*') ? 'active' : '') }}" href="{{ route('dashboard.eventos.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-calendar-alt ps-2 pe-2 text-center text-dark {{ (Request::is('app/eventos*') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Eventos</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
