@extends('dashboard.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar sidang Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semua data  sidang Ta</li>
        </ol>
    </div>
    
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pembimbing 1</th>
            <th>Pembimbing 2</th>
            <th>Kaprodi</th>
            <th>Judul</th>
            <th>Proposal</th>
            <th>Lembar Bimbingan</th>
            <th>Laporan PKL</th>
            <th>Laporan TA</th>
           
        </tr>
        @foreach ($sidang_ta as $ta)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ta->mahasiswa->name }}</td>
            <td>{{ $ta->dosen->name }}</td>
            <td>{{ $ta->pembimbing2->name }}</td>
            <td>{{ $ta->kaprodi->name }}</td>
            <td>{{ $ta->judul }}</td>
            <td><a href="proposal-ta/{{ $ta->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href="lembar-bimbingan/{{ $ta->lembarbimbingan }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href="laporan-pkl/{{ $ta->laporanpkl }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href="laporan-ta/{{ $ta->laporanta }}"><button class="btn btn-secondary">Download</button></a></td>
            
        </tr>
        @endforeach
    </table>
</main>
@endsection
