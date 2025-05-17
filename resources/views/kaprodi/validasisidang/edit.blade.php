@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Validasi Dokumen sidang </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah status dokumen sidang</li>
        </ol>
    </div>

    <form action="/validasi-sidang-kaprodi/{{$sidang->id}}" method="POST">
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
          <input type="text" class="form-control @error('komentar3') is-invalid @enderror" name="komentar3" value="{{old('komentar3',$sidang->komentar3)}}" >
          @error('komentar3')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-2">
            <label for="inputstatus" class="form-label">status</label>
            <select class="form-select" name="status_kaprodi">
                <option value="">Pilih status:</option>
                <option value="Di setujui" >Di setujui</option>
                <option value="tidak Disetujui">Tidak Disetujui</option>
                
            </select>
            @error('status')
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