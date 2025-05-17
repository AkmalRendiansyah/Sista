@extends('dashboard.mainkaprodi')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Penguji 1 Sidang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>

    <form >
        <table class="table table-bordered">
            @foreach ($nilaisidang as $nilai)
            <thead>
                <tr>
                    <th>No</th>
                    <th>Materi Penilaian</th>
                    <th>Bobot</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <td>1</td>
                <td>Bimbingan</td>
            </tbody>
            <tbody>
                <td></td>
                <td>Sikap Dan Penampilan</td>
                <td>5</td>
                <td>
                   {{$nilai->sikap}}
                </td>
           
            </tbody>
       
            <tbody>
                <td></td>
                <td>Komunikasi Dan Sistematika</td>
                <td>5</td>
                <td>
                   {{$nilai->komunikasi}}
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Penguasaan Materi</td>
                <td>20</td>
                <td>
                    {{$nilai->penguasaan_materi}}
                </td>
           
            </tbody>
            <tbody>
                <td>2</td>
                <td>Makalah</td>
            </tbody>
            <tbody>
                <td></td>
                <td>Identifikasi Masalah,Tujuan Dan Konstribusi Penelitian</td>
                <td>5</td>
                <td>
                    {{$nilai->identifikasi_masalah}}
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Relevasi Teori Atau Referensi Pustaka Dan Konsep Dengan Masalah Penelitian</td>
                <td>5</td>
                <td>
                    {{$nilai->relevansi_teori}}
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Metoda Atau Algoritma Yang Digunakan</td>
                <td>10</td>
                <td>
                   {{$nilai->metode}}
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Hasil Dan Pembahasan</td>
                <td>15</td>
                <td>
                    {{$nilai->hasil}}
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Kesimpulan Dan Saran</td>
                <td>5</td>
                <td>
                    {{$nilai->kesimpulan}}
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Penggunaan Bahasa Dan Tata Tulis</td>
                <td>5</td>
                <td>
                    {{$nilai->penggunaan_bahasa}}
                </td>
           
            </tbody>
            <tbody>
                <td>3</td>
                <td>Product</td> 
            </tbody>
            <tbody>
                <td></td>
                <td>Kesesuaian Fungsionalitas Sistem</td>
                <td>25</td>
                <td>
                  {{$nilai->kesesuaian}}
                </td>
           
            </tbody>
            <tbody>
               
                <td colspan="3" >Total Nilai Mahasiswa</td>
               
                <td>
                  
                  {{$nilai->total}}
                  </td>
                  
           
            </tbody>
            <tbody>
               
                <td  >Komentar</td>
               
                <td colspan="3">
                  
                    {{$nilai->komentar}}
                  
                  </td>
                  
           
            </tbody>
        </table>
        <div class="d-flex justify-content-center mb-3">
            
            <a href="/nilai-sidang-ta-mahasiswa-prod" class="btn btn-danger w-25 no-underline">Back</a>


        </div> 

      </form>
@endforeach
@endsection
{{-- @foreach($evaluations as $index => $evaluation)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><input type="text" name="evaluations[{{ $index }}][type]" value="{{ $evaluation->type }}" class="form-control"></td>
                        <td><input type="text" name="evaluations[{{ $index }}][criteria]" value="{{ $evaluation->criteria }}" class="form-control"></td>
                        <td><input type="number" name="evaluations[{{ $index }}][weight]" value="{{ $evaluation->weight }}" class="form-control"></td>
                        <td><input type="number" step="0.01" name="evaluations[{{ $index }}][score]" value="{{ $evaluation->score }}" class="form-control"></td>
                        <input type="hidden" name="evaluations[{{ $index }}][id]" value="{{ $evaluation->id }}">
                    </tr>
                @endforeach --}}