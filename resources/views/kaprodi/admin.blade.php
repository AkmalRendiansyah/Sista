@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">admin</li>
        </ol>
    </div>
    <a href="/dashboard-admin-kaprodi/create" class="btn btn-primary mb-3">Create admin</a> 
    <a href="{{ route('admprod.export') }}" class="btn btn-success mb-3">Export</a> 
    <div>
        <form action="{{ route('admprod.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
            @csrf
            <input type="file" name="file" class="btn btn-success mb-3">
            <button type="submit" class="btn btn-success btn-sm">Import</button>
        </form>
        </div>
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            
            <th>Nip</th>
            <th>Email</th>
            {{-- <th>Password</th> --}}
            {{-- <th>Role</th> --}}
            <th>Action</th>
        </tr>
        @foreach ($admins as $adm)
        <tr>
            <td>{{ $min->firstItem() + $loop->index }}</td>
            <td>{{$adm->name}}</td>
            
            <td>{{$adm->nip}}</td>
            <td>{{$adm->email}}</td>
            {{-- <td>{{$adm->Password}}</td> --}}
            {{-- <td>{{$adm->role}}</td> --}}
            <td>
                <a href="/dashboard-admin-kaprodi/{{$adm->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                {{-- <form action="dashboard-admin-kaprodi/{{$adm->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form> --}}
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
    {{ $min->links() }}
@endsection