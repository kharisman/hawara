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
                    <h1>Dashboard</h1>
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
                <h3 class="card-title">Search Post</h3>
                <form action="{{ route('posts.search') }}" method="GET" class="input-group mb-3">
                    <input type="text" class="form-control rounded-0" name="search" placeholder="Cari berdasarkan judul">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Cari</button>
                    </span>
                </form>
                <a href="/create"><button type="button" class="btn btn-block btn-success">Buat Post</button></a>
            </div>            
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 2%">No</th>
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
                          <td><a><h5>{{ $post->title }}</h5></a><br /><small>Created {{ $post->created_at }}</small></td>
                          <td><p>{{ $post->description }}</p></td>
                          <td><p>{{ $post->periode }}</p></td>
                          <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('post.view', ['id' => $post->id]) }}">
                              <i class="fas fa-folder"></i>
                              Detail
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', ['id' => $post->id]) }}">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </a>
                            <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST" id="deleteForm{{ $post->id }}">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $post->id }}">
                                  <i class="fas fa-trash"></i>
                                  Delete
                              </button>
                            </form>
                            <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $post->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus posting ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('deleteForm{{ $post->id }}').submit();">Hapus</button>
                                        </div>
                                    </div>
                                </div>
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
@endsection