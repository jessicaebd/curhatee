<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('storage/images/logo-only.png') }}" alt="" class="img-fluid">
                <span class="fw-bold fs-5 ms-2 text-white">Curhatee</span>
            </a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/#hero">@lang('navbar.home')</a></li>
                <li><a class="nav-link scrollto" href="/#about">@lang('navbar.about')</a></li>
                <li class="dropdown"><a href="/#features"><span>@lang('navbar.features')</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/consultation/psychologists">@lang('navbar.consultation')</a></li>
                        <li><a href="/forum">@lang('navbar.forum')</a></li>
                        <li><a href="/article">@lang('navbar.article')</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="/#contact">@lang('navbar.contact')</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <div class="d-flex">
            <ul class="d-flex navbar">
                <li class="nav-link d-flex">
                    <?php
                    $lang = App::getLocale();
                    ?>
                    <div class="d-flex justify-content-center align-items-center">
                        <a class="nav-link px-1 {{ ($lang != null) & ($lang == 'en') ? 'active' : '' }}"
                            href="/lang/en">EN</a>
                        <span class="px-1">|</span>
                        <a class="nav-link px-1  {{ ($lang != null) & ($lang == 'id') ? 'active' : '' }}"
                            href="/lang/id">ID</a>
                    </div>
                </li>

                @if (!Auth::check())
                    @if (Route::has('login'))
                        <button type="button" class="btn btn-green rounded rounded-pill px-3" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            {{ __('Login') }}
                        </button>

                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    @include('auth.login')
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <button type="button" class="btn btn-outline-light rounded rounded-pil ms-2"
                            data-bs-toggle="modal" data-bs-target="#registerModal">
                            {{ __('Register') }}
                        </button>

                        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    @include('auth.register')
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <li class="nav-link dropdown"><a href=""><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li>
                                <a href="/profile">@lang('navbar.my_profile')</a>
                            </li>
                            <li>
                                <a href="/consultation/">@lang('navbar.my_consultation')</a>
                            </li>
                            <li>
                                <a href="#">@lang('navbar.settings')</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    @lang('navbar.logout')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
