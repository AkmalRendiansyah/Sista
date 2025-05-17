@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Ruang</li>
        </ol>
    </div>
    <a href="/ruang-kaprodi/create" class="btn btn-primary mb-3">Create Ruang</a> 
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>ruang</th>
            <th>Action</th>
        </tr>
        @foreach ($ruang as $ruangg)
        <tr>
            <td>{{ $ruang->firstItem() + $loop->index }}</td>
            <td>{{$ruangg->ruang}}</td>
            <td>
                <a href="/ruang-kaprodi/{{$ruangg->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="ruang-kaprodi/{{$ruangg->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection