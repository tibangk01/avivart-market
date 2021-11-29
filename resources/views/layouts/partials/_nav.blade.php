<nav class="main-header navbar navbar-expand {{ session('navbarTheme', 'navbar-dark text-light navbar-navy') }} border-bottom-0 text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Rechercher"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        {{-- @asyncWidget('notification') --}}

        <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link"><i class="fa fa-cog"></i></a>
        </li>

        <!-- Profil -->
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-user"></i>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header bg-danger">
                    <x-library :library='auth()->user()->library' class="img-circle img100_100 border" />
                    <p>
                        {{ auth()->user()->full_name }}
                        <small>{{ session('staff')->staff_type->name }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <a href="{{ route('user.show', auth()->id()) }}" class="btn btn-default btn-flat"><i class="fa fa-user-circle"></i>
                                Profil</a>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('page.logout') }}" class="btn btn-warning btn-flat"><i
                                    class="fa fa-sign-out-alt"></i> Déconnexion</a>
                        </div>
                    </div>
                </li>
            </ul>
        </li>

    </ul>
</nav>