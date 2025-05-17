@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Validasi proposal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Validasi semua data proposal</li>
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
            <th>kaprodi</th>
            <th>pembimbing 1</th>
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
            <td>{{$proposal->kaprodi->name}}</td>
            <td>{{$proposal->status}}</td>
            <td>{{$proposal->status_pembimbing2}}</td>
            <td>
                @if (!$proposal->komentar3)
                Belum Ada komentar
            @else
                {{ $proposal->komentar3 }}
            @endif
            </td>
            <td>
                @if (!$proposal->status_kaprodi)
                Sedang diproses
            @else
                {{ $proposal->status_kaprodi }}
            @endif
            </td>
            <td>
                @if ( $proposal->status == 'Di setujui' && $proposal->status_pembimbing2 == 'Di setujui')
                        <a href="/validasi-proposal-kaprodi/{{ $proposal->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                    @else
                        <!-- Tidak melakukan aksi edit karena tidak memenuhi syarat -->
                        <button class="btn btn-success btn-sm" disabled>Edit</button>
                    @endif
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection