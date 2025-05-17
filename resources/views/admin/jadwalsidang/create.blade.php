@extends('dashboard.main')
@section('content')
<main>
  <div class="container-fluid_mahasiswa px-4">
    <h1 class="mt-4">Create Jadwal sidang</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Create Jadwal sidang</li>
    </ol>
  </div>

  <form action="/jadwal-ta-admin" method="POST">
    @csrf
    <div class="mb-3">
      <label for="inputta" class="form-label">Mahasiswa</label>
      <select name="id_ta" class="form-select @error('id_ta') is-invalid @enderror" id="mahasiswaSelect">
        <option value="">--Pilih mahasiswa--</option>
        @foreach ($sidangtas as $sidang)
          <option value="{{ $sidang->id }}" 
            data-nim-name="{{ $sidang->mahasiswa->nim  }}" 
            data-mahasiswa-name="{{ $sidang->mahasiswa->id  }}" 
            data-judul-name="{{ $sidang->judul  }}"  
            data-pembimbing2-name="{{ $sidang->pembimbing2 ? $sidang->pembimbing2->name : 'N/A'   }}" 
            data-pembimbing1-name="{{ $sidang->dosen ? $sidang->dosen->name : 'N/A'   }}" >
            {{ $sidang->mahasiswa->name }} - {{ $sidang->judul }}
          </option>
        @endforeach
      </select>
      @error('id_ta')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    
    <div class="form-group">
      
      <input type="text" name="id_mahasiswa" id="id_mahasiswa" class="form-control"  hidden>
    </div>

    <div class="form-group">
      <label for="nim">Nim Mahasiswa</label>
      <input type="text" name="nim" id="nim" class="form-control" readonly>
    </div>
   
    <div class="form-group">
      <label for="judul">Judul</label>
      <input type="text" name="judul" id="judul" class="form-control" readonly>
    </div>
    
    <div class="mb-3">
      
      <br>
      <small>pembimbing 1:<input type="text" name="id_pembimbing1" id="id_pembimbing1" class="form-control" readonly></small>
      <br>
      <small>Pembimbing 2
      <input type="text" name="id_pembimbing2" id="id_pembimbing2" class="form-control" readonly>
      </small>
      <label for="inputpenguji" class="form-label">Ketua Sidang</label>
        <select name="id_ketua" class="form-select @error('id_ketua') is-invalid @enderror">
            <option value="">--Pilih Ketua Sidang--</option>
            @foreach ($dosens as $dosen)
                <option value={{ $dosen->id}}>{{ $dosen->name }}</option>
            @endforeach
        </select>
        @error('id_ketua')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
  </div>
    <div class="mb-3">
      <label for="inputpenguji" class="form-label">penguji 1</label>
        <select name="id_penguji1" class="form-select @error('id_penguji1') is-invalid @enderror">
            <option value="">--Pilih Penguji 1--</option>
            @foreach ($dosens as $dosen)
                <option value={{ $dosen->id}}>{{ $dosen->name }}</option>
            @endforeach
        </select>
        @error('id_penguji1')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="inputpenguji" class="form-label">penguji 2</label>
      <select name="id_penguji2" class="form-select @error('id_penguji2') is-invalid @enderror">
          <option value="">--Pilih Penguji 2--</option>
          @foreach ($dosens as $dosen)
              <option value={{ $dosen->id}}>{{ $dosen->name }}</option>
          @endforeach
      </select>
      @error('id_penguji2')
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
</div>
<div class="mb-3">
  <label for="inputpenguji" class="form-label">penguji 3</label>
    <select name="id_penguji3" class="form-select @error('id_penguji3') is-invalid @enderror">
        <option value="">--Pilih Penguji 3--</option>
        @foreach ($dosens as $dosen)
            <option value={{ $dosen->id}}>{{ $dosen->name }}</option>
        @endforeach
    </select>
    @error('id_penguji3')
      <div class="invalid-feedback">
        {{$message}}
      </div>
  @enderror
</div>

  <div class="mb-3">
    <label for="inputtanggal" class="form-label">Tanggal</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{old('tanggal')}}">
    @error('tanggal')
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="inputruang" class="form-label">Ruang</label>
      <select name="id_ruang" class="form-select @error('id_ruang') is-invalid @enderror">
          <option value="">--Pilih ruang--</option>
          @foreach ($ruangs as $ruang)
              <option value={{ $ruang->id}}>{{ $ruang->ruang }}</option>
          @endforeach
      </select>
      @error('id_ruang')
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="inputsesi" class="form-label">Sesi</label>
      <select name="id_sesi" class="form-select @error('id_sesi') is-invalid @enderror">
          <option value="">--Pilih sesi--</option>
          @foreach ($sesis as $sesi)
              <option value={{ $sesi->id}}>{{ $sesi->id }}</option>
          @endforeach
      </select>
      @error('id_sesi')
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
</div>
<div class="mb-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/jadwal-ta-kaprodi" class="btn btn-success btn-sm">Back</a>
</div>

  </form>

  <script>
    document.getElementById('mahasiswaSelect').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
    
      var mahasiswaName = selectedOption.getAttribute('data-mahasiswa-name');
      var judulName = selectedOption.getAttribute('data-judul-name');
      var nimName = selectedOption.getAttribute('data-nim-name');
      var pembimbing1Name = selectedOption.getAttribute('data-pembimbing1-name');
      var pembimbing2Name = selectedOption.getAttribute('data-pembimbing2-name');
     
      document.getElementById('id_mahasiswa').value = mahasiswaName;
      document.getElementById('judul').value = judulName;
      document.getElementById('nim').value = nimName;
      document.getElementById('id_pembimbing1').value = pembimbing1Name;
      document.getElementById('id_pembimbing2').value = pembimbing2Name;
    });
  </script>
</main>
@endsection
