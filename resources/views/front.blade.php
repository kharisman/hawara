
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> HAWARA ID</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="https://hawara.id/wp-content/uploads/2023/06/cropped-hawara-133x74.png" alt="" srcset="">
  </div>
  
  <div class="card">
    <div class="card-body login-card-body">
        @if(session()->has('logout'))
            <div class="alert alert-info">
                Anda telah keluar dari aplikasi.
            </div>
        @endif
      <p class="login-box-msg">Form Registrasi</p>

      <form action="{{ route('register') }}"method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Tolong Perikasa Kembali
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="nomor_telepon" class="form-control" placeholder="Nomor telepon" name="nomor_telepon">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>

          </div>
          <!-- /.col -->
        </div>
      </form>

    <hr>
    <a href="{{url('')}}/login"> Sudah punya akun ? Silahkan login disini </a>

      {{-- <div class="social-auth-links text-center mb-3">
        <p>- Atau -</p>
        <a href="#" class="btn btn-block btn-primary">
           Daftar Sebagai admin sekolah
        </a>
        <a href="https://siswa.qtva.id" class="btn btn-block btn-danger">
           Daftar Sebagai Siswe
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
