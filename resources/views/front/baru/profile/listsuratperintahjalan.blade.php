@extends('front.baru.master')
@section('content')
@php
$user = App\Models\Karyawan::where('id', auth()->guard('front')->id())->first();
@endphp
<style>
    tr td:last-child,
    td,
    th {
        width: auto;
        white-space: nowrap;
        vertical-align: middle;
    }
</style>
<div class="container">
    <h1 class="page-title">List Surat Perintah Jalan</h1>
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
                    <li>
                        <a href="{{route('profile.index')}}">
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
                    <li class="active">
                        <a href="{{route('list-surat-perintah-jalan')}}">
                            <i class="fa fa-map-marker"></i>
                            Surat Perintah Jalan
                        </a>
                    </li>
                </ul>
            </aside>
        </div>

        <div class="col-md-9" style="overflow-x: scroll;">
            <table class="table table-bordered table-striped table-booking-history">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Pengemudi</th>
                        <th>Tujuan</th>
                        <th>Jarak</th>
                        <th>Tanggal Berangkat</th>
                        <th>Tanggal Kembali</th>
                        <th>Jam Berangkat</th>
                        <th>Jam Kembali</th>
                        <th>Pengisian BBM</th>
                        <th>Biaya Toll</th>
                        <th>Total Biaya</th>
                        {{-- <th>Penanggung Jawab</th>
                        <th>Status Penanggung Jawab</th>
                        <th>Penanggung Jawab Pool</th>
                        <th>Status Penanggung Jawab Pool</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(!$pagination->count())
                    <tr>
                        <td colspan="11" class="text-center">
                            Records empty.
                        </td>
                    </tr>
                    @endif
                    @foreach($pagination->items() as $i => $suratPerintahJalan)
                    <tr align="center">
                        <td>{{ $pagination->firstItem() + $i }}</td>
                        <td>{{ $suratPerintahJalan->driver->nama_driver }}</td>
                        <td>{{ $suratPerintahJalan->tujuan }}</td>
                        <td>{{ $suratPerintahJalan->jarak }} Km</td>
                        <td>{{ $suratPerintahJalan->tanggal_berangkat }}</td>
                        <td>{{ $suratPerintahJalan->tanggal_kembali }}</td>
                        <td>{{ $suratPerintahJalan->jam_berangkat }}</td>
                        <td>{{ $suratPerintahJalan->jam_kembali }}</td>
                        <td>{{ $suratPerintahJalan->pengisian_bbm }}</td>
                        <td>Rp . {{ number_format($suratPerintahJalan->biaya_toll) }}</td>
                        <td>Rp . {{ number_format($suratPerintahJalan->total_biaya) }}</td>
                        {{-- <td>{{ $suratPerintahJalan->penanggung_jawab }}</td>
                        <td>{{ $suratPerintahJalan->status_pj }}</td>
                        <td>{{ $suratPerintahJalan->penanggung_jawab_pool }}</td>
                        <td>{{ $suratPerintahJalan->status_pj_pool }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pagination->links() }}
        </div>
    </div>
</div>
@endsection