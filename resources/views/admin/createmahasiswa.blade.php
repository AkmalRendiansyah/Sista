@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">mahasiswa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create mahasiswa</li>
        </ol>
    </div>
    
<form action="/dashboard-mahasiswa" method="POST">
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
      <label for="inputProdi" class="form-label">Prodi</label>
        <select name="id" class="form-select @error('id') is-invalid @enderror">
            <option value="">--Pilih Prodi--</option>
            @foreach ($prodis as $prodi)
                <option value={{ $prodi->id}}>{{ $prodi->nama_prodi }}</option>
            @endforeach
        </select>
        @error('id')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
  </div>
    <div class="mb-3">
      <label for="inputnim" class="form-label">nim</label>
      <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{old('nim')}}">
      @error('nim')
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
      <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="mahasiswa" readonly>
      @error('role')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/dashboard-mahasiswa" class="btn btn-success btn-sm">Back</a>
    </div>
    
  </form>

@endsection