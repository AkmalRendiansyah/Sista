@extends('dashboard.mainmahasiswa')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Proposal Ta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semua Status proposal Ta</li>
        </ol>
    </div>
    <div>
    <h5 class="mt-4">Status Proposal</h5>
    </div>
    <table class="table table-boreder table-striped">
        <tr>
            <th>No</th>
            <th>pangkat</th>
            <th>nama</th>
            <th>komentar</th>
            <th>status</th>
        </tr>
        @foreach ($proposal_ta as $proposal)
        <tr>
            <td>1</td>
            <td>Pembimbing 1</td>
            <td>{{$proposal->dosen->name}}</td>
            <td>
                @if (!$proposal->komentar)
                Belum Ada komentar
            @else
                {{ $proposal->komentar }}
            @endif
            </td>
            <td>
                @if (!$proposal->status)
                Sedang diproses
            @else
                {{ $proposal->status }}
            @endif
            </td>
        </tr>

    @endforeach
@foreach ($proposal_ta as $proposal)
        
        <tr>
            <td>2</td>
            <td>Pembimbing 2</td>
            <td>{{$proposal->pembimbing2->name}}</td>
            <td>
                @if (!$proposal->komentar2)
                Belum Ada komentar
            @else
                {{ $proposal->komentar2 }}
            @endif
            </td>
            <td>
                @if (!$proposal->status_pembimbing2)
                Sedang diproses
            @else
                {{ $proposal->status_pembimbing2 }}
            @endif
            </td>
        </tr>

    @endforeach
    @foreach ($proposal_ta as $proposal)
    <tr>
        <td>3</td>
        <td>Kaprodi</td>
        <td>{{$proposal->kaprodi->name}}</td>
        <td>
            @if (!$proposal->komentar3)
            Belum Ada komentar
        @else
            {{ $proposal->komentar3 }}
        @endif
        </td>
        <td>
            @if (!$proposal->status_kaprodi)
            Sedang diproses
        @else
            {{ $proposal->status_kaprodi }}
        @endif
        </td>
    </tr>

@endforeach
    </table>
    
  
@endsection