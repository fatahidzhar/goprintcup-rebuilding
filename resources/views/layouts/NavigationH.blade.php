<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <div style="">
                <a class="navbar-brand" href="/">
                    <img src="images/logo.png" alt="" style="width:100px;" />
                    <div style="display:flex;flex-direction:column;">
                        <span>
                            Go print Cup
                        </span>
                </a>
            </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/menu"> Menu </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="testimoni"> Testimonial </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keluhan"> Keluhan </a>
                </li> --}}
            </ul>
        </div>
        <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
            @guest
                @if (Route::has('login'))
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                @if (Auth::user()->is_admin == 0)
                    <a href="/cart" style="display:flex;border-right: 2px solid #fff;">
                        <i class="bi bi-basket3-fill"></i>
                    </a>
                    {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="home" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a> --}}

                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" type="button"
                            data-toggle="dropdown" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="home">Profil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                @elseif(Auth::user()->is_admin == 1)
                    {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="admin/home" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a> --}}
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" type="button"
                            data-toggle="dropdown" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="admin/home">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                @endif
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
                </li>
            @endguest
        </div>
    </div>
    </nav>
    </div>
</header>
