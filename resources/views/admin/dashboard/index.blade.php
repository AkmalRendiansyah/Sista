@extends('dashboard.main')
@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Admin</p>
                <p class="card-text">Jumlah Admin: {{ $jumlahAdmin }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Kaprodi</p>
                <p class="card-text">Jumlah Kaprodi: {{ $jumlahKaprodi }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Dosen</p>
                <p class="card-text">Jumlah Dosen: {{ $jumlahDosen }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Mahasiswa</p>
                <p class="card-text">Jumlah Mahasiswa: {{ $jumlahMahasiswa }}</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-book fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Dokumen Sidang TA</p>
                <p class="card-text">Jumlah Dokumen: {{ $jumlahDokumen }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fas fa-clock fa-5x" style="color: #007bff;"></i>
                <p class="card-text mt-3">Jadwal Sidang TA</p>
                <p class="card-text">Jumlah Jadwal: {{ $jumlahJadwal }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
