@extends('dashboard.maindosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pembimbing 1</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Validasi semua data proposal untuk pembimbing 1</li>
        </ol>
    </div>
    {{-- <a href="/proposal-ta-mahasiswa/create" class="btn btn-primary mb-3">Add Proposal</a>  --}}
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Judul</th>
            <th>Proposal</th>
            <th>pembimbing 1</th>
            <th>komentar</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        @foreach ($proposal_ta as $proposal)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{$proposal->mahasiswa->name}}</td>
            <td>{{$proposal->nim}}</td>
            <td>{{$proposal->judul}}</td>
            <td><a href ="proposal-ta/{{ $proposal->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td>{{$proposal->dosen->name}}</td>
            <td>
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
            </td>
            <td>
        
                <a href="/validasi-proposal-dosen/{{$proposal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection