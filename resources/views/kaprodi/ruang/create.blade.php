@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ruang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Ruang</li>
        </ol>
    </div>
    
<form action="/ruang-kaprodi" method="POST">
    @csrf

    <div class="mb-3">
      <label for="inputnama" class="form-label">Ruang</label>
      <input type="text" class="form-control @error('ruang') is-invalid @enderror" name="ruang" value="{{old('ruang')}}">
      @error('ruang')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/ruang-kaprodi" class="btn btn-success btn-sm">Back</a>
    </div>
    
  </form>

@endsection