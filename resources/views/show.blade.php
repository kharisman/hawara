@extends('layouts.layout')

@section('content')
<style>
.info-box a:link, .info-box a {
  color: #000 !important;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Submission Result</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Values</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Berdasarkan KTP</label>
                        <textarea class="form-control" rows="3" readonly>{{ $biodata->ktp_text }}</textarea>
                        <div class="row">
                            <div class="col-3">
                                <label for="">Provinsi</label>
                                <input type="text" class="form-control" value="{{ $biodata->ktp_provinsi }}" readonly>
                            </div>
                            <div class="col-3">
                                <label for="">Kota/Kabupaten</label>
                                <input type="text" class="form-control" value="{{ $biodata->ktp_kota }}" readonly>
                            </div>
                            <div class="col-3">
                                <label for="">Kecamatan</label>
                                <input type="text" class="form-control" value="{{ $biodata->ktp_kecamatan }}" readonly>
                            </div>
                            <div class="col-3">
                                <label for="">Kode Pos</label>
                                <input type="text" class="form-control" value="{{ $biodata->ktp_kodepos }}" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
