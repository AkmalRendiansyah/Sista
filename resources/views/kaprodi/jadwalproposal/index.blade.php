@extends('dashboard.mainkaprodi')
@section('content')
<main>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Proposal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Inputkan semua Jadwal proposal </li>
        </ol>
    </div>
    <a href="/jadwal-proposal-kaprodi/create" class="btn btn-primary mb-3">Add Jadwal</a> 
    @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Ruang</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Pembimbing 1</th>
            <th>Pembimbing 2</th>
            <th>Penguji</th>
            {{-- <th>Password</th> --}}
           
            <th>Action</th>
        </tr>
        @foreach ($jadwalproposal as $jadwal)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{ $jadwal->mahasiswa->name }}</td>
            <td>{{$jadwal->judul}}</td>
            <td>{{$jadwal->tanggal}}</td>
            <td>{{ $jadwal->ruang->ruang }}</td>
            <td>{{$jadwal->mulaisesi->mulai}}</td>
            <td>{{$jadwal->selesaisesi->selesai}}</td>
            <td>{{$jadwal->pembimbing1->name}}</td>
            <td>{{$jadwal->pembimbing2->name}}</td>
            <td>{{$jadwal->penguji->name}}</td>
            {{-- <td>{{$mahasiswa->nim}}</td>
            <td>{{$mahasiswa->email}}</td>
            <td>{{$mahasiswa->prodi->nama_prodi}}</td> --}}
            {{-- <td>{{$mahasiswa->Password}}</td> --}}

            <td>
                <a href="/jadwal-proposal-kaprodi/{{$jadwal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="jadwal-proposal-kaprodi/{{$jadwal->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection