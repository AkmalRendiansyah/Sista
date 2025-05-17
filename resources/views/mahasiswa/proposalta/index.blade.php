@extends('dashboard.mainmahasiswa')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Proposal Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Inputkan semua data proposal Ta</li>
        </ol>
    </div>
    <a href="/proposal-ta-mahasiswa/create" class="btn btn-primary mb-3">Add Proposal</a> 
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Judul</th>
            <th>Proposal</th>
            <th>pembimbing 1</th>
            <th>pembimbing 2</th>
            <th>kaprodi</th>

            {{-- <th>komentar</th> --}}
            <th>status</th>
            <th>Action</th>
        </tr>
        @foreach ($proposal_ta as $proposal)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{Auth::user()->name}}</td>
            <td>{{$proposal->nim}}</td>
            <td>{{$proposal->judul}}</td>
            <td><a href ="proposal-ta/{{ $proposal->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td>{{$proposal->dosen->name}}</td>
            <td>{{$proposal->pembimbing2->name}}</td>
            <td>{{$proposal->kaprodi->name}}</td>
            <td><a href ="status-proposal-mahasiswa"><button class="btn btn-link">ke halaman status</button></a></td>
            {{-- <td>
                @if (!$proposal->komentar)
                Belum Ada komentar
            @else
                {{ $proposal->komentar }}
            @endif
            </td>
            <td>
                @if (!$proposal->status)
                Sedang diproses
            @else
                {{ $proposal->status }}
            @endif
            </td> --}}
            <td>
                {{-- <a href="/proposal-ta-mahasiswa/{{$proposal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="proposal-ta-mahasiswa/{{$proposal->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection