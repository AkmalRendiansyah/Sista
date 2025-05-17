@extends('dashboard.maindosen')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pembimbing 1 Sidang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Nilai {{ $nilai->mahasiswa->name }}</li>
        </ol>
    </div>

    <form action="/nilai-pembimbing1-sidang-ta/{{$nilai->id}}" method="POST">
        @method('PUT')
        @csrf
        <table class="table table-bordered">
  
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
                    <input type="number" name="sikap" step="0.01" class="form-control @error('sikap') is-invalid @enderror" value="{{ old('sikap', $nilai->sikap) }}">
                        @error('sikap')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Komunikasi Dan Sistematika</td>
                <td>5</td>
                <td>
                    <input type="number" name="komunikasi"  step="0.01" class="form-control @error('komunikasi') is-invalid @enderror" value="{{ old('komunikasi', $nilai->komunikasi) }}">
                        @error('komunikasi')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Penguasaan Materi</td>
                <td>20</td>
                <td>
                    <input type="number" name="penguasaan_materi" step="0.01" class="form-control @error('penguasaan_materi') is-invalid @enderror" value="{{ old('penguasaan_materi', $nilai->penguasaan_materi) }}">
                        @error('penguasaan_materi')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
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
                    <input type="number" name="identifikasi_masalah" step="0.01"  class="form-control @error('identifikasi_masalah') is-invalid @enderror" value="{{ old('identifikasi_masalah', $nilai->identifikasi_masalah) }}">
                        @error('identifikasi_masalah')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Relevasi Teori Atau Referensi Pustaka Dan Konsep Dengan Masalah Penelitian</td>
                <td>5</td>
                <td>
                    <input type="number" name="relevansi_teori" step="0.01" class="form-control @error('relevansi_teori') is-invalid @enderror" value="{{ old('relevansi_teori', $nilai->relevansi_teori) }}">
                        @error('relevansi_teori')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Metoda Atau Algoritma Yang Digunakan</td>
                <td>10</td>
                <td>
                    <input type="number" name="metode" step="0.01" class="form-control @error('metode') is-invalid @enderror" value="{{ old('metode', $nilai->metode) }}">
                        @error('metode')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Hasil Dan Pembahasan</td>
                <td>15</td>
                <td>
                    <input type="number" name="hasil" step="0.01" class="form-control @error('hasil') is-invalid @enderror" value="{{ old('hasil', $nilai->hasil) }}">
                        @error('hasil')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Kesimpulan Dan Saran</td>
                <td>5</td>
                <td>
                    <input type="number" name="kesimpulan" step="0.01" class="form-control @error('kesimpulan') is-invalid @enderror" value="{{ old('kesimpulan', $nilai->kesimpulan) }}">
                        @error('kesimpulan')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
                <td></td>
                <td>Penggunaan Bahasa Dan Tata Tulis</td>
                <td>5</td>
                <td>
                    <input type="number" name="penggunaan_bahasa" step="0.01" class="form-control @error('penggunaan_bahasa') is-invalid @enderror" value="{{ old('penggunaan_bahasa', $nilai->penggunaan_bahasa) }}">
                        @error('penggunaan_bahasa')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
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
                    <input type="number" name="kesesuaian" step="0.01" class="form-control @error('kesesuaian') is-invalid @enderror" value="{{ old('kesesuaian', $nilai->kesesuaian) }}">
                        @error('kesesuaian')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                </td>
           
            </tbody>
            <tbody>
               
                <td colspan="3" >Total Nilai Mahasiswa</td>
               
                <td>
                  
                    <input type="number" name="total" id="total" step="0.01" class="form-control @error('total') is-invalid @enderror" 
                      value="{{ old('total' , $nilai->total)}}" readonly>
                    @error('total')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </td>
                  
           
            </tbody>
            <tbody>
               
                <td  >Komentar</td>
               
                <td colspan="3">
                  
                    <input type="text" name="komentar" id="komentar"  class="form-control" 
                      value="{{ old('komentar' , $nilai->komentar)}}" >
                  
                  </td>
                  
           
            </tbody>
        </table>
        <div class="d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-success w-25">Update</button>
            <a href="/nilai-pembimbing1-sidang-ta" class="btn btn-danger w-25 no-underline">Back</a>
        </div>

      </form>

@endsection
