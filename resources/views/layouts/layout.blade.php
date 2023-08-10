
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Report PalComTech </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/adminlte.min.css">


  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <script src="{{url('')}}/plugins/jquery/jquery.min.js"></script>
  <script src="{{url('')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables  & Plugins -->
  <script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{url('')}}/plugins/jszip/jszip.min.js"></script>
  <script src="{{url('')}}/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{url('')}}/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{url('')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{url('')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


  <script src="{{url('')}}/dist/js/adminlte.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fa fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">  Menu Pengaturan </span>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-key"></i>  Password
          </a>
          <div class="dropdown-divider"></div>
          <a  href="{{ route('logout') }}" class="dropdown-item dropdown-footer"> Keluar </a>
        </div>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('')}}" class="brand-link">
      {{-- <img src="{{url('')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light"> &nbsp; HAWARA ID</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('')}}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @if(Auth::user()->roles=="user" )
          <li class="nav-item">
            <a href="{{url('')}}/home" class="nav-link @if(Request::segment(1)=="home") active @endif " >
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('')}}/result" class="nav-link @if(Request::segment(1)=="result") active @endif " >
              <i class="nav-icon fas fa-list"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>

          @endif

          @if(Auth::user()->roles=="Super Admin" or Auth::user()->roles=="Admin" )

          <li class="nav-item">
            <a href="{{url('')}}/home" class="nav-link @if(Request::segment(1)=="home") active @endif " >
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('')}}/posting" class="nav-link @if(Request::segment(1)=="posting") active @endif " >
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Posting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('')}}/list" class="nav-link @if(Request::segment(1)=="list") active @endif " >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Applicant
              </p>
            </a>
          </li>

          @endif

        </ul>
      </nav>
    </div>
  </aside>
  @if(Session::has('success'))
      <script>
      $(document).ready( function () {
          Swal.fire({
              title: 'Berhasil !',
              text: '{{ Session::get('success') }}',
              icon: 'success',
              confirmButtonText: 'Tutup'
          })
      } );
      </script>
      @php
      Session::forget('success');
      @endphp
  @endif


  @if(Session::has('error'))
      <script>
      $(document).ready( function () {
          Swal.fire({
              title: 'Gagal !',
              text: '{{ Session::get('error') }}',
              icon: 'error',
              confirmButtonText: 'Tutup'
          })
      } );
      </script>
      @php
      Session::forget('error');
      @endphp
  @endif
  @yield('content')
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b>
    </div>
    <strong>Copyright &copy; 2023 <a href="#">HAWARA ID</a>.</strong> All rights reserved.
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
