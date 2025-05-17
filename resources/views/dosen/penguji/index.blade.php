@extends('dashboard.maindosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Penguji</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">semua data proposal untuk penguji</li>
        </ol>
    </div>
    {{-- <a href="/proposal-ta-mahasiswa/create" class="btn btn-primary mb-3">Add Proposal</a>  --}}
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
     
            <th>Judul</th>
            <th>Proposal</th>
            <th>penguji</th>
            {{-- <th>komentar</th>
            <th>status</th>
            <th>Action</th> --}}
        </tr>
        @foreach ($jadwalproposal as $proposal)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{$proposal->mahasiswa->name}}</td>
        
            <td>{{$proposal->judul}}</td>
            <td><a href ="proposal-ta/{{ $proposal->proposal }}"><button class="btn btn-secondary">Download</button></a></td>
            <td>{{$proposal->penguji->name}}</td>
            
            {{-- <td>
        
                <a href="/validasi-proposal-pembimbing2/{{$proposal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
            </td> --}}
        </tr>

    @endforeach
       
           

    
    </table>
@endsection