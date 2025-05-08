<!-- Navbar -->
@if (auth()->user())
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}">
    <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ route('dashboard.home') }}">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
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
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('dashboard.home') }}">
            <i class="fa fa-chart-pie opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
            Dashboard
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link me-2" href="{{ url('profile') }}">
            <i class="fa fa-user opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
            Profile
        </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endif
<!-- End Navbar -->
