@extends('dashboard.mainkaprodi')
@section('content')
<main>
  <div class="container-fluid_mahasiswa px-4">
    <h1 class="mt-4">Create Jadwal Proposal</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Create Jadwal Proposal</li>
    </ol>
  </div>

  <form action="/jadwal-proposal-kaprodi" method="POST">
    @csrf

    <div class="mb-3">
      <label for="inputProdi" class="form-label">Mahasiswa</label>
      <select name="id_proposal" class="form-select @error('id_proposal') is-invalid @enderror" id="mahasiswaSelect">
        <option value="">--Pilih mahasiswa--</option>
        @foreach ($proposaltas as $proposal)
          <option value="{{ $proposal->id }}" data-pembimbing1-name="{{ $proposal->id_pembimbing  }}" 
            data-pembimbing2-name="{{ $proposal->id_pembimbing2  }}" 
            data-mahasiswa-name="{{ $proposal->id_mahasiswa  }}" 
            data-judul-name="{{ $proposal->judul  }}" 
            data-pembimbing22-name="{{ $proposal->pembimbing2 ? $proposal->pembimbing2->name : 'N/A'   }}" 
            data-pembimbing11-name="{{ $proposal->dosen ? $proposal->dosen->name : 'N/A'   }}" >
            {{ $proposal->mahasiswa->name }} - {{ $proposal->judul }}
          </option>
        @endforeach
      </select>
      @error('id_proposal')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      
      <input type="text" name="id_pembimbing1" id="id_pembimbing1" class="form-control" hidden>
    </div>
    <div class="form-group">
      
      <input type="text" name="id_mahasiswa" id="id_mahasiswa" class="form-control" hidden >
    </div>

    <div class="form-group">
      
      <input type="text" name="id_pembimbing2" id="id_pembimbing2" class="form-control" hidden>
    </div>
    <div class="form-group">
      <label for="judul">Judul</label>
      <input type="text" name="judul" id="judul" class="form-control" readonly>
    </div>
    <div class="form-group">
      <label for="id_pembimbing1">Pembimbing 1</label>
      <input type="text" name="id_pembimbing11" id="id_pembimbing11" class="form-control" readonly>
    </div>

    <div class="form-group">
      <label for="id_pembimbing2">Pembimbing 2</label>
      <input type="text" name="id_pembimbing22" id="id_pembimbing22" class="form-control" readonly>
    </div>
    <div class="mb-3">
      <label for="inputpenguji" class="form-label">Penguji</label>
        <select name="penguji" class="form-select @error('penguji') is-invalid @enderror">
            <option value="">--Pilih Penguji--</option>
            @foreach ($dosens as $dosen)
                <option value={{ $dosen->id}}>{{ $dosen->name }}</option>
            @endforeach
        </select>
        @error('id_penguji')
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
  <a href="/jadwal-proposal-kaprodi" class="btn btn-success btn-sm">Back</a>
</div>

  </form>

  <script>
    document.getElementById('mahasiswaSelect').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
      var pembimbing1Name = selectedOption.getAttribute('data-pembimbing1-name');
      var pembimbing2Name = selectedOption.getAttribute('data-pembimbing2-name');
      var pembimbing11Name = selectedOption.getAttribute('data-pembimbing11-name');
      var pembimbing22Name = selectedOption.getAttribute('data-pembimbing22-name');
      var mahasiswaName = selectedOption.getAttribute('data-mahasiswa-name');
      var judulName = selectedOption.getAttribute('data-judul-name');
      document.getElementById('id_pembimbing1').value = pembimbing1Name;
      document.getElementById('id_pembimbing2').value = pembimbing2Name;
      document.getElementById('id_pembimbing11').value = pembimbing11Name;
      document.getElementById('id_pembimbing22').value = pembimbing22Name;
      document.getElementById('id_mahasiswa').value = mahasiswaName;
      document.getElementById('judul').value = judulName;
    });
  </script>
</main>
@endsection
