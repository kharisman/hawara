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
            <h1>Generate Code</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3>Generate Kode Pelamar</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelamar</th>
                                <th>Kode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($successfulApplies as $key => $apply)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $apply->user->name }}</td>
                                <td>{{ $apply->kode }}</td>
                                <td>
                                    <form action="{{ route('generate.code.submit', ['id' => $apply->id]) }}" method="POST">
                                      @csrf
                                      <div class="input-group">
                                          <input type="text" name="kode" class="form-control" required>
                                          <div class="input-group-append">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                      </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection
