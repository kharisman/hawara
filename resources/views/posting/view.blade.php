@extends('layouts.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posting</a></li>
                        <li class="breadcrumb-item active">Detail Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Post Detail</h3>
            </div>
            <div class="card-body">
                <h2>Judul: {{ $post->title }}</h2>
                <p>Sub Judul: {{ $post->description }}</p>
                <hr>
                <p>Deskripsi: {{ $post->content }}</p>
                <!-- Add other fields here if needed -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
@endsection
