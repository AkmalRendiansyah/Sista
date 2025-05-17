@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </div>

    <form action="/dashboard-admin-kaprodi/{{$admin->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputNAMA" class="form-label">NAMA</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$admin->name)}}" >
          @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
          <label for="inputnip" class="form-label">Nip</label>
          <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{old('nip',$admin->nip)}}" >
          @error('nip')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputEMAIL" class="form-label">EMAIL</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$admin->email)}}">
          @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputPASSWORD" class="form-label">PASSWORD</label>
          <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password',$admin->password)}}">
          @error('password')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
{{-- 
        <div class="mb-3">
          <label for="inputrole" class="form-label @error('role') is-invalid @enderror">ROLE</label>
          <select class="form-control" name="role">
              <option value="">Pilih role:</option>
              <option value="admin" >Admin</option>
              <option value="kaprodi">Kaprodi</option>
              <option value="dosen">Dosen</option>
              <option value="mahasiswa">Mahasiswa</option>
          </select>
          @error('role')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
      </div> --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>

@endsection