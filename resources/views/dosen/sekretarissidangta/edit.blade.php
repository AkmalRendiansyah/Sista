@extends('dashboard.maindosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sekretaris Sidang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>

    <form action="/sekretaris-sidang-ta/{{$sidang->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-2">
            <label for="inputkomentar" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('id_mahasiswa',$sidang->mahasiswa->name)}}" readonly>
            @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
        <div class="mb-2">
          <label for="inputkomentar" class="form-label">Komentar</label>
          <input type="text" class="form-control @error('komentar2') is-invalid @enderror" name="komentar2" value="{{old('komentar2',$sidang->komentar2)}}" >
          @error('komentar2')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
            <label for="inputstatus" class="form-label">status</label>
            <select class="form-select" name="status_pembimbing2">
                <option value="">Pilih status:</option>
                <option value="Di setujui" >Di setujui</option>
                <option value="tidak Disetujui">Tidak Disetujui</option>
                
            </select>
            @error('status_pembimbing2')
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