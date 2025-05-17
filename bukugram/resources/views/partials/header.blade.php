<div id="header-wrap">
    <header id="header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="/"><img src="{{ asset('template/images/main-logo.png') }}" alt="logo"></a>
                    </div>

                </div>

                <div class="col-md-10">

                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item {{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a>
                                </li>
                                <li class="menu-item"><a href="/books"
                                        class="nav-link {{ Request::is('books') || Request::is('books/*') ? 'active' : '' }}">Books</a>
                                </li>
                                <li class="menu-item"><a href="/genres"
                                        class="nav-link {{ Request::is('genres') || Request::is('genres/*') ? 'active' : '' }}">Genres</a>
                                </li>
                                @auth
                                    <li class="menu-item"><a href="/profile"
                                            class="nav-link {{ Request::is('profile') || Request::is('profile/*') ? 'active' : '' }}">Profile</a>
                                    </li>
                                @endauth


                                @guest()
                                    <li class="menu-item"><a href="/login"
                                            class="nav-link bg-dark-subtle text-dark fw-bold">Login</a></li>
                                    <li class="menu-item"><a href="/register"
                                            class="nav-link bg-dark text-light fw-bold">Register</a></li>
                                @endguest

                                @auth()
                                    <li class="menu-item">
                                        <button class="nav-link bg-dark-subtle text-dark fw-bold btn-logout"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </button>
                                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>

                        </div>
                    </nav>

                </div>

            </div>
        </div>
    </header>

</div>
