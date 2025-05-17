@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dosen</li>
        </ol>
    </div>
    <a href="/dashboard-dosen/create" class="btn btn-primary mb-3">Create Dosen</a> 
    <a href="{{ route('dosen.export') }}" class="btn btn-success mb-3">Export</a> 
    <div>
    <form action="{{ route('dosen.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
        @csrf
        <input type="file" name="file" class="btn btn-success mb-3">
        <button type="submit" class="btn btn-success btn-sm">Import</button>
    </form>
    </div>
    
    <table class="table table-boreder table-striped">
        {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="/dashboard-dosen" method="GET">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name="caridosen"/>
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form> --}}
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nidn</th>
            <th>Email</th>
            {{-- <th>Password</th> --}}
            {{-- <th>Role</th> --}}
            <th>Action</th>
        </tr>
        @foreach ($dosens as $dsn)
        <tr>
            <td>{{   $loop->iteration }}</td>
            <td>{{$dsn->name}}</td>
            <td>{{$dsn->nidn}}</td>
            <td>{{$dsn->email}}</td>
            {{-- <td>{{$dsn->Password}}</td> --}}
            {{-- <td>{{$dsn->role}}</td> --}}
            <td>
                <a href="/dashboard-dosen/{{$dsn->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="dashboard-dosen/{{$dsn->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection