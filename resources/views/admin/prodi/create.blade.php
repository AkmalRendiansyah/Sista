@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Prodi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Prodi</li>
        </ol>
    </div>
    
<form action="/prodi" method="POST">
    @csrf

    <div class="mb-3">
      <label for="inputnama" class="form-label">Nama Prodi</label>
      <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" name="nama_prodi" value="{{old('nama_prodi')}}">
      @error('nama_prodi')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/prodi" class="btn btn-success btn-sm">Back</a>
    </div>
    
  </form>

@endsection