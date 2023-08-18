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
              <li class="breadcrumb-item active">Data User</li>
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
                <h3 class="card-title">Data user</h3>

                <div class="card-tools">
                  <a href="{{url('')}}/pengaturan/user/tambah" class="btn btn-tool" ><i class="fas fa-plus"></i>
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama </th>
                    <th>email</th>
                    <th>Akses</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($datas as $key => $value)
                  <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->roles}}</td>
                    <td>
                    <a href="{{url('')}}/pengaturan/user/edit?id={{$value->id}}" type="button" class=""><i class="fa fa-edit"></i> Edit </a>
                    <form method="POST" action="{{url("/")}}/pengaturan/user/delete/{{$value->id}}" >
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <a href="#" class="text-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'> <i class="fa fa-times"></i> Delete</a>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                 
                </table>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
  $(function () {
    $("#example1").DataTable({
      
    order: [[0, 'desc']],
      "responsive": true, "lengthChange": false, "autoWidth": false,
    })  
  });

  $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Yakin ingin menghapus data ini?"
            , text: "Jika data ini dihapus. data akan hilang selama nya."
            , icon: "warning"
            , type: "warning"
            , showDenyButton: true
            , confirmButtonText: 'Hapus'
            , denyButtonText: `Batal`
        , }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
@endsection