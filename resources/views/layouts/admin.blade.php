<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css?v=2">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <style>
    .mysidebar {
      background: rgb(2,0,36);
background: linear-gradient(180deg, rgba(2,0,36,1) 12%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 94%);
    } 

    .navbarku {
      background: rgb(2,0,36);
background: linear-gradient(95deg, rgba(2,0,36,1) 3%, rgba(9,9,121,1) 19%, rgba(0,212,255,1) 68%);
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> --}}
  <nav class="main-header navbar navbar-expand navbarku navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      


      
      <li class="nav-item">
        <form action="{{ route('logout', []) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> --}}
  <aside class="main-sidebar mysidebar elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <div class=" px-2 mt-1">
          <img src="{{ url('gambar', ['logokp.jpeg']) }}" alt="" class="brand-image  elevation-3">
      </div>
      <span class="brand-text font-weight-light text-bold text-lg">
        <b>
          <center>
            INVENTARIS BARANG
          </center>

        </b>
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('home', []) }}" class="nav-link @yield('warnadashboard')">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('item', []) }}" class="nav-link @yield('warnadata')">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Barang
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('keluar', []) }}" class="nav-link @yield('warnakeluar')">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Barang Keluar
              </p>
            </a>
          </li>


          <li class="nav-item">
            <hr class="bg-light">
            <a href="{{ url('habis', []) }}" class="nav-link @yield('warnahabis')">
              <i class="nav-icon fas fa-times"></i>
              <p>
                Data Barang Keluar
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('expired', []) }}" class="nav-link @yield('warnaexpired')">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Data Barang Expired
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
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">@yield('judul')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">@yield('judul')</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content">

        @yield('content')


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">ANDI RIZKY BAYU PUTRA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
@include('sweetalert::alert')
</body>
</html>
