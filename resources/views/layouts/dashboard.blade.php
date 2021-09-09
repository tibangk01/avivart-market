<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }} | {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendors/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('public/vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('public/vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('public/vendors/plugins/jqvmap/jqvmap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/vendors/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('public/vendors/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/vendors/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/vendors/plugins/summernote/summernote-bs4.min.css') }}">
    {{-- Custom styles --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('public/vendors/dist/img/AdminLTELogo.png') }}"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark-primary navbar-light border-bottom-0 text-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <!-- Profil -->
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="far fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="background-color:#17a2b8">
                            <img src="{{ auth()->user()->library->remote }}" class="img-circle"
                                alt="User Image" />
                            <p>
                                {{ auth()->user()->full_name }}
                                <small>{{ session('staff')->staff_type->name }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <a href="" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i>
                                        Profil</a>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('page.logout') }}" class="btn btn-default btn-flat"><i
                                            class="fa fa-sign-out-alt"></i> Déconnexion</a>
                                </div>
                            </div>
                            {{-- <div class="pull-left">
                                <a href="{{ route('page.index') }}" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('page.logout') }}" class="btn btn-default btn-flat"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
                            </div> --}}
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-info elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('public/vendors/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ route('page.index') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tableau de bord
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('society.show', [1]) }}" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Société
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('agency.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Agences
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sale_place.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>
                                    Points de vente
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staff_type.index') }}" class="nav-link">
                                <i class=" nav-icon fas fa-list-alt" aria-hidden="true"></i>
                                <p>
                                    Types d'employés
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('conversion.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Unités de mesure
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('currency.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-euro-sign    "></i>
                                <p>
                                    Devises
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('discount.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Remises
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('exercise.index') }}" class="nav-link">

                                <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                                <p>
                                    Exercices
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vat.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-percent" aria-hidden="true"></i>
                                <p>
                                    TVAs
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('work.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>
                                    Fonctions
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product_type.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-ol"></i>
                                <p>
                                    Types de produit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('person_ray.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    Person rays
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product_ray.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-list-ol"></i>

                                <p>
                                    Rayons de produits
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('provider.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    Fournisseurs
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                <p>
                                    Clients
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Produits
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Bons de commande
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    Approvisionnements
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Proformas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{-- <i class="nav-icon fas fa-shopping-cart-plu"></i> --}}
                                <i class="nav-icon fas fa-shopping-bag    "></i>
                                <p>
                                    Commandes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Produits
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bank.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Banques
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staff.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employés
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cash_register.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Caisses
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title ?? 'Laravel' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#" class="text-bold">Tableau de bord</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#"
                                        class="text-bold">{{ $title ?? 'Laravel' }}</a>
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        @include('layouts.partials._validation_errors')
                    </div>
                </div>
            </div>

            {{-- @include('sweetalert::alert') --}}

            @yield('body')
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('public/vendors/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/vendors/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('public/vendors/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('public/vendors/custom/js/datatable.js') }}"></script>
    <!-- ChartJS -->
    // <script src="{{ asset('public/vendors/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('public/vendors/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{ asset('public/vendors/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/vendors/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/vendors/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('public/vendors/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('public/vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('public/vendors/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('public/vendors/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/vendors/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/vendors/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('public/vendors/dist/js/pages/dashboard.js') }}"></script> --}}
    <!-- Page specific script -->
</body>

</html>
