@extends('dashboard.mainkaprodi')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ketua Sidang Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semua data ketua sidang Ta</li>
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
            <th>Komentar</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($sidang_ta as $ta)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ta->mahasiswa->name }}</td>
            <td>{{ $ta->status }}</td>
            <td>{{ $ta->status_pembimbing2 }}</td>
            <td>{{ $ta->kaprodi->name }}</td>
            <td>{{ $ta->judul }}</td>
            <td><a href="proposal-ta/{{ $ta->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href="lembar-bimbingan/{{ $ta->lembarbimbingan }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href="laporan-pkl/{{ $ta->laporanpkl }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href="laporan-ta/{{ $ta->laporanta }}"><button class="btn btn-secondary">Download</button></a></td>
            <td>
                @if (!$ta->komentar3)
                    Belum Ada komentar
                @else
                    {{ $ta->komentar3 }}
                @endif
            </td>
            <td>
                @if (!$ta->status_kaprodi)
                    Sedang diproses
                @else
                    {{ $ta->status }}
                @endif
            </td>
            <td>
                @if ($ta->status == 'Di setujui' && $ta->status_pembimbing2 == 'Di setujui')
                    <a href="/validasi-sidang-kaprodi/{{ $ta->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                @else
                    <button class="btn btn-success btn-sm" disabled>Edit</button>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</main>
@endsection
