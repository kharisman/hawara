@extends('layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pelamar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pelamar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <h3>Applicant Information</h3>
                <p><strong>Name:</strong> {{ $apply->user->name }}</p>
                <p><strong>Phone Number:</strong> {{ $apply->user->nomor_telepon }}</p>
                <p><strong>Status:</strong> {{ $apply->status }}</p>
                <p><strong>Keterangan:</strong> {{ $apply->keterangan }}</p>
                <p><strong>Kode:</strong> {{ $apply->kode }}</p>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
