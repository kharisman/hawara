@extends('layouts.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pelamar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
                    <div class="image">
                        <img src="{{ url('') }}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image" style="width: 150px; height: 150px;">
                    </div>
                    <div class="info mt-3">
                        <h4>{{ $user->name }}</h4>
                    </div>
                </div>

                <h3>Detail Profile</h3>
                <ul>
                    @foreach ($applies as $apply)
                        <li><p><strong>Email:</strong> {{ $apply->user->email }}</p></li>
                        <li><p><strong>Status:</strong> {{ $apply->status }}</p></li>
                        <li><p><strong>Phone Number:</strong> {{ $apply->user->nomor_telepon }}</p></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</div>
@endsection
