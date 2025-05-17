@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kaprodi</li>
        </ol>
    </div>
    <a href="/dashboard-kaprodi-kaprodi/create" class="btn btn-primary mb-3">Create kaprodi</a> 
    <a href="{{ route('kaprod.export') }}" class="btn btn-success mb-3">Export</a> 
    <div>
        <form action="{{ route('kaprod.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
            @csrf
            <input type="file" name="file" class="btn btn-success mb-3">
            <button type="submit" class="btn btn-success btn-sm">Import</button>
        </form>
        </div>
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nidn</th>
            <th>Email</th> 
            <th>Prodi</th>
            {{-- <th>Password</th> --}}
            <th>Action</th>
        </tr>
        @foreach ($kaprodis as $dsn)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{$dsn->name}}</td>
            <td>{{$dsn->nidn}}</td>
            <td>{{$dsn->email}}</td>
            <td>{{$dsn->prodi->nama_prodi}}</td>
            {{-- <td>{{$dsn->prodi->nama_prodi}}</td> --}}
            {{-- <td>{{$dsn->Password}}</td> --}}
          
            <td>
                <a href="/dashboard-kaprodi-kaprodi/{{$dsn->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="dashboard-kaprodi-kaprodi/{{$dsn->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection