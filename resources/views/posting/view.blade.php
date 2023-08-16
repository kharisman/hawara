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
                <div class="post-header">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <p class="post-subtitle">{{ $post->description }}</p>
                    <p class="post-period">
                        <strong>Periode:</strong>
                        @if($post->periode_awal)
                            {{ \Carbon\Carbon::parse($post->periode_awal)->isoFormat('D MMMM Y') }} -
                        @endif
                        @if($post->periode_akhir)
                            {{ \Carbon\Carbon::parse($post->periode_akhir)->isoFormat('D MMMM Y') }}
                        @endif
                    </p>
                </div>
                <hr>
                <div class="post-content">
                    <p>{{ $post->content }}</p>
                    <!-- Add other fields here if needed -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
@endsection

@section('styles')
<style>
    .post-header {
        margin-bottom: 20px;
    }

    .post-title {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .post-subtitle {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .post-period {
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
    }

    .post-content {
        font-size: 16px;
    }
</style>
@endsection
