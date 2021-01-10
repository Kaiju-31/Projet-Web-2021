<div class="page-wrapper with-navbar with-sidebar with-navbar-fixed-bottom" data-sidebar-type="overlayed-all">
    <!-- Navbar (immediate child of the page wrapper) -->
    <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
    <nav class="navbar">
        <div class="navbar-content">
            <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>
        <!-- Navbar brand -->
        <a href="#" class="navbar-brand">
            <img src="https://www.gethalfmoon.com/static/site/img/fake-logo.svg" alt="#">
        </a>
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
        <!-- Navbar form (inline form) -->
        <div class="navbar-content ml-auto">
            <form class="form-inline d-none d-md-flex ml-auto" action="..." method="..."> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px), ml-auto = margin-left: auto -->
                <input type="search" class="form-control" placeholder="Search" name="search">
                <button class="btn btn-success mr-5" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a href="" class="btn btn-primary mr-5"><i class="far fa-user"></i></a>
            <button class="btn mr-5" type="button" onclick="halfmoon.toggleDarkMode()"><i class="fas fa-moon"></i></button>
        </div>
    </nav>

    <div class="sidebar">
        <div class="sidebar-menu">
            <!-- Sidebar brand -->
            <a href="#" class="sidebar-brand">
                @yield('login_member')
            </a>
            <!-- Sidebar links and titles -->
            <h5 class="sidebar-title">My Account</h5>
            <div class="sidebar-divider"></div>
            <a href="#" class="sidebar-link">Update my profile</a>
            <a href="#" class="sidebar-link">My commands</a>

        </div>
    </div>

    <div class="content-wrapper">
        @yield('content')
    </div>
    <nav class="navbar navbar-fixed-bottom">
        <span class="navbar-text ml-auto">
            © Copyright 2021, Chotard Rodolf & Mourgues Paul
        </span>
    </nav>
</div>
