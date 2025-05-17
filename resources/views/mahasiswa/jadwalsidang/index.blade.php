@extends('dashboard.mainmahasiswa')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Sidang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">semua Jadwal Sidang TA </li>
        </ol>
    </div>
    {{-- <a href="/jadwal-proposal/create" class="btn btn-primary mb-3">Add Jadwal</a>  --}}
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Tanggal</th>
            <th>Ruang</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Ketua Sidang</th>
            <th>Penguji 1</th>
            <th>Penguji 2</th>
            <th>Penguji 3</th>
            {{-- <th>Password</th> --}}
           
            {{-- <th>Action</th> --}}
        </tr>
        @foreach ($jadwalta as $jadwal)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{$jadwal->mahasiswa->name}}</td>
            <td>{{$jadwal->tanggal}}</td>
            <td>{{ $jadwal->ruang->ruang }}</td>
            <td>{{$jadwal->mulaisesi->mulai}}</td>
            <td>{{$jadwal->selesaisesi->selesai}}</td>
            <td>{{$jadwal->ketua->name}}</td>
            <td>{{$jadwal->penguji1->name}}</td>
            <td>{{$jadwal->penguji2->name}}</td>
            <td>{{$jadwal->penguji3->name}}</td>
            {{-- <td>{{$mahasiswa->nim}}</td>
            <td>{{$mahasiswa->email}}</td>
            <td>{{$mahasiswa->prodi->nama_prodi}}</td> --}}
            {{-- <td>{{$mahasiswa->Password}}</td> --}}

            {{-- <td>
                <a href="/jadwal-proposal/{{$jadwal->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                {{-- <form action="jadwal-proposal/{{$jadwal->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>  --}}
        </tr>

    @endforeach
       
           

    
    </table>
@endsection