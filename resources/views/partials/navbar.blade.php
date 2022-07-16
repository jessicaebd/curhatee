@if (Auth::check() && Auth::user()->role == 'Admin')
    <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
        <a class="col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">
            <img src="{{ asset('storage/images/logo-only.png') }}" alt="" style="height: 2rem" loading="lazy">
            <span class="fw-bold fs-5 ms-2" style="color: #2934D0;">Curhatee</span>
        </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>
@elseif (!Auth::check())
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('storage/images/logo-only.png') }}" alt="" class="img-fluid">
                    <span class="fw-bold fs-5 ms-2 text-white">Curhatee</span>
                </a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li class="dropdown"><a href="#features"><span>Features</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/consultation/psychologists">Consultation</a></li>
                            <li><a href="/forum">Forum</a></li>
                            <li><a href="/article">Article</a></li>

                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
@else
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex align-items-center">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand mt-2 mt-lg-0" href="{{ url('/') }}">
                    <img src="{{ asset('storage/images/logo-only.png') }}" alt="" style="height: 2rem"
                        loading="lazy">
                    <span class="text-primary fw-bold ms-2">Curhatee</span>
                </a>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/consultation/psychologists">@lang('navbar.consultation')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/forum">@lang('navbar.forum')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/article">@lang('navbar.article')</a>
                    </li>
                </ul>
            </div>



            <div class="d-flex align-items-center">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <div class="d-flex">
                            <?php
                            $lang = App::getLocale();
                            ?>
                            <a class="nav-link {{ ($lang != null) & ($lang == 'en') ? 'active' : '' }}"
                                href="/lang/en">EN</a>
                            <a class="nav-link  {{ ($lang != null) & ($lang == 'id') ? 'active' : '' }}"
                                href="/lang/id">ID</a>
                        </div>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if (Auth::user() && Auth::user()->isAdmin())
                            {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                        @elseif (Auth::user())
                            <button type="button" class="btn btn-primary position-relative">
                                <i class="bi bi-bell-fill"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    99+
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>

                            <div class="dropdown ms-4 my-auto">
                                <a class="dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('storage/images/users/' . Auth::user()->image) }}"
                                        alt="Profile Picture" class="rounded-circle"
                                        style="height: 2.3rem; width: 2.3rem;">
                                    {{-- <span class="fw-bold" style="color: #2934D0;">{{ Auth::user()->name }}</span> --}}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/profile">@lang('navbar.my_profile')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/consultation/">@lang('navbar.my_consultation')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">@lang('navbar.settings')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endif
