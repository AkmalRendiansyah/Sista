@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">prodi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>

    <form action="/prodi/{{$prodi->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputNAMA" class="form-label">Nama Prodi</label>
          <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" name="nama_prodi" value="{{old('nama_prodi',$prodi->nama_prodi)}}" >
          @error('nama_prodi')
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