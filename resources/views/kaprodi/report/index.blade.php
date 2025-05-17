@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Report Sidang Ta</h1>
        
    </div>
    <a href="{{ route('reportsidang.kaprodi') }}" class="btn btn-success mb-3">Cetak Report Penguji Sidang</a> 
    <a href="{{ route('reportstatus.kaprodi') }}" class="btn btn-success mb-3">Cetak Report Kelulusan Sidang</a> 
    
@endsection