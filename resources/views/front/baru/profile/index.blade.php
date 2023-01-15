@extends('front.baru.master')
@section('content')
<div class="container">
    <h1 class="page-title">Profil Akun</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="user-profile-sidebar">
                <div class="user-profile-avatar text-center">
                    <img src="{{asset('vendor/frontend')}}/img/amaze_300x300.jpg" alt="Image Alternative text" title="AMaze" />
                    <h5>{{$user->nama}}</h5>
                    <p>{{$user->jabatan}}</p>
                </div>
                <ul class="list user-profile-nav">                    
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile.setting')}}">
                            <i class="fa fa-cog"></i>
                            Pengaturan
                        </a>
                    </li>
                    <li>
                        <a href="{{route('list-peminjaman-ruang')}}">
                            <i class="fa fa-home"></i>
                            Pemesanan Ruangan
                        </a>
                    </li>
                    <li>
                        <a href="{{route('list-permohonan-konsumsi')}}">
                            <i class="fa fa-spoon"></i>
                            Permohonan Konsumsi
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{route('list-permohonan-atk')}}">
                            <i class="fa fa-pencil"></i>
                            Permohonan ATK
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{route('list-permohonan-kendaraan')}}">
                            <i class="fa fa-map-marker"></i>
                            Permohonan Kendaraan
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{route('list-surat-perintah-jalan')}}">
                            <i class="fa fa-map-marker"></i>
                            Surat Perintah Jalan
                        </a>
                    </li> --}}
                </ul>
            </aside>
        </div>
        <div class="col-md-9">
            <h4>Total Permohonan</h4>
            <ul class="list list-inline user-profile-statictics mb30">
                <li>
                    <i class="fa fa-home user-profile-statictics-icon"></i>
                    <h5>{{$pemesananRuangan}}</h5>
                    <p>Pemesanan<br>Ruangan</p>
                </li>
                <li>
                    <i class="fa fa-spoon user-profile-statictics-icon"></i>
                    <h5>{{$permohonanKonsumsi}}</h5>
                    <p>Permohonan<br>Konsumsi</p>
                </li>
                {{-- <li>
                    <i class="fa fa-pencil-square user-profile-statictics-icon"></i>
                    <h5>{{$permohonanAtk}}</h5>
                    <p>Permohonan<br>Alat Tulis Kantor</p>
                </li> --}}
                <li>
                    <i class="fa fa-map-marker user-profile-statictics-icon"></i>
                    <h5>{{$permohonanPemakaianKendaraan}}</h5>
                    <p>Permohonan<br>Kendaraan</p>
                </li>
                <!-- <li>
                    <i class="fa fa-minus-square user-profile-statictics-icon"></i>
                    <h5>3</h5>
                    <p>Unknown<br>Unknown</p>
                </li> -->
            </ul>
        </div>
    </div>
</div>
@endsection