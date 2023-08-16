@extends('layouts.layout')

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posting</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Periode Lamaran</label>
                        <input type="text" class="form-control" placeholder="Masukkan disini.." name="periode" id="periode" value="{{old('periode',$post->periode_awal." - ". $post->periode_akhir)}}">
                        @error('periode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Judul:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Sub Judul:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $post->description) }}" required>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Deskripsi:</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Add other fields here if needed -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
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

$('input[name="periode"]').val("{{old('periode',$post->periode_awal." - ". $post->periode_akhir)}}");

</script>
@endsection
