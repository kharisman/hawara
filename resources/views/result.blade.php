@extends('layouts.layout')
@section('content')
<style>
  .info-box a:link, .info-box a {
    color: #000 !important;
  }

  .announcement-wrapper {
    background-color: #f8f8f8;
    padding: 20px;
    border: 2px solid #ddd;
    border-radius: 10px;
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

  .announcement-countdown {
    font-size: 20px;
    font-weight: bold;
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
          <div class="announcement-countdown">
            <span id="days_{{ $apply->post->id }}">--</span> hari
            <span id="hours_{{ $apply->post->id }}">--</span> jam
            <span id="minutes_{{ $apply->post->id }}">--</span> menit
            <span id="seconds_{{ $apply->post->id }}">--</span> detik
          </div>
          @if ($apply->status === 'berhasil')
            <button class="btn btn-primary" onclick="generateCode('{{ $apply->id }}', '{{ $apply->kode }}', '{{ $apply->user->name }}')">Generate Kode</button>
          @elseif ($apply->status === 'pending')
            <button class="btn btn-warning" onclick="remindUser('{{ $apply->user->name }}', '{{ $apply->keterangan }}')">Klik Sini</button>
          @elseif ($apply->status === 'gagal')
            <button class="btn btn-primary" onclick="showThankYouMessage()">Ucapan Terima Kasih</button>
          @endif
        </div>
        <h6></h6>
        @endforeach
      </div>
    </section>
</div>
<script>
@foreach($applies as $apply)
  @php
    $announcementEndDate = \Carbon\Carbon::parse($apply->post->created_at)->addDays($apply->post->periode);
  @endphp

  var targetDate{{ $apply->post->id }} = new Date('{{ $announcementEndDate }}');

  var countdownInterval{{ $apply->post->id }} = setInterval(function() {
      var now = new Date().getTime();
      var timeRemaining = targetDate{{ $apply->post->id }} - now;

      var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

      document.getElementById('days_{{ $apply->post->id }}').textContent = days;
      document.getElementById('hours_{{ $apply->post->id }}').textContent = hours;
      document.getElementById('minutes_{{ $apply->post->id }}').textContent = minutes;
      document.getElementById('seconds_{{ $apply->post->id }}').textContent = seconds;

      if (timeRemaining < 0) {
          clearInterval(countdownInterval{{ $apply->post->id }});
          document.getElementById('days_{{ $apply->post->id }}').textContent = '00';
          document.getElementById('hours_{{ $apply->post->id }}').textContent = '00';
          document.getElementById('minutes_{{ $apply->post->id }}').textContent = '00';
          document.getElementById('seconds_{{ $apply->post->id }}').textContent = '00';
      }
  },1000);
  @endforeach

  function generateCode(applyId, applyKode, userName) {
      var kode = "Kode untuk " + userName + " : " + applyKode;

      Swal.fire({
          title: 'Kode',
          text: kode,
          icon: 'success',
          confirmButtonText: 'Tutup'
      });
  }

  function remindUser(userName, applyKeterangan) {
      Swal.fire({
          title: 'Keterangan',
          html: `Kepada ${userName}, ${applyKeterangan}`,
          icon: 'info',
          confirmButtonText: 'Tutup'
      });
  }

  function showThankYouMessage() {
      Swal.fire({
          title: 'Terima Kasih',
          text: 'Sudah Mengikuti Lowongan Ini.',
          icon: 'error',
          confirmButtonText: 'Tutup'
      });
  }
  
</script>
@endsection
