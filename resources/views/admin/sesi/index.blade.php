@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">sesi</li>
        </ol>
    </div>
    <a href="/sesi-ta/create" class="btn btn-primary mb-3">Create sesi</a> 
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Action</th>
        </tr>
        @foreach ($sesi as $sesis)
        <tr>
            <td>{{ $sesi->firstItem() + $loop->index }}</td>
            <td>{{$sesis->mulai}}</td>
            <td>{{$sesis->selesai}}</td>
            <td>
                <a href="/sesi-ta/{{$sesis->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                <form action="sesi-ta/{{$sesis->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="return confirm('Yakin akan menghapus data')">Hapus</button>
                </form>
            </td>
        </tr>

    @endforeach
       
           

    
    </table>
@endsection