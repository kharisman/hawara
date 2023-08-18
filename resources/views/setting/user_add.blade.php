@extends('layouts.layout')
@section('content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Form Tambah User</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Tambah User</h3>

                <div class="card-tools">
                  <a href="{{url('')}}/pengaturan/user" class="btn btn-tool" ><i class="fas fa-arrow-left"></i> &nbsp; Kembali
                  </a>
                </div>
              </div>
              <div class="card-body">
                <form class="form-horizontal" method="post" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User ketik di sini" value="{{old('nama')}}" required >
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email ketik di sini" value="{{old('email')}}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="roles" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="roles" name="roles">
                            <option value="">Pilih Role</option>
                            <option value="Super Admin" {{ old('roles') == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="Admin" {{ old('roles') == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Operator" {{ old('roles') == 'Operator' ? 'selected' : '' }}>Operator</option>
                            </select>
                            @error('roles')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Re-type Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-type Password" required>
                            </div>
                        </div>

                    
                       

                  
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Proses</button>
                        <button type="submit" class="btn btn-default float-right">Reset</button>
                        </div>
                </form>
                
              </div>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
  $(function () {
    
  });
</script>
@endsection