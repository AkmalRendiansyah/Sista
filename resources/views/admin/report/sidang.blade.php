<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Report Penguji Sidang TA</title>
    <style>
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>
<body>
    <center>
        <h4>Report Penguji Sidang TA</h4>
    </center>
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Mahasiswa</th>
           
            <th>Sebagai Ketua</th>
            <th>Sebagai Penguji 1</th>
            <th>Sebagai Penguji 2</th>
            <th>Sebagai Penguji 3</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwaltas as $jadwal)
        <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{ $jadwal->mahasiswa->name }}</td>
            <td>{{ $jadwal->ketua->name }}</td>
            <td>{{ $jadwal->penguji1->name }}</td>
            <td>{{ $jadwal->penguji2->name }}</td>
            <td>{{ $jadwal->penguji3->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>