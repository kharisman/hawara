@extends('layouts.layout')

@section('content')
<style>
    .info-box a:link,
    .info-box a {
        color: #000 !important;
    }

    .announcement-wrapper {
        background-color: #f8f8f8;
        padding: 20px;
        border: 2px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .announcement-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .announcement-description {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .announcement-status {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .btn-reminder {
        background-color: #ffc107;
        border: none;
        color: #000;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Pengumuman</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @foreach($applies as $apply)
            <div class="announcement-wrapper">
                <h2 class="announcement-title">{{ $apply->post->title }}</h2>
                <p class="announcement-description">{{ $apply->post->content }}</p>
                <div class="announcement-status">
                    @if ($apply->status === 'berhasil')
                        Kode  : {{ $apply->kode }}
                        <hr>
                        {!! $apply->keterangan !!}
                    @elseif ($apply->status === 'pending')
                        <button class="btn btn-reminder" onclick="remindUser('{{ $apply->user->name }}', '{{ $apply->keterangan }}')">Klik Sini</button>
                    @elseif ($apply->status === 'gagal')
                        Maaf, Anda belum berhasil
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    function remindUser(name, keterangan) {
        alert('Pengingat untuk ' + name + ': ' + keterangan);
    }
</script>
@endsection
