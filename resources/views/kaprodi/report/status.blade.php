<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Report Status Sidang TA</title>
    <style>
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>
<body>
    <center>
        <h4>Report Status Sidang TA</h4>
    </center>
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Mahasiswa</th>
           
            {{-- <th>Judul Ta</th> --}}
            <th>Total Nilai</th>
            <th>Status Kelulusan</th>

        </tr>
    </thead>
    <tbody>
        @foreach($nilaitas as $nilai)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{ $nilai->mahasiswa->name }}</td>
            {{-- <td>{{ $nilai->judul }}</td> --}}
            <td>{{ $nilai->nilai_akhir }}</td>
            <td>{{ $nilai->status }}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>