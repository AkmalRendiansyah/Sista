@extends('dashboard.mainmahasiswa')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sidang Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Inputkan semua data sidang Ta</li>
        </ol>
    </div>
    <a href="/sidang-ta-mahasiswa/create" class="btn btn-primary mb-3">Add sidang ta</a> 
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>pembimbing 1</th>
            <th>pembimbing 2</th>
            <th>kaprodi</th>
            <th>Judul</th>
            <th>Proposal</th>
            <th>lembar bimbingan</th>
            <th>laporan pkl</th>
            <th>laporan ta</th>
            <th>Action</th>
        </tr>
        @foreach ($sidangta as $ta)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{Auth::user()->name}}</td>
            <td>{{$ta->dosen->name}}</td>
            <td>{{$ta->pembimbing2->name}}</td>
            <td>{{$ta->kaprodi->name}}</td>
            <td>{{$ta->judul}}</td>
            <td><a href ="proposal-ta/{{ $ta->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href ="lembar-bimbingan/{{ $ta->lembarbimbingan }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href ="laporan-pkl/{{ $ta->laporanpkl }}"><button class="btn btn-secondary">Download</button></a></td>
            <td><a href ="laporan-ta/{{ $ta->laporanta }}"><button class="btn btn-secondary">Download</button></a></td>
            
            <td>
                {{-- <a href="/proposal-ta-mahasiswa/{{$proposal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="sidang-ta-mahasiswa/{{$ta->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection