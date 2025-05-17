@extends('dashboard.mainkaprodi')
@section('content')
<main>
    
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Sidang TA</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Inputkan semua Jadwal Sidang TA </li>
        </ol>
    </div>
    <a href="/jadwal-ta-kaprodi/create" class="btn btn-primary mb-3">Add Jadwal</a> 
    @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim Mahasiswa</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Ruang</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Ketua Sidang</th>
            <th>Penguji 1</th>
            <th>penguji 2</th>
            <th>penguji 3</th>
            {{-- <th>Password</th> --}}
           
            <th>Action</th>
        </tr>
        @foreach ($jadwalta as $ta)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{ $ta->mahasiswa->name }}</td>
            <td>{{ $ta->nim }}</td>
            <td>{{$ta->judul}}</td>
            <td>{{$ta->tanggal}}</td>
            <td>{{ $ta->ruang->ruang }}</td>
            <td>{{$ta->mulaisesi->mulai}}</td>
            <td>{{$ta->selesaisesi->selesai}}</td>
            <td>{{$ta->ketua->name}}</td>
            <td>{{$ta->penguji1->name}}</td>
            <td>{{$ta->penguji2->name}}</td>
            <td>{{$ta->penguji3->name}}</td>
            {{-- <td>{{$mahasiswa->nim}}</td>
            <td>{{$mahasiswa->email}}</td>
            <td>{{$mahasiswa->prodi->nama_prodi}}</td> --}}
            {{-- <td>{{$mahasiswa->Password}}</td> --}}

            <td>
                <a href="/jadwal-ta-kaprodi/{{$ta->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="jadwal-ta-kaprodi/{{$ta->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection