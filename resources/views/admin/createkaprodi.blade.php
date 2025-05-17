@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kaprodi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create kaprodi</li>
        </ol>
    </div>
    
<form action="/dashboard-admin" method="POST">
    @csrf

    <div class="mb-3">
      <label for="inputnama" class="form-label">NAMA</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
      @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputnidn" class="form-label">Nidn</label>
      <input type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{old('nidn')}}">
      @error('nidn')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputemail" class="form-label">EMAIL</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
      @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      {{-- <label for="inputpassword" class="form-label">PASSWORD</label> --}}
      <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="123456" hidden>
      @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="inputrole" class="form-label">Role</label>
      <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="kaprodi" readonly>
      @error('role')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/dashboard-admin" class="btn btn-success btn-sm">Back</a>
    </div>
    
  </form>

@endsection