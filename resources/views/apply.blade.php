@extends('layouts.layout')

@section('content')
<style>
.info-box a:link,.info-box a {
  color:#000 !important;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Apply Form</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <!-- Form Biodata -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Biodata Diri</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
<<<<<<< HEAD
            <form id="biodata" method="POST" action="{{ route('submit-form') }}">
=======
            <form id="biodata" method="POST" action="{{ route('submit-form' , ['id' => $post->id]) }}" enctype="multipart/form-data" >
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Alamat Berdasarkan KTP</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan disini.." name="ktp_text"></textarea>
                        <div class="row">
                            <div class="col-3">
                                <label for="">Provinsi</label>
<<<<<<< HEAD
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_provinsi">
=======
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_provinsi" value="{{old('ktp_provinsi')}}">
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
                                @error('ktp_provinsi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Kota/Kabupaten</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_kota">
                                @error('ktp_kota')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Kecamatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_kecamatan">
                                @error('ktp_kecamatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Kode Pos</label>
                                <input type="number" class="form-control" placeholder="Masukkan disini.." name="ktp_kodepos">
                                @error('ktp_kodepos')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Berdasarkan Domisili</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan disini.." name="domisili_text"></textarea>
                        <div class="row">
                            <div class="col-3">
                                <label for="">Provinsi</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="domisili_provinsi">
                                @error('domisili_provinsi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Kota/Kabupaten</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="domisili_kota">
                                @error('domisili_kota')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Kecamatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="domisili_kecamatan">
                                @error('domisili_kecamatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Kode Pos</label>
                                <input type="number" class="form-control" placeholder="Masukkan disini.." name="domisili_kodepos">
                                @error('domisili_kodepos')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Sekolah / Perguruan Tinggi</label>
                        <input type="text" class="form-control" placeholder="Masukkan disini.." name="nama_sekolah">
                        @error('nama_sekolah')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label>Jurusan / Program Studi</label>
                        <input type="text" class="form-control" placeholder="Masukkan disini.." name="jurusan">
                        @error('jurusan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row">
                            <div class="col-3">
                                <label for="">Tingkatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="tingkatan">
                                @error('tingkatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Nilai Akhir / IPK</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Masukkan disini.." name="nilai_akhir">
                                @error('nilai_akhir')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Status</label>
                                <select class="form-control" name="status">
                                    <option value="lulus" selected>Lulus</option>
                                    <option value="tidak lulus">Tidak Lulus</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="">Tanggal Lulus</label>
                                <input type="date" class="form-control" placeholder="Masukkan disini.." name="tanggal_lulus">
                                @error('tanggal_lulus')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="nama_perusahaan">
                                @error('nama_perusahaan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-5">
                                <label for="">Periode Kerja</label>
                                <input type="date" class="form-control" placeholder="Masukkan disini.." name="periode_kerja">
                                @error('periode_kerja')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="jabatan">
                                @error('jabatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-5">
                                <label for="">Status</label>
                                <select class="form-control" name="status_pekerjaan">
                                    <option value="Tetap">Tetap</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Magang">Magang</option>
                                </select>
                                @error('status_pekerjaan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Upload CV</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="cv">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('cv')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
