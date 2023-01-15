<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th {
            text-align: left;
            }
        td{
            padding-left:50px !important;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama Driver </th>
            <td>{{$surat['nama_driver']}}</td>
        </tr>
        <tr>
            <th>Tujuan </th>
            <td>{{$surat['tujuan']}}</td>
        </tr>
        <tr>
            <th>Tanggal Berangkat </th>
            <td>{{$surat['tanggal_berangkat']}}</td>
        </tr>
        <tr>
            <th>Jam Berangkat </th>
            <td>{{$surat['jam_berangkat']}}</td>
        </tr>
        <tr>
            <th>Tanggal Kembali </th>
            <td>{{$surat['tanggal_kembali']}}</td>
        </tr>
        <tr>
            <th>Jam Kembali </th>
            <td>{{$surat['jam_kembali']}}</td>
        </tr>
        <tr>
            <th>Mobil </th>
            <td>{{$surat['nama_kendaraan']}} - {{$surat['no_pol']}} </td>
        </tr>
        <tr>
            <th>Jarak </th>
            <td>{{$surat['jarak']}} KM</td>
        </tr>
        <tr>
            <th>Biaya Toll </th>
            <td>Rp . {{number_format($surat['biaya_toll'])}}</td>
        </tr>
        <tr>
            <th>Total Biaya Ke 1 </th>
            <td>Rp . {{number_format($surat['total_biaya'])}}</td>
        </tr>
        <tr>
            <th>Total Biaya Ke 2</th>
            <td>Rp . {{number_format($surat['total_biaya_2'])}}</td>
        </tr>
    </table>
</body>
</html>