@extends('layouts.layout')
@section('content')
<style>
.info-box a:link,.info-box a {
  color:#000 !important;
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
        <div class="announcement-wrapper">
          <h2 class="announcement-title">Pengumuman Penting</h2>
          <p class="announcement-description">Pengumuman penting akan diumumkan dalam beberapa hari lagi. Harap tetap di sini untuk informasi lebih lanjut.</p>
          <div class="announcement-countdown">
            <span id="days">--</span> hari
            <span id="hours">--</span> jam
            <span id="minutes">--</span> menit
            <span id="seconds">--</span> detik
          </div>
        </div>
      </div>
    </section>
</div>

<script>
// Mengatur tanggal dan waktu target pengumuman
var announcementDate = new Date('2023-07-18T09:00:00Z');

// Memperbarui hitungan mundur setiap detik
var countdownInterval = setInterval(function() {
  var now = new Date().getTime();
  var timeRemaining = announcementDate - now;

  // Menghitung hari, jam, menit, dan detik yang tersisa
  var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  // Memperbarui elemen HTML dengan nilai hitungan mundur
  document.getElementById('days').textContent = days;
  document.getElementById('hours').textContent = hours;
  document.getElementById('minutes').textContent = minutes;
  document.getElementById('seconds').textContent = seconds;

  // Menghentikan hitungan mundur setelah pengumuman selesai
  if (timeRemaining < 0) {
    clearInterval(countdownInterval);
    document.getElementById('days').textContent = '00';
    document.getElementById('hours').textContent = '00';
    document.getElementById('minutes').textContent = '00';
    document.getElementById('seconds').textContent = '00';
  }
}, 1000);
</script>
@endsection
