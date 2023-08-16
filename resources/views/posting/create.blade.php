@extends('layouts.layout')

@section('content')


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Posting Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posting</a></li>
                        <li class="breadcrumb-item active">Buat Post</li>
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
                <form action="{{ route('post.store-post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Periode Lamaran</label>
                        <input type="text" class="form-control" placeholder="Masukkan disini.." name="periode" id="periode" value="{{old('periode')}}">
                        @error('periode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Judul:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Sub Judul:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" required>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Deskripsi:</label>
                        <textarea class="form-control" id="content" name="content" rows="5" value="{{old('content')}}" required></textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<script>
$('input[name="periode"]').daterangepicker({
    locale: {
    format: 'Y-MM-DD'
    },
    ranges: {
        '1 Bulan': [moment(), moment().add(1, 'months')],
        '3 Bulan': [moment(), moment().add(3, 'months')],
        '6 Bulan': [moment(), moment().add(6, 'months')],
        '12 Bulan': [moment(), moment().add(12, 'months')]
    },
    startDate: moment(),
    endDate: moment().add(1, 'months') // Default range: 1 bulan
})
</script>
@endsection
