@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sesi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>

    <form action="/sesi-ta/{{$sesi->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputmulai" class="form-label">mulai</label>
          <input type="time" class="form-control @error('mulai') is-invalid @enderror" name="mulai" value="{{old('mulai',$sesi->mulai)}}" >
          @error('mulai')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
            <label for="inputselesai" class="form-label">Selesai</label>
            <input type="time" class="form-control @error('selesai') is-invalid @enderror" name="selesai" value="{{old('selesai',$sesi->selesai)}}" >
            @error('selesai')
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