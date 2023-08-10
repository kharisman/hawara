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
                    <h1>List Applicant</h1>
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
                <h3 class="card-title">Search Applicant</h3>
                <form action="{{ route('lists.search') }}" method="GET" class="input-group mb-3">
                    <input type="text" class="form-control rounded-0" name="search" placeholder="Cari berdasarkan nama">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Cari</button>
                    </span>
                </form>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 2%">No</th>
                            <th style="width: 25%">Applicant Name</th>
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
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $apply->id }}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                    <div class="modal fade" id="deleteModal{{ $apply->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $apply->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $apply->id }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data pelamar ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('deleteForm{{ $apply->id }}').submit();">Hapus</button>
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
