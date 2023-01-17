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
        white-space: no-wrap;
        vertical-align: middle;
    }
</style>
<div class="container">
    <h1 class="page-title">List Peminjaman Ruangan</h1>
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
                    <li class="active">
                        <a href="#">
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

        <div class="col-md-9" style="overflow-x: scroll;">
            <table id="my-table"class="table table-bordered table table-striped table-booking-history" style="white-space: nowrap;">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Tanggal Selesai</th>
                        <th>Acara</th>
                        <th>Nama Pemesan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Peserta</th>
                        <th>Ruangan</th>
                        {{-- <td>Status Spv</td>
                        <td>Status Manajer</td> --}}
                        <td>Status Permohonan</td>
                        <th>Attachment</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagination as $i => $pemesananRuangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pemesananRuangan->no_pemesanan_ruangan }}</td>
                        <td>{{ $pemesananRuangan->tanggal }}</td>
                        <td>{{ $pemesananRuangan->tanggal_selesai }}</td>
                        <td>{{ $pemesananRuangan->nama_acara }}</td>
                        <td>{{ $pemesananRuangan->nama_pemesan }}</td>
                        <td>{{ date("H:i",$pemesananRuangan->waktu_awal)}}</td>
                        <td>{{ date("H:i",$pemesananRuangan->waktu_akhir)}}</td>
                        <td>{{ $pemesananRuangan->jumlah_peserta }}</td>
                        <td>{{ $pemesananRuangan->ruang['nama_ruang'] }}</td>
                        {{-- <td>{{ $pemesananRuangan->status_supervisor }}</td>
                        <td>{{ $pemesananRuangan->status_manajer }}</td> --}}
                        <td>{{ $pemesananRuangan->status_pj }}</td>
                        <td>
                            <a href="{{asset('pemesanan_ruangan/attachment/'.$pemesananRuangan->attachment) }}" download>
                                Click
                            </a>
                        </td>
                        <td>{{ $pemesananRuangan->keterangan }}</td>
                        <td class="row" width="300">
                            @if($pemesananRuangan->manajer == $user->id)
                                @if($pemesananRuangan->status_manajer == 'Pending')
                                    <a class="btn btn-sm btn-success" href="{{ route('approve-manager-ruang', [$pemesananRuangan->getKey()]) }}">Approve</a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-manager-ruang', [$pemesananRuangan->getKey()]) }}">Reject</a>
                                @elseif($pemesananRuangan->status_manajer == 'Approved')
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-manager-ruang', [$pemesananRuangan->getKey()]) }}">Reject</a>
                                @endif
                            @elseif($pemesananRuangan->supervisor == $user->id)
                                @if($pemesananRuangan->status_supervisor == 'Pending')
                                    <a class="btn btn-sm btn-success" href="{{ route('approve-supervisor-ruang', [$pemesananRuangan->getKey()]) }}">Approve</a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-supervisor-ruang', [$pemesananRuangan->getKey()]) }}">Reject</a>
                                @elseif($pemesananRuangan->status_supervisor == 'Approved')
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-supervisor-ruang', [$pemesananRuangan->getKey()]) }}">Reject</a>
                                @endif
                            @endif
                            <a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-ruang', [$pemesananRuangan->getKey()]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection