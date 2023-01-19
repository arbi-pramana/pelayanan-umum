@extends('front.baru.master')
@section('content')
@php
$user = App\Models\Karyawan::where('id', auth()->guard('front')->id())->first();
@endphp
<div class="container">
    <h1 class="page-title">Pengaturan Akun</h1>
</div>
<div class="container" style="margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-3">
            <aside class="user-profile-sidebar">
                <div class="user-profile-avatar text-center">
                    <img src="{{asset('vendor/frontend')}}/img/amaze_300x300.jpg" alt="Image Alternative text"
                        title="AMaze" />
                    <h5>{{$user->nama}}</h5>
                    <p>{{$user->jabatan}}</p>
                </div>
                <ul class="list user-profile-nav">
                    <li>
                        <a href="{{route('profile.index')}}">
                            <i class="fa fa-user"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
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
        @if(session('msg'))
        <div class="col-md-9">
            <div class="alert alert-warning" role="alert">
                <b>{{session('msg')}}</b>
            </div>
        </div>
        @endif
        <h4>Informasi Personal</h4>
        <div class="col-md-9" style="margin-bottom:30px;">
            <form method="POST" action="{{route('profile.updateInfo')}}">
                <div class="row">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group form-group-icon-left"><i class="fa fa-key input-icon"></i>
                            <label>Nomor Induk</label>
                            <input class="form-control" value="{{$user->no_induk}}" name="no_induk" type="text"
                                readonly />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                            <label>Nama Lengkap</label>
                            <input class="form-control" value="{{$user->nama}}" name="nama" type="text" readonly
                                required />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-cubes input-icon"></i>
                            <label>Jabatan</label>
                            <input class="form-control" value="{{$user->jabatan}}" name="jabatan" type="text"
                                required />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-cubes input-icon"></i>
                            <label>Sub-Bidang</label>
                            <input class="form-control" value="{{$user->sub_bidang}}" name="sub_bidang" type="text"
                                required />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-bank input-icon"></i>
                            <label>Pendidikan</label>
                            <input class="form-control" value="{{$user->pendidikan}}" name="pendidikan" type="text"
                                required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left"><i class="fa fa-key input-icon"></i>
                            <label>NID</label>
                            <input class="form-control" value="{{$user->nid}}" name="nid" type="text" required
                                readonly />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                            <label>Nama Asli</label>
                            <input class="form-control" value="{{$user->nama_tanpa_gelar}}" name="nama_tanpa_gelar"
                                type="text" required readonly />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-cubes input-icon"></i>
                            <label>Bidang</label>
                            <input class="form-control" value="{{$user->bidang}}" name="bidang" type="text" required />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-cubes input-icon"></i>
                            <label>Grade</label>
                            <input class="form-control" value="{{$user->grade}}" name="grade" type="text" required />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-bank input-icon"></i>
                            <label>Universitas</label>
                            <input class="form-control" value="{{$user->universitas}}" name="universitas" type="text"
                                required />
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-warning" value="Ubah Data">
            </form>
        </div>
        <div class="col-md-9">
            <h4>Ubah Password</h4>
            <form method="POST" action="{{route('profile.updatePass')}}">
                {{ csrf_field() }}
                <input class="form-control" value="{{$user->no_induk}}" name="no_induk" type="hidden" readonly />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left"><i class="fa fa-key input-icon"></i>
                            <label>Password Baru</label>
                            <input class="form-control" name="password_baru" type="password" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left"><i class="fa fa-key input-icon"></i>
                            <label>Ulangi Password Baru</label>
                            <input class="form-control" name="ulang_password_baru" type="password" required />
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-warning" value="Ubah Password">
            </form>
        </div>
    </div>
</div>
@endsection