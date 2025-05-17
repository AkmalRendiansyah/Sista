@extends('dashboard.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Nilai Mahasiswa Sidang TA</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semua Nilai Mahasiswa sidang TA</li>
        </ol>
    </div>
    {{-- <a href="/sidang-ta-mahasiswa/create" class="btn btn-primary mb-3">Add sidang ta</a> --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                
                <th>Total nilai</th>
                <th>Pembimbing 1</th>
                <th>Pembimbing 2</th>
                <th>Ketua</th>
                <th>Penguji 1</th>
                <th>Penguji 2</th>
                <th>Penguji 3</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilaisidang as $sidang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidang->mahasiswa->name }}</td>
                {{-- <td>{{ $sidang->nilai_akhir }}</td>
                <td>{{ $sidang->status }}</td> --}}
                <td>
                    
                    @if ( $sidang->mahasiswa)
                    <a href="{{ route('nilai.total', ['id' => $sidang->mahasiswa]) }}" class="btn btn-link">Lihat Nilai Keseluruhan</a>
                    @endif    
                    <br>
                    <a href="{{ route('nilai.sidang.ta.cetakpdf', ['id' => $sidang->mahasiswa->id]) }}" class="btn btn-success mb-3">Cetak Nilai</a>    
                   
                   
                    {{-- <a href="/nilai-sidang-ta-mahasiswa-admin/{{ $sidang->id }}/edit" class="btn btn-link">Lihat Nilai Mahasiswa</a> --}}
                </td>
                <td>
                    @foreach ($nilaipem1 as $sidang2)
                        @if ($sidang2->mahasiswa == $sidang->mahasiswa)
                            <a href="{{ route('nilai.pem1', ['id' => $sidang2->id]) }}" class="btn btn-link">Lihat Nilai Pembimbing 1</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($nilaipem2 as $sidang2)
                        @if ($sidang2->mahasiswa == $sidang->mahasiswa)
                            <a href="{{ route('nilai.pem2', ['id' => $sidang2->id]) }}" class="btn btn-link">Lihat Nilai Pembimbing 2</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($nilaiketua as $sidang2)
                        @if ($sidang2->mahasiswa == $sidang->mahasiswa)
                            <a href="{{ route('nilai.ketua', ['id' => $sidang2->id]) }}" class="btn btn-link">Lihat Nilai ketua sidang</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($nilaipenguji1 as $sidang2)
                        @if ($sidang2->mahasiswa == $sidang->mahasiswa)
                            <a href="{{ route('nilai.penguji1', ['id' => $sidang2->id]) }}" class="btn btn-link">Lihat Nilai Penguji 1</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($nilaipenguji2 as $sidang2)
                        @if ($sidang2->mahasiswa == $sidang->mahasiswa)
                            <a href="{{ route('nilai.penguji2', ['id' => $sidang2->id]) }}" class="btn btn-link">Lihat Nilai Penguji 2</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($nilaipenguji3 as $sidang2)
                        @if ($sidang2->mahasiswa == $sidang->mahasiswa)
                            <a href="{{ route('nilai.penguji3', ['id' => $sidang2->id]) }}" class="btn btn-link">Lihat Nilai Penguji 3</a>
                        @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
