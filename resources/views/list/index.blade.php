@extends('layouts.layout')

@section('content')
<style>
    .info-box a:link, .info-box a {
      color: #000 !important;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelamar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <table class="table table-striped projects " id="data">
                    <thead>
                        <tr>
                            <th style="width: 2%">No</th>
                            <th style="width: 25%">Nama Pelamar</th>
                            <th style="width: 18%">Nomor Telepon</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 10%">kode</th>
                            <th style="width: 30%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1; // Inisialisasi nomor urutan
                        @endphp
                        @foreach($applies as $apply)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $apply->user->name }}</td>
                                <td>{{ $apply->user->nomor_telepon }}</td>
                                <td>{{ $apply->status }}</td>
                                <td>{{ $apply->kode }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('list.view', ['id' => $apply->id]) }}">
                                      <i class="fas fa-folder"></i>
                                      Detail
                                    </a>
                                    <form action="{{ route('list.delete', ['id' => $apply->id]) }}" method="POST" id="deleteForm{{ $apply->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-postid="{{ $apply->id }}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @php
                                $number++; // Increment nomor urutan setiap perulangan
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus posting ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#data").DataTable({
            order: [[0, 'asc']],
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });

        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var postId = button.data('postid'); // Dapatkan id posting dari atribut data
            var modal = $(this);

            // Set id posting di modal konfirmasi
            modal.find('#confirmDeleteButton').data('postid', postId);

            // Menangani aksi penghapusan saat tombol "Hapus" di modal diklik
            $('#confirmDeleteButton').on('click', function () {
                var postId = $(this).data('postid');
                var form = $('#deleteForm' + postId);

                form.submit(); // Lakukan submit form penghapusan
            });
        });
    });
</script>
@endsection
