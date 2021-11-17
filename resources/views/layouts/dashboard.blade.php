<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }} | {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm {{ session('sidebarCollapseValue', '') }}">
    <div class="wrapper">

        <!-- Preloader -->
        <x-preloader />

        <!-- Navbar -->
        @include('layouts.partials.dashboard._nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.dashboard._left_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    @if(!is_null($staffStatusBarInfo = session('staffStatusBarInfo')))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr class="table-success">
                                    <th>{{ $staffStatusBarInfo->cash_register->name }} le {{ $staffStatusBarInfo->day_transaction->getDay() }}</th>
                                    <td>{{ amountConverter($staffStatusBarInfo->amount) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endif

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title ?? 'Laravel' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('page.index') }}" class="">Tableau de bord</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        class="text-muted">{{ $title ?? 'Laravel' }}</a>
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('layouts.partials._validation_errors')
                        </div>
                    </div>
                </div>
            </div>

            {{-- @include('sweetalert::alert') --}}

            @yield('body')
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        @include('layouts.partials.dashboard._right_sidebar')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <x-footer />

    <!-- jQuery -->
    <script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('vendors/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('vendors/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('vendors/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('vendors/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('vendors/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('vendors/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('vendors/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('vendors/dist/js/demo.js') }}"></script>
    <script src="{{ asset('vendors/dist/js/pages/dashboard.js') }}"></script>
    
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('vendors/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('vendors/custom/js/datatable.js') }}"></script>

    <!-- Page specific script -->
    <script src="{{ asset('js/laroute.js') }}"></script>
    <script type="text/javascript" src="https://avivart.net/ecosoft/libs/js/jquery-active-page.js"></script>
    <script type="text/javascript">
        $('ul.nav-sidebar ul > li > a').matchactive();

        $('[data-widget]').click(function (e) {
            $.get(laroute.route('settings.index', {sidebar_collapse_value: null}), function (response, status) {
                console.log(response, status);
            });
        });

        $(document).ready(function(){
          $('.delete-form').on('submit', function(){
                if(confirm("Are you sure you want to delete it?"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
    </script>

    @livewireScripts

    @include('flashy::message')
</body>

</html>
