<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="{{ asset('js/ekko-lightbox.js') }}"></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/ekko-lightbox.css') }}">
        <style>
            .center-image {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .red-text {
                color: red;
            }
        </style>
    
        <!-- adminLTE js-->
        <!-- Bootstrap 4 -->
        <script src="{{asset('template/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- jQuery -->
        <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- jsGrid -->
        <script src="{{asset('template/plugins/jsgrid/demos/db.js')}}"></script>
        <script src="{{asset('template/plugins/jsgrid/jsgrid.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>
        <script>
            
        </script>
        <!-- Sparkline -->
        <script src="{{asset('template/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{asset('template/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('template/dist/js/adminlte.js')}}"></script>
        <script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{asset('template/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    
        <!--pushmenu -->
        <script src="{{asset('template/build/js/PushMenu.js')}}"></script>
    
        <!--dataTables-->
        <script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, 
                    "lengthChange": true, 
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
                $("#example3").DataTable({
                    "responsive": true, 
                    "lengthChange": true, 
                    "autoWidth": false,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $("#noHeader").DataTable({
                    "responsive": true, 
                    "lengthChange": true, 
                    "autoWidth": false,

                });
            });

        </script>
        
    
        <!--adminLTE css-->
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('template/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('template/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('template/plugins/summernote/summernote-bs4.min.css')}}">
        <!--dataTables-->
        <link rel="stylesheet" href="{{asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{asset('template/plugins/fullcalendar/main.css')}}">
    
    </head>
<body>
    <div id="app" class="wrapper">
        @if (Auth::check())
        <nav class="navbar navbar-expand navbar-white navbar-light sticky-top main-header ">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" role="button" href="#" data-auto-collapse-size="768"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        {{ __('Logout') }}
                    </a>
                </li>
                @endguest
            </ul>
       
            
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4 fixed">
            <!-- Brand Logo -->
            <a href="
                @if (Auth::user()->role === "pengurus") 
                    {{route('pengurus.home')}}
                @elseif (Auth::user()->role === "anggota")
                    {{route('anggota.home')}}
                @endif
            "class="brand-link">
                <img src="{{asset('asset/logo-ikapen.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIKAP</span>
            </a>
        
            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <a href="{{url('/pengurus/home/profile')}}">
                    <div class="image">
                        @if (Auth::user()->foto)
                            <img src="/foto_user/{{Auth::user()->foto}}" class="rounded-circle" width="40" height="40" alt="User Image">
                        @else 
                            <img src="/asset/defaultphoto.png" class="rounded-circle" width="40" height="40" alt="User Image">
                        @endif
                    </div>
                    <div class="info">                      
                        Welcome, {{ Auth::user()->name }}                        
                    </div>
                </a>
            </div>
        
              <!-- SidebarSearch Form -->
              <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
              </div>
        
            <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                @if (Auth::user()->role === "pengurus")
                    <li class="nav-item">
                        <a href="{{route('pengurus.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Pengurus
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('anggota.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Anggota
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('arsip.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-file"></i>
                        <p>
                            Arsip
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('pengumuman.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-file"></i>
                        <p>
                            Pengumuman
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('artikel.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-file"></i>
                        <p>
                            Artikel
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('surat.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-file"></i>
                        <p>
                            Surat
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('pengurus/home/permohonan')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-file"></i>
                        <p>
                            Permohonan
                        </p>
                        </a>
                    </li>
                @elseif (Auth::user()->role === "anggota")
                    <li class="nav-item">
                        <li class="nav-item">
                            <a href="{{route('arsip.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-file"></i>
                            <p>
                                Arsip
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('pengumuman.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-file"></i>
                            <p>
                                Pengumuman
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('artikel.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-file"></i>
                            <p>
                                Artikel
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('surat.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-file"></i>
                            <p>
                                Surat
                            </p>
                            </a>
                        </li>
                    </li>
                @endif
                </ul>
              </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!--main class="py-4"-->
        <main>
            <section class="content">
                <div class="container-fluid">
                    @if (Auth::check())
                        <div class="content-wrapper">
                            <div class="col">
                                @if ($errors->any())
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="alert alert-danger">
                                            <strong>Terjadi Kesalahan Input:</strong> Silahkan periksa kembali input anda<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                                
                                @if ($message = Session::get('succes'))
                                    <div class="card bg-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data Berhasil</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{$message}}
                                        </div>
                                    </div>
                                @elseif ($message = Session::get('updated'))
                                    <div class="card bg-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Ubah Data Berhasil</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{$message}}
                                        </div>
                                    </div>
                                @elseif ($message = Session::get('deleted'))
                                    <div class="card bg-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Hapus Data Berhasil</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{$message}}
                                        </div>
                                    </div>
                                @endif
                                </div>
                                @yield('content')
                            </div>
                        </div>
                        @if ($errors->any())
                            <script>
                                Swal.fire(
                                'Input Data Gagal',
                                'Terdapat kesalahan input, harap periksa kembali form anda',
                                'error'
                                )
                            </script>
                        @endif
                    @else
                        @yield('content')
                    @endif
                </div>
            </section>
        </main>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
</body>
</html>
