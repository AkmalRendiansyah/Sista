@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ruang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>

    <form action="/ruang/{{$ruang->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputNAMA" class="form-label">Ruang</label>
          <input type="text" class="form-control @error('ruang') is-invalid @enderror" name="ruang" value="{{old('ruang',$ruang->ruang)}}" >
          @error('ruang')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>

@endsection