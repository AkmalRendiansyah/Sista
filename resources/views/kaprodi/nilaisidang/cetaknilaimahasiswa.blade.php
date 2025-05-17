<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Report Nilai Sidang TA</title>
    <style>
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>
<body>
    <center>
        <h4>Report Nilai Sidang TA</h4>
    </center>
    @foreach ($sidang_ta as $sidang)
<p>Nama Mahasiswa : {{$sidang->mahasiswa->name}} </p>
<p>Judul Ta : {{$sidang->judul}} </p>

    @endforeach
    {{-- <a href="/jadwal-proposal/create" class="btn btn-primary mb-3">Add Jadwal</a>  --}}
    <table class='table table-bordered'>
        @foreach ($nilai_ta_ketua as $nilai1)
        @foreach ($nilai_ta_penguji1 as $nilai2)
        @foreach ($nilai_ta_penguji2 as $nilai3)
        @foreach ($nilai_ta_penguji3 as $nilai4)
        @foreach ($nilai_ta as $nilai5)
        @foreach ($nilai_ta_pem2 as $nilai6)
        <tr>
            <th>No</th>
            <th>Jabatan</th>
            <th>nama</th>
            <th>Total Nilai</th>
        </tr>
       
        <tr>
            <td>1</td>
            <td>Pembimbing 1</td>
            <td>{{$nilai5->pembimbing1->name}}</td>
            <td>{{ $nilai5->total }}</td>
            
        </tr>
   
        
        <tr>
            <td>2</td>
            <td>Pembimbing 2</td>
            <td>{{$nilai6->pembimbing2->name}}</td>
            <td>{{ $nilai6->total }}</td>
            
        </tr>
     
        <tr>
           
            <td colspan="2" align="center">Nilai Rata Rata Pendidikan</td>
            
           <td colspan="2">{{ number_format(($nilai5->total + $nilai6->total) / 2, 1) }}</td>
            
            
        </tr>
        
        <tr>
            <td>2</td>
            <td>Ketua Sidang</td>
            <td>{{$nilai1->ketua->name}}</td>
            <td>{{ $nilai1->total }}</td>
            
        </tr>
        
        <tr>
            <td>2</td>
            <td>Penguji 1 Sidang</td>
            <td>{{$nilai2->penguji1->name}}</td>
            <td>{{ $nilai2->total }}</td>
            
        </tr>
       
        <tr>
            <td>2</td>
            <td>Penguji 2 Sidang</td>
            <td>{{$nilai3->penguji2->name}}</td>
            <td>{{ $nilai3->total }}</td>
            
        </tr>
        
        <tr>
            <td>2</td>
            <td>Penguji 3 Sidang</td>
            <td>{{$nilai4->penguji3->name}}</td>
            <td>{{ $nilai4->total }}</td>
            
        </tr>
       
        <tr>
           
            <td colspan="2" align="center">Nilai Rata Rata Penguji</td>
            
            <td colspan="2">{{ ($nilai1->total+$nilai2->total+$nilai3->total+$nilai4->total)/4 }}</td>
            
        </tr>
    
     

        <tr>
           
            <td colspan="2" align="center">Nilai Akhir</td>
            
            <td colspan="2">{{ number_format( ($nilai1->total+$nilai2->total+$nilai3->total+$nilai4->total+$nilai5->total+$nilai6->total)/6 , 1)}}</td>
            
        </tr>
        
        <tr>
           
            <td colspan="2" align="center">Hasil lulus</td>
            @php
            $countLulus = 0;
            if ($nilai1->total >= 65) $countLulus++;
            if ($nilai2->total >= 65) $countLulus++;
            if ($nilai3->total >= 65) $countLulus++;
            if ($nilai4->total >= 65) $countLulus++;
            @endphp
            <td colspan="2">
                @if ($countLulus >= 3)
                Lulus sidang
            @else
                Tidak lulus sidang
            @endif
            </td>
            
        </tr>
        @endforeach
        @endforeach
        @endforeach
        @endforeach
        @endforeach
        @endforeach


   
       
           

    
    </table>
    
