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
                <h3>Informasi Pelamar</h3>
                <p><strong>Name:</strong> {{ $apply->user->name }}</p>
                <p><strong>Email:</strong> {{ $apply->user->email }}</p>
                <p><strong>Status:</strong> {{ $apply->status }}</p>
                <p><strong>Phone Number:</strong> {{ $apply->user->nomor_telepon }}</p>
                <p><strong>Applied At:</strong> {{ $apply->applied_at }}</p>

                <hr>
                
                <!-- Detail Tambahan from the form -->
                @if ($apply->formData)
                    <h3>Detail Tambahan</h3>
                    <p><strong>Alamat Berdasarkan KTP:</strong> {{ $apply->formData->ktp_text }}</p>
                    <p><strong>Provinsi KTP:</strong> {{ $apply->formData->ktp_provinsi }}</p>
                    <p><strong>Kota/Kabupaten KTP:</strong> {{ $apply->formData->ktp_kota }}</p>
                    <p><strong>Kecamatan KTP:</strong> {{ $apply->formData->ktp_kecamatan }}</p>
                    <p><strong>Kode Pos KTP:</strong> {{ $apply->formData->ktp_kodepos }}</p>
                    <p><strong>Alamat Berdasarkan Domisili:</strong> {{ $apply->formData->domisili_text }}</p>
                    <p><strong>Provinsi Domisili:</strong> {{ $apply->formData->domisili_provinsi }}</p>
                    <p><strong>Kota/Kabupaten Domisili:</strong> {{ $apply->formData->domisili_kota }}</p>
                    <p><strong>Kecamatan Domisili:</strong> {{ $apply->formData->domisili_kecamatan }}</p>
                    <p><strong>Kode Pos Domisili:</strong> {{ $apply->formData->domisili_kodepos }}</p>
                    <p><strong>Nama Sekolah/Perguruan Tinggi:</strong> {{ $apply->formData->nama_sekolah }}</p>
                    <p><strong>Jurusan/Program Studi:</strong> {{ $apply->formData->jurusan }}</p>
                    <p><strong>Tingkatan:</strong> {{ $apply->formData->tingkatan }}</p>
                    <p><strong>Nilai Akhir/IPK:</strong> {{ $apply->formData->nilai_akhir }}</p>
                    <p><strong>Status Pendidikan Terakhir:</strong> {{ $apply->formData->status }}</p>
                    <p><strong>Tanggal Lulus:</strong> {{ $apply->formData->tanggal_lulus }}</p>
                    <p><strong>Nama Perusahaan:</strong> {{ $apply->formData->nama_perusahaan }}</p>
                    <p><strong>Periode Kerja:</strong> {{ $apply->formData->periode_kerja }}</p>
                    <p><strong>Jabatan:</strong> {{ $apply->formData->jabatan }}</p>
                    <p><strong>Status Pekerjaan:</strong> {{ $apply->formData->status_pekerjaan }}</p>
                    <p><strong>CV File:</strong> {{ $apply->formData->cv }}</p>
                @else
                    <p>No Form Data available for this applicant.</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
