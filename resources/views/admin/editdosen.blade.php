@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dosen</li>
        </ol>
    </div>

    <form action="/dashboard-dosen/{{$dosen->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputNAMA" class="form-label">NAMA</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$dosen->name)}}" >
          @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
          <label for="inputnidn" class="form-label">NIDN</label>
          <input type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{old('nidn',$dosen->nidn)}}" >
          @error('nidn')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputEMAIL" class="form-label">EMAIL</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$dosen->email)}}">
          @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputPASSWORD" class="form-label">PASSWORD</label>
          <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password',$dosen->password)}}">
          @error('password')
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