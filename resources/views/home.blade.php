@extends('layouts.layout')

@section('content')
<style>
    .info-box a:link,
    .info-box a {
        color: #000 !important;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: white;
    }

    .card-title {
        margin: 0;
        padding: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .apply-button {
        margin-top: 10px;
    }

    .expired-label {
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Beranda</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">

            @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-period">
                        Periode:
                        @if($post->periode_awal)
                            {{ \Carbon\Carbon::parse($post->periode_awal)->isoFormat('D MMMM Y') }} -
                        @endif
                        @if($post->periode_akhir)
                            {{ \Carbon\Carbon::parse($post->periode_akhir)->isoFormat('D MMMM Y') }}
                        @endif
                        @if($post->periode_akhir && $post->periode_akhir < now())
                            <span class="expired-label">Expired</span>
                        @endif
                    </p>
                    <p class="card-description">{{ $post->content }}</p>
                    @if($post->periode_akhir && $post->periode_akhir >= now())
                        <a href="{{url('')}}/apply/{{$post->id}}" class="btn btn-success apply-button">Masukan Lamaran Anda</a>
                    @else
                        <p class="text-muted">Pendaftaran telah ditutup.</p>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </section>
</div>
@endsection
