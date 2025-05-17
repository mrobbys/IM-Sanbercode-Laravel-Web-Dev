<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center gap-3">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">Company</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/genres"
                        class="{{ Request::is('genres') || Request::is('genres/*') ? 'active' : '' }}">Genres</a></li>
                <li><a href="/posts"
                        class="{{ Request::is('posts') || Request::is('posts/*') ? 'active' : '' }}">Post</a></li>
                @auth
                    <li><a href="/profile"
                            class="{{ Request::is('profile') || Request::is('profile/*') ? 'active' : '' }}">Profile</a>
                    </li>
                @endauth

                @guest()
                    <li><a href="/login" class="text-primary">Login</a></li>
                    <li><a href="/register" class="text-info">Register</a></li>
                @endguest

                @auth()
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @endauth

            </ul>


            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>



    </div>
</header>
