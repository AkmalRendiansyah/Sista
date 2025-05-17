@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">mahasiswa</li>
        </ol>
    </div>

    <form action="/dashboard-mahasiswa-kaprodi/{{$mahasiswa->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputNAMA" class="form-label">NAMA</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$mahasiswa->name)}}" >
          @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
          <label for="inputnim" class="form-label">NIM</label>
          <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{old('nim',$mahasiswa->nim)}}" >
          @error('nim')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputEMAIL" class="form-label">EMAIL</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$mahasiswa->email)}}">
          @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputPASSWORD" class="form-label">PASSWORD</label>
          <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password',$mahasiswa->password)}}">
          @error('password')
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
                @if (old('id',$mahasiswa->id_prodi) == $prodi->id)
                    <option value="{{ $prodi->id }}" selected>{{ $prodi->nama_prodi }}</option>
                @else
                    <option value="{{ $prodi->id }}"> {{ $prodi->nama_prodi }}</option>
                @endif
                @endforeach
            </select>
            @error('id')
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