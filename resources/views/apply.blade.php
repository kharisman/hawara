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
      <div class="container-fluid">
        <div class="card bg-primary text-white mb-4">
          <div class="card-header">
            <h5 class="card-title">{{ $post->title }}</h5>
          </div>
          <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Upload CV Anda</h5>
            <form  method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="file" name="pdf" id="pdf" class="form-control-file">
              </div>
              <button type="submit" class="btn btn-success">Upload</button>
            </form>
          </div>
        </div>
        
      </div>
    </section>
</div>
@endsection
