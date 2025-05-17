@extends('dashboard.mainmahasiswa')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sidang Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Masukkan Data Sidang Ta</li>
        </ol>
    </div>
    <form action="/sidang-ta-mahasiswa" method="POST" enctype="multipart/form-data">
        @csrf
     <div class="mb-3">
      <label for="inputpembimbing" class="form-label">Pembimbing 1</label>
        <select name="id_pembimbing" class="form-select @error('id_pembimbing') is-invalid @enderror">
            <option value="">--Pilih Pembimbing--</option>
            @foreach ($dosens as $dosen)
                <option value={{ $dosen->id}}>{{ $dosen->name }}</option>
            @endforeach
        </select>
        @error('id_pembimbing')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="inputpembimbing2" class="form-label">Pembimbing 2</label>
      <select name="id_pembimbing2" class="form-select @error('id_pembimbing2') is-invalid @enderror">
          <option value="">--Pilih Pembimbing 2--</option>
          @foreach ($pembimbing2s as $pembimbing)
          <option value={{ $pembimbing->id}}>{{ $pembimbing->name }}</option>
        
          @endforeach
      </select>
      @error('id_pembimbing2')
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
  </div>
  @foreach ($kaprodis as $kaprodi)
  <div class="mb-3">
    <label for="inputkaprodi" class="form-label">Kaprodi</label>
    <input type="text" name="id_kaprodi" id="inputkaprodi" class="form-control @error('id_kaprodi') is-invalid @enderror" value="{{ $kaprodi->id }}" hidden>
    <input type="text" name="" id="inputkaprodi" class="form-control @error('id_kaprodi') is-invalid @enderror" value="{{ $kaprodi->name }}" readonly >
       
          

    @error('id_kaprodi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @endforeach
</div>

        <div class="mb-3">
          <label for="inputnama" class="form-label">Judul Ta</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul')}}" >
          @error('judul')
              <div class="invalid-feedback">
                {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="proposal" class="form-label">Proposal Ta</label>
            <input type="file" id="proposal" name="proposal" class="form-control @error('proposal') is-invalid @enderror" required >
            @error('proposal')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="laporanpkl" class="form-label">Laporan Pkl</label>
            <input type="file" id="laporanpkl" name="laporanpkl" class="form-control @error('laporanpkl') is-invalid @enderror" required >
            @error('laporanpkl')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="lembarbimbingan" class="form-label">Lembar Bimbingan </label>
            <input type="file" id="lembarbimbingan" name="lembarbimbingan" class="form-control @error('lembarbimbingan') is-invalid @enderror" required >
            @error('lembarbimbingan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="laporanta" class="form-label">Laporan Ta </label>
            <input type="file" id="laporanta" name="laporanta" class="form-control @error('laporanta') is-invalid @enderror" required >
            @error('laporanta')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          

         
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </div>
        
      </form>
</main>
@endsection
