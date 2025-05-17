@extends('dashboard.mainmahasiswa')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Status Sidang TA</p>
                @foreach ($status as $sidang)
                <p class="card-text">Status pembimbing satu: @if (!$sidang->status)
                    Belum Ada status
                @else
                    {{ $sidang->status }}
                @endif</p>
                <p class="card-text">Status pembimbing dua: @if (!$sidang->status_pembimbing2)
                    Belum Ada status
                @else
                    {{ $sidang->status_pembimbing2 }}
                @endif</p>
                <p class="card-text">Status pembimbing tiga: @if (!$sidang->status_kaprodi)
                    Belum Ada status
                @else
                    {{ $sidang->status_kaprodi }}
                @endif</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="card mb-3">
           <div class="card-body text-center">
               <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
               <p class="card-text mt-3">Nilai Sidang TA</p>
               <p class="card-text">Nilai Sidang TA: @if (!$nilaiakhir)
                Belum Ada Nilai
            @else
            {{ number_format($nilaiakhir, 1) }}
            @endif</p>
            <p class="card-text">Status Sidang TA: @if (!$statussidang)
                Belum Ada Status
            @else
            {{$statussidang}}
            @endif</p>
           </div>
       </div>
   </div>
   <div class="col-sm-4">
    <div class="card mb-3">
        <div class="card-body text-center">
            <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
            <p class="card-text mt-3">Jadwal Sidang TA</p>
            @foreach ($jadwalta as $jadwal)
                <p class="card-text"> @if (!$jadwal->tanggal)
                    Belum Ada jadwal
                @else
                    Tanggal Sidang TA: {{$jadwal->tanggal}}
                @endif
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
