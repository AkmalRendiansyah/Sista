@extends('dashboard.maindosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pembimbing 2</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Validasi semua data proposal untuk pembimbing 2</li>
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
            <th>pembimbing 2</th>
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
            <td>{{$proposal->pembimbing2->name}}</td>
            <td>
                @if (!$proposal->komentar2)
                Belum Ada komentar
            @else
                {{ $proposal->komentar2 }}
            @endif
            </td>
            <td>
                @if (!$proposal->status_pembimbing2)
                Sedang diproses
            @else
                {{ $proposal->status_pembimbing2 }}
            @endif
            </td>
            <td>
        
                <a href="/validasi-proposal-pembimbing2/{{$proposal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection