@extends('layouts.layout')

@section('content')
<style>
    .info-box a:link, .info-box a {
      color: #000 !important;
    }
    .action-buttons {
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Posting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Posting</li>
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
                
                <a href="/create"><button type="button" class="btn  btn-success">Buat Post</button></a>
            </div>            
            <div class="card-body">
                <table class="table table-striped " id="data">
                    <thead>
                        <tr>
                            <th style="width: 2%">No</th>
                            <th style="width: 2%">Tanggal </th>
                            <th style="width: 25%">Judul</th>
                            <th style="width: 35%">Deskripsi</th>
                            <th style="width: 10%">Periode</th>
                            <th style="width: 28%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $number = 1; // Inisialisasi nomor urutan
                      @endphp
                      @foreach($posts as $post)
                        <tr>
                          <td> {{ $number }} </td>
                          <td>{{  \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMMM Y') }}</td>
                          <td>{{ $post->title }}</td>
                          <td><p>{{ $post->description }}</p></td>
                          <td><p>@if($post->periode_awal) {{  \Carbon\Carbon::parse($post->periode_awal)->isoFormat('D MMMM Y') }} @endif -
                          @if($post->periode_akhir) {{  \Carbon\Carbon::parse($post->periode_akhir)->isoFormat('D MMMM Y') }} @endif 
                           </p></td>
                          <td class="project-actions text-right">

                                    <div class="action-buttons">
                                        <a class="btn btn-sm btn-primary" href="{{ route('post.view', ['id' => $post->id]) }}">
                                            <i class="fas fa-folder"></i> Detail
                                        </a>
                                        <a class="btn btn-sm btn-info" href="{{ route('post.edit', ['id' => $post->id]) }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST" id="deleteForm{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteModal" data-postid="{{ $post->id }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>

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