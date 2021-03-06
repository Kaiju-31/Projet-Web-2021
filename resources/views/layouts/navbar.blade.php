<div class="page-wrapper with-navbar with-sidebar with-navbar-fixed-bottom" data-sidebar-type="overlayed-all">
    <!-- Navbar (immediate child of the page wrapper) -->
    <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
    <nav class="navbar">
        <!-- Navbar brand -->
        <a href="{{ route("game.index") }}" class="navbar-brand">
            <img src="https://www.gethalfmoon.com/static/site/img/fake-logo.svg" alt="#">
        </a>
        @if(auth()->user())
            <a href="{{ route("register") }}"><h1>{{ ucwords(auth()->user()->name) }}</h1></a>
        @endif
        <!-- Navbar nav -->
        <ul class="navbar-nav d-none d-md-flex"> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px) -->
            <li class="nav-item dropdown with-arrow active">
                <a class="nav-link" data-toggle="dropdown" id="nav-link-dropdown-toggle">
                    GAMES
                    <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5= margin-left: 0.5rem (5px) -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
                    <a href="#" class="dropdown-item">PC</a>
                    <a href="#" class="dropdown-item">Nintendo</a>
                    <a href="#" class="dropdown-item">Playstation</a>
                    <a href="#" class="dropdown-item">Xbox</a>
                    <!--
                    <a href="#" class="dropdown-item">
                        Analytics
                        <strong class="badge badge-success float-right">New</strong>
                    </a>
                    -->
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-content">
                        <a href="#" class="btn btn-block" role="button">
                            All products
                            <i class="fa fa-angle-right ml-5" aria-hidden="true"></i> <!-- ml-5= margin-left: 0.5rem (5px) -->
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        @if(auth()->user())
            <a class="btn mr-5" href="{{ route('cart.show', auth()->user()->id) }}"><i class="fas fa-shopping-cart"><span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></i></a>
        @endif
        <!-- Navbar form (inline form) -->
        <div class="navbar-content ml-auto">
            <form class="form-inline d-none d-md-flex ml-auto" method="GET"> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px), ml-auto = margin-left: auto -->
                <input type="text" class="form-control" placeholder="Search" name="search">
                <button class="btn btn-success mr-5" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a href="{{ route("login") }}" class="btn btn-primary mr-5"><i class="far fa-user"></i></a>

            @if(auth()->user())
                <a class="btn btn-danger mr-5" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{ route("register") }}" class="btn btn-secondary mr-5"><i class="fas fa-user-plus"></i></a>
            @endif

            <button class="btn mr-5" type="button" onclick="halfmoon.toggleDarkMode()"><i class="fas fa-moon"></i></button>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <nav class="navbar navbar-fixed-bottom">
        <span class="navbar-text ml-auto">
            © Copyright 2021, Chotard Rodolf & Mourgues Paul
        </span>
    </nav>
</div>
