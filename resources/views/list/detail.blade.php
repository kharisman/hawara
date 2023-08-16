@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="{{url('')}}/plugins/summernote/summernote-bs4.min.css">
<script src="{{url('')}}/plugins/summernote/summernote-bs4.min.js"></script>
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
                <p><strong>Applied At:</strong> {{ $apply->created_at }}</p>

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
                    @if ($apply->formData->cv)
                        <p><strong>CV File:</strong> <a href="{{ asset('path_to_your_cv_files/' . $apply->formData->cv) }}" download>Download CV</a></p>
                    @endif
                @else
                    <p>No Form Data available for this applicant.</p>
                @endif

                <hr>
                
                <h4>Approval Status</h4>
                <td class="project-actions text-right">
                    <form action="{{ route('update.status', ['id' => $apply->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="status">Ubah Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" @if($apply->status=="pending") selected @endif>Pending</option>
                                <option value="gagal" @if($apply->status=="gagal") selected @endif>Gagal</option>
                                <option value="berhasil" @if($apply->status=="berhasil") selected @endif>Berhasil</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>                                                         
                </td>
                <h5></h5>
                <td>
                    @if ($apply->status === 'berhasil')
                        <h4>Masukkan Kode Test dan Keterangan</h4>
                        <form id="updateForm" action="{{ route('update.data', ['id' => $apply->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="kode">Kode Test:</label>
                                <input type="text" name="kode" id="kode" class="form-control" value="{{old('kode',$apply->kode)}}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="summernote" name="keterangan" rows="5">{{ $apply->keterangan }}</textarea>
                            </div>
                            <hr>
                            <button type="submit" id="saveButton" class="btn btn-primary">Simpan</button>
                        </form>
                    @elseif ($apply->status === 'pending')
                        <h4>Masukkan Keterangan</h4>
                        <form id="updateForm" action="{{ route('update.data', ['id' => $apply->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="summernote" name="keterangan" rows="5">{{ $apply->keterangan }}</textarea>
                            </div>
                            <hr>
                            <button id="saveButton" class="btn btn-primary">Simpan</button>
                        </form>
                    @else
                        <h4>Ucapan Terima Kasih</h4>
                    @endif 
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<script>
    $('#summernote').summernote({
        callbacks: {
            onPaste: function (e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                e.preventDefault();

                // Firefox fix
                setTimeout(function () {
                    document.execCommand('insertText', false, bufferText);
                }, 10);
            }
        }
    });
    document.getElementById('saveButton').addEventListener('click', function () {
        var formData = new FormData(document.getElementById('updateForm'));

        fetch('{{ route('update.data', ['id' => $apply->id]) }}', {
            method: 'POST',
            body: formData
        });
    });
</script>
@endsection