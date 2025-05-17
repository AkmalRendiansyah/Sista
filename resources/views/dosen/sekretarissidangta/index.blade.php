@extends('dashboard.maindosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pembimbing 2 Sidang Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> semua data Mahasiswa sidang Ta</li>
        </ol>
    </div>
    {{-- <a href="/sidang-ta-mahasiswa/create" class="btn btn-primary mb-3">Add sidang ta</a>  --}}
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pembimbing 2</th>
            
            <th>kaprodi</th>
            <th>Judul</th>
            <th>Proposal</th>
            <th>lembar bimbingan</th>
            <th>laporan pkl</th>
            <th>laporan ta</th>
            <th>Komentar</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($sidangta as $ta)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{$ta->mahasiswa->name}}</td>
            <td>{{$ta->pembimbing2->name}}</td>
            
            <td>{{$ta->kaprodi->name}}</td>
            <td>{{$ta->judul}}</td>
            <td><a href ="proposal-ta/{{ $ta->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href ="lembar-bimbingan/{{ $ta->lembarbimbingan }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href ="laporan-pkl/{{ $ta->laporanpkl }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href ="laporan-ta/{{ $ta->laporanta }}"><button class="btn btn-secondary">Download</button></a></td>
            <td>
                @if (!$ta->komentar2)
                Belum Ada komentar
            @else
                {{ $ta->komentar2 }}
            @endif
            </td>
            <td>
                @if (!$ta->status_pembimbing2)
                Sedang diproses
            @else
                {{ $ta->status_pembimbing2 }}
            @endif
            </td>
            <td>
        
                <a href="/sekretaris-sidang-ta/{{$ta->id}}/edit" class="btn btn-success btn-sm">Edit</a>
            </td>
            
            {{-- <td>
                {{-- <a href="/proposal-ta-mahasiswa/{{$proposal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                {{-- <form action="sidang-ta-mahasiswa/{{$ta->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td> --}} 
        </tr>

    @endforeach
       
           

    
    </table>
@endsection