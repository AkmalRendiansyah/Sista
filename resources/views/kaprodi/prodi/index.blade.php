@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">prodi</li>
        </ol>
    </div>
    <a href="/prodi-kaprodi/create" class="btn btn-primary mb-3">Create prodi</a> 
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Action</th>
        </tr>
        @foreach ($prodi as $prod)
        <tr>
            <td>{{ $prodi->firstItem() + $loop->index }}</td>
            <td>{{$prod->nama_prodi}}</td>
            <td>
                <a href="/prodi-kaprodi/{{$prod->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="prodi-kaprodi/{{$prod->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection