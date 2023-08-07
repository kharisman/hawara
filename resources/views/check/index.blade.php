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
                    <h1>List Approval</h1>
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
                            <th style="width: 2%" class="text-center">No</th>
                            <th style="width: 25%" class="text-center">Applicant Name</th>
                            <th style="width: 25%" class="text-center">Nomor Telepon</th>
                            <th style="width: 10%" class="text-center">Status</th>
                            <th style="width: 38%" class="text-center">Action</th>
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
                                <td class="project-actions text-right">
                                    <div class="btn-group">
                                        <form action="{{ route('update.status', ['id' => $apply->id, 'status' => 'pending']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info">Pending</button>
                                        </form>
                                        <form action="{{ route('update.status', ['id' => $apply->id, 'status' => 'gagal']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Gagal</button>
                                        </form>
                                        <form action="{{ route('update.status', ['id' => $apply->id, 'status' => 'berhasil']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Berhasil</button>
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
@endsection
