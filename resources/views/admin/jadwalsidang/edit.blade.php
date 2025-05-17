@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal proposal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update jadwal proposal</li>
        </ol>
    </div>

    <form action="/jadwal-ta-admin/{{$jadwals->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="inputnama" class="form-label">nama</label>
         
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="" value="{{$jadwals->mahasiswa->name}}" readonly >
      
          @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
          <label for="inputtanggal" class="form-label">Tanggal</label>
         
          <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{old('tanggal',$jadwals->tanggal)}}" >
      
          @error('tanggal')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputruang" class="form-label">ruang</label>
            <select name="id_ruang" class="form-select @error('ruang') is-invalid @enderror">
                <option value="">--Pilih ruang--</option>
                @foreach ($ruangs as $ruang)
               
                @if (old('id',$jadwals->id_ruang) == $ruang->id)
                    <option value="{{ $ruang->id }}" selected>{{ $ruang->ruang }}</option>
                @else
                    <option value="{{ $ruang->id }}"> {{ $ruang->ruang }}</option>
                @endif
                @endforeach
            </select>
            @error('ruang')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputsesi" class="form-label">Sesi</label>
            <select name="id_sesi" class="form-select @error('sesi') is-invalid @enderror">
                <option value="">--Pilih Sesi--</option>
                @foreach ($sesis as $sesi)
                @if (old('id',$jadwals->id_sesi) == $sesi->id)
                    <option value="{{ $sesi->id }}" selected>{{ $sesi->id }}</option>
                @else
                    <option value="{{ $sesi->id }}"> {{ $sesi->id }}</option>
                @endif
                @endforeach
            </select>
            @error('sesi')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputketua" class="form-label">Ketua Sidang</label>
            <select name="id_ketua" class="form-select @error('id_ketua') is-invalid @enderror">
                <option value="">--Pilih ketua--</option>
                @foreach ($dosens as $dosen)
                @if (old('id',$jadwals->id_ketua) == $dosen->id)
                    <option value="{{ $dosen->id }}" selected>{{ $dosen->name }}</option>
                @else
                    <option value="{{ $dosen->id }}"> {{ $dosen->name }}</option>
                @endif
                @endforeach
            </select>
            @error('id_ketua')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputpenguji1" class="form-label">Penguji 1</label>
            <select name="id_penguji1" class="form-select @error('id_penguji1') is-invalid @enderror">
                <option value="">--Pilih Penguji 1--</option>
                @foreach ($dosens as $dosen)
                @if (old('id',$jadwals->id_penguji1) == $dosen->id)
                    <option value="{{ $dosen->id }}" selected>{{ $dosen->name }}</option>
                @else
                    <option value="{{ $dosen->id }}"> {{ $dosen->name }}</option>
                @endif
                @endforeach
            </select>
            @error('id_pembimbing2')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputpenguji3" class="form-label">Penguji 2</label>
            <select name="id_penguji2" class="form-select @error('id_penguji2') is-invalid @enderror">
                <option value="">--Pilih Penguji 2--</option>
                @foreach ($dosens as $dosen)
                @if (old('id',$jadwals->id_penguji2) == $dosen->id)
                    <option value="{{ $dosen->id }}" selected>{{ $dosen->name }}</option>
                @else
                    <option value="{{ $dosen->id }}"> {{ $dosen->name }}</option>
                @endif
                @endforeach
            </select>
            @error('id_penguji2')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputpenguji3" class="form-label">Penguji 3</label>
            <select name="id_penguji3" class="form-select @error('id_penguji3') is-invalid @enderror">
                <option value="">--Pilih Penguji 3--</option>
                @foreach ($dosens as $dosen)
                @if (old('id',$jadwals->id_penguji3) == $dosen->id)
                    <option value="{{ $dosen->id }}" selected>{{ $dosen->name }}</option>
                @else
                    <option value="{{ $dosen->id }}"> {{ $dosen->name }}</option>
                @endif
                @endforeach
            </select>
            @error('id_penguji3')
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