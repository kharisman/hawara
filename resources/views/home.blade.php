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
            <h1>Beranda</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">

          @foreach($posts as $post)
            <div class="card bg-primary text-white mb-4">
              <div class="card-header">
                <h5 class="card-title">{{ $post->title }}</h5>
              </div>
              <div class="card-body">
                <p class="card-text">{{ $post->description }}</p>
                <a href="{{url('')}}/home/apply/{{$post->id}}" class="btn btn-success">Masukan Lamaran Anda</a>
              </div>
            </div>
          @endforeach


      </div>
    </section>
  </div>
@endsection
