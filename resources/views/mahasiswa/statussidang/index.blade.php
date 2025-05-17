@extends('dashboard.mainmahasiswa')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sidang Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semua Status Sidang Ta</li>
        </ol>
    </div>
    <div>
    <h5 class="mt-4">Status Sidang</h5>
    </div>
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>pangkat</th>
            <th>nama</th>
            <th>komentar</th>
            <th>status</th>
        </tr>
        @foreach ($sidang_ta as $sidang)
        <tr>
            <td>1</td>
            <td>Pembimbing 1</td>
            <td>{{$sidang->dosen->name}}</td>
            <td>
                @if (!$sidang->komentar)
                Belum Ada komentar
            @else
                {{ $sidang->komentar }}
            @endif
            </td>
            <td>
                @if (!$sidang->status)
                Sedang diproses
            @else
                {{ $sidang->status }}
            @endif
            </td>
        </tr>

    @endforeach
@foreach ($sidang_ta as $sidang)
        
        <tr>
            <td>2</td>
            <td>Pembimbing 2</td>
            <td>{{$sidang->pembimbing2->name}}</td>
            <td>
                @if (!$sidang->komentar2)
                Belum Ada komentar
            @else
                {{ $sidang->komentar2 }}
            @endif
            </td>
            <td>
                @if (!$sidang->status_pembimbing2)
                Sedang diproses
            @else
                {{ $sidang->status_pembimbing2 }}
            @endif
            </td>
        </tr>

    @endforeach
    @foreach ($sidang_ta as $sidang)
    <tr>
        <td>3</td>
        <td>Kaprodi</td>
        <td>{{$sidang->kaprodi->name}}</td>
        <td>
            @if (!$sidang->komentar3)
            Belum Ada komentar
        @else
            {{ $sidang->komentar3 }}
        @endif
        </td>
        <td>
            @if (!$sidang->status_kaprodi)
            Sedang diproses
        @else
            {{ $sidang->status_kaprodi }}
        @endif
        </td>
    </tr>

@endforeach
    </table>
    
  
@endsection