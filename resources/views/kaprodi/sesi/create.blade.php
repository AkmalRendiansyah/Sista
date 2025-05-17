@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sesi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Sesi</li>
        </ol>
    </div>
    
<form action="/sesi-ta-kaprodi" method="POST">
    @csrf

    <div class="mb-3">
      <label for="inputmuai" class="form-label">Mulai</label>
      <input type="time" class="form-control @error('mulai') is-invalid @enderror" name="mulai" value="{{old('mulai')}}">
      @error('mulai')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="inputselesai" class="form-label">Selesai</label>
        <input type="time" class="form-control @error('selesai') is-invalid @enderror" name="selesai" value="{{old('selesai')}}">
        @error('selesai')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/sesi-ta-kaprodi" class="btn btn-success btn-sm">Back</a>
    </div>
    
  </form>

@endsection