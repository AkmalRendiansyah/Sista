@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">mahasiswa</li>
        </ol>
    </div>
    <a href="/dashboard-mahasiswa-kaprodi/create" class="btn btn-primary mb-3">Create mahasiswa</a> 
    <a href="{{ route('mhsprod.export') }}" class="btn btn-success mb-3">Export</a>
    <div>
        <form action="{{ route('mhsprod.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
            @csrf
            <input type="file" name="file" class="btn btn-success mb-3">
            <button type="submit" class="btn btn-success btn-sm">Import</button>
        </form>
        </div> 
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            {{-- <th>Password</th> --}}
            <th>Prodi</th>
            <th>Action</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{$mahasiswa->name}}</td>
            <td>{{$mahasiswa->nim}}</td>
            <td>{{$mahasiswa->email}}</td>
            <td>{{$mahasiswa->prodi->nama_prodi}}</td>
            {{-- <td>{{$mahasiswa->Password}}</td> --}}

            <td>
                <a href="/dashboard-mahasiswa-kaprodi/{{$mahasiswa->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="dashboard-mahasiswa-kaprodi/{{$mahasiswa->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection