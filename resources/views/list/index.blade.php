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
<<<<<<< HEAD
                            <th style="width: 12%">Applicant Name</th>
                            <th style="width: 12%">Email</th>
                            <th style="width: 12%">Status</th>
                            <th style="width: 12%">Applied At</th>
                            <th style="width: 12%">Phone Number</th>
                            <th style="width: 12%">Registered At</th>
                            <th style="width: 22%"></th>
=======
                            <th style="width: 25%">Applicant Name</th>
                            <th style="width: 25%">Nomor Telepon</th>
                            <th style="width: 25%">Status</th>
                            <th style="width: 23%"></th>
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
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
<<<<<<< HEAD
                                <td>{{ $apply->user->email }}</td> <!-- Ganti "name" dengan nama kolom yang sesuai di tabel "users" -->
                                <td>{{ $apply->status }}</td>
                                <td>{{ $apply->applied_at }}</td>
                                <td>{{ $apply->user->nomor_telepon }}</td>
                                <td>{{ $apply->created_at }}</td>
                                <td class="project-actions text-right">
                                    {{-- <a class="btn btn-primary btn-sm" href="{{ route('view', ['id' => $post->id]) }}"> --}}
                                      <i class="fas fa-folder"></i>
                                      Detail
                                    </a>
                                    {{-- <form action="{{ route('delete', ['id' => $post->id]) }}" method="POST"> --}}
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                      </button>
                                    </form>
                                  </td>
=======
                                <td>{{ $apply->user->nomor_telepon }}</td>
                                <td>{{ $apply->status }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('list.view', ['id' => $apply->id]) }}">
                                      <i class="fas fa-folder"></i>
                                      Detail
                                    </a>
                                    <form action="{{ route('list.delete', ['id' => $apply->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
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
