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
    <h1 class="page-title">List Permohonan Konsumsi</h1>
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
                    <li class="active">
                        <a href="#">
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
            <table id="my-table" class="table table-bordered table-striped table-booking-history">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>No. Permohonan Konsumsi</th>
                        <th>Tanggal</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah</th>
                        <th>Sumber Dana</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Konsumsi</th>
                        <th>Jumlah</th>
                        {{-- <th>Status Spv</th>
                        <th>Status Manajer</th> --}}
                        <th>Status Permohonan</th>
                        <th>Keterangan</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagination as $i => $permohonanKonsumsi)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        @if ($permohonanKonsumsi->no_permohonan_konsumsi == 0)
                        <td>Tanpa Ruangan</td>
                        @else
                        <td>{{ $permohonanKonsumsi->nomor['no_pemesanan_ruangan'] }}</td>
                        @endif
                        <td>{{ $permohonanKonsumsi->tanggal }}</td>
                        <td>{{ $permohonanKonsumsi->tanggal_selesai }}</td>
                        <td>{{ $permohonanKonsumsi->jumlah }}</td>
                        <td>{{ $permohonanKonsumsi->sumber_dana }}</td>
                        <td>{{ $permohonanKonsumsi->kegiatan }}</td>
                        <td>{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
                        <td>{{ $permohonanKonsumsi->jumlah_peserta }}</td>
                        <td>{{ $permohonanKonsumsi->status_pj }}</td>
                        <td>{{ $permohonanKonsumsi->keterangan }}</td>
                        {{-- <td>{{ $permohonanKonsumsi->status_approval }}</td> --}}
                        <td>
                            @if($permohonanKonsumsi->manajer == $user->id)
                                @if($permohonanKonsumsi->status_manajer == 'Pending')
                                    <a class="btn btn-sm btn-success" href="{{ route('approve-manager-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Approve</a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-manager-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Reject</a>
                                @elseif($permohonanKonsumsi->status_manajer == 'Approved')
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-manager-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Reject</a>
                                @endif
                            @elseif($permohonanKonsumsi->supervisor == $user->id)
                                @if($permohonanKonsumsi->status_supervisor == 'Pending')
                                    <a class="btn btn-sm btn-success" href="{{ route('approve-supervisor-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Approve</a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-supervisor-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Reject</a>
                                @elseif($permohonanKonsumsi->status_supervisor == 'Approved')
                                    <a class="btn btn-sm btn-warning" href="{{ route('reject-supervisor-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Reject</a>
                                @endif
                            @endif
                            <a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection