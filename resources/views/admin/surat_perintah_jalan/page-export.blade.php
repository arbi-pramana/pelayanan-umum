<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Export PDF</title>
  <!-- Favicon-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap Core Css -->
  <link href="{{ asset('vendor/admin-bsb/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <style>
        body{
            padding:50px;
            font-size: 12px !important;
        }
        .header-pdf{
            display : flex;
            justify-content: space-between;
        }
        .logo-header{
            display : flex;
            justify-content: space-between;
            gap: 10px;
        }
        .text-logo{
            text-decoration: blackl
        }
        th,td{
            padding: 10px;
        }
        .content-body{
            margin-top: 20px;
            display:flex;
            justify-content: center;
        }
        .tujuan-body{
            display:flex;
            justify-content: space-between;
        }
        .berangkat-body{
            display:flex;
            justify-content: space-between;
        }
        .kembali-body{
            display:flex;
            justify-content: space-between;
        }
        .ttd{
            marin-top:30px !important;
            display:flex;
            justify-content: space-between;
            padding-right: 100px;
            padding-left: 100px;
        }
        .flexdisplay{
            display:flex;
            justify-content: space-between; 
        }
        .footer {
            border: 2px solid black;
            padding: 5px;
        }
        ul.dash {
            list-style: none;
            margin-left: 0;
            padding-left: 1em;
        }
        ul.dash > li:before {
            display: inline-block;
            content: "-";
            width: 1em;
            margin-left: -1em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-pdf">
            <div class="logo-header">
                <div class="image-logo">
                    <img src="{{asset('logo/new-logo.png')}}"  alt=""  width="150">
                </div>
                <div class="text-logo">
                    <h5><b> PT PLN Nusantara Power<b></h5>
                    <h5 style="margin-top: -5px;"><b>Unit Pembangkitan Muara Karang<b></h5>
                </div>
            </div>
            <div class="nopol-header">
                <table border="1">
                    <tr>
                        <th >No Pol</th>
                        <td style="padding-right: 90px;">{{$surat->no_pol}}</td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td style="padding-right: 90px;">{{$surat->nama_kendaraan}}</td>
                    </tr>
                
                </table>
            </div>
           
        </div>
        <div class="content-body">
            <div class="header-body">
                <h5 style="letter-spacing: 3px;"><b>SURAT PERINTAH JALAN<b></h5>
                <h6 class="text-center"> <b>( Diisi oleh Pool Kendaraan ) <b></h6>
            </div>
        </div>
        <div class="desc-body">
            <div class="nama_pengemudi">
                <label for="">Nama Pengemudi &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; : </label>
                <span>{{$surat->nama_driver}}</span>
            </div>
            <div class="tujuan-body">
                <div class="tujuan">
                    <label for="">Tujuan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: </label>
                    <span>{{$surat->tujuan}}</span>
                </div>
                <div class="jarak">
                    <label for="">Jarak Tempuh : </label>
                    <span>{{$surat->jarak}} KM</span>
                </div>

            </div>
            <div class="Lama Perjalanan">
                <label for="">Lama Perjalanan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: </label>
                <span>-</span>
            </div>
            <div class="berangkat-body">
                <div class="berangkat">
                    <label for="">Berangkat Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: </label>
                    <span>{{$surat->tanggal_berangkat}}</span>
                </div>
                <div class="">
                    <label for="">Pukul : </label>
                    <span> {{$surat->jam_berangkat}}</span>
                </div>
            </div>
            <div class="kembali-body">
                <div class="kembali">
                    <label for="">Kembali Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: </label>
                    <span>{{$surat->tanggal_kembali}}</span>
                </div>
                <div class="">
                    <label for="">Pukul : </label>
                    <span> {{$surat->jam_kembali}}</span>
                </div>
            </div>
            <div class="pengisian">
                <label for="">Pengisian BB Prem / Solar &emsp;&nbsp;&nbsp;&nbsp;: </label>
                <span>{{$surat->pengisian_bbm}} Liter</span>
            </div>
            <div class="tanggal" style="margin-left:470px;">
                <span>Jakarta, {{$surat->created_at->format('d-m-Y')}}</span>
            </div>
            <div class="ttd" style="margin-top: 30px;">
                <div class="ttd-1">
                    <p style="margin-bottom: 60px;margin-left:20px;">Mengetahui / Menyetujui</p>

                    <span >(..................................................)</span>
                </div>
                <div class="ttd-2">
                    <p style="margin-bottom: 60px;margin-left: 40px;">Pool Kendaraan</p>

                    <span >(..................................................)</span>
                </div>
            </div>
           
            <div class="line-1"style="border-bottom:3px solid black;margin-top:10px;"></div>
            <div class="line-1"style="border-bottom:1px solid black;margin-top:10px;"></div>
            <div class="permohonan-pemakaian">
                <div class="header" style="margin-top: 20px !important;">
                    <h5 class="text-center"><b>PERMOHONAN PEMAKAIAN KENDARAAN BERMOTOR DINAS<b></h5>
                    <h6 class="text-center"style="margin-top:-10px;"> <b>KEPERLUAN : DINAS / SOSIAL / REKREASI <b></h6>
                </div>
                <div class="body-permohonan">
                    <div class="nama-pemohon flexdisplay">
                        <div>
                            <label for="">Nama Pemohon &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: </label>
                            <span>{{$surat->pemohon}}</span>
                        </div>
                        <div>
                            <label for="">Jabatan : </label>
                            <span> {{$surat->pemohon}}</span>
                        </div>
                    </div>
                    <div class="jumlah-pengikut">
                        <label for="">Jumlah Penumpang / Pengikut : </label>
                        <span>-</span>
                    </div>
                    <div class="tujuan">
                        <label for="">Tujuan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: </label>
                        <span>{{$surat->tujuan}}</span>
                    </div>
                    <div class="keperluan">
                        <label for="">Keperluan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: </label>
                        <span>{{$surat->keperluan}}</span>
                    </div>
                    <div class="berangkat-body">
                        <div class="berangkat">
                            <label for="">Berangkat Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: </label>
                            <span>{{$surat->tanggal_berangkat}}</span>
                        </div>
                        <div class="">
                            <label for="">Pukul : </label>
                            <span> {{$surat->jam_berangkat}}</span>
                        </div>
                    </div>
                    <div class="kembali-body">
                        <div class="kembali">
                            <label for="">Kembali Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: </label>
                            <span>{{$surat->tanggal_kembali}}</span>
                        </div>
                        <div class="">
                            <label for="">Pukul : </label>
                            <span> {{$surat->jam_kembali}}</span>
                        </div>
                    </div>
                    <div class="tanggal" style="margin-left:470px;">
                        <span>Jakarta, {{$surat->created_at->format('d-m-Y')}}</span>
                    </div>
                    <div class="ttd" style="margin-top: 30px;">
                        <div class="ttd-1">
                            <p style="margin-bottom: 65px;margin-left:20px;">Mengetahui / Menyetujui</p>
        
                            <span >(..................................................)</span>
                        </div>
                        <div class="ttd-2">
                            <p style="margin-bottom: 65px;margin-left: 40px;">Pemohon</p>
        
                            <span >(..................................................)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="keterangan">
                <p>Keterangan</p>
                <ul class="dash">
                    <li>Lembar - 1 : Untuk lampiran rekapitulasi biaya kendaraan</li>
                    <li>Lembar - 2 : Untuk arsip Pool Kendaraan</li>
                    <li>Lembar - 3 : Untuk Pos Satpam</li>
                </ul>
            </div>

            <div class="footer">
                <div style="border: 1px solid black;padding:5px;">
                    <p class="text-center">Perubahan / Penyimpanan route perjalanan SPJ ini menjadi tanggung jawab Pengemudi / Pemakai Utama</p>
                </div>
            </div>
    </div>
  
  <script src="{{ asset('vendor/admin-bsb/plugins/jquery/jquery.min.js') }}"></script>

  <!-- Bootstrap Core Js -->
  <script src="{{ asset('vendor/admin-bsb/plugins/bootstrap/js/bootstrap.js') }}"></script>

  <!-- Select Plugin Js -->
  <script src="{{ asset('vendor/admin-bsb/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

</body>

</html>