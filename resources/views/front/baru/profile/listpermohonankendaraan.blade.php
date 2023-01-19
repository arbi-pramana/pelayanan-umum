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
    <h1 class="page-title">List Permohonan Kendaraan</h1>
</div>
<div class="container">
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
                    <li class="active">
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
                        <th class="text-center column-number" width="20">
                            No
                        </th>
                        <th class="column-pemohon">
                            Pemohon
                        </th>
                        <th class="column-tujuan">
                            Tujuan
                        </th>
                        <th class="column-keperluan">
                            Keperluan
                        </th>
                        <th class="column-penanggung_jawab">
                           Nama Pemesan
                        </th>
                        <th class="column-tanggal_berangkat">
                            Tanggal Berangkat
                        </th>
                        <th class="column-tanggal_kembali">
                            Tanggal Kembali
                        </th>
                        <th class="column-jam_berangkat">
                            Jam Berangkat
                        </th>
                        <th class="column-jam-kembali">
                            Jam Kembali
                        </th>
                        <th class="column-nama-driver">
                            Nama Driver
                        </th>
                        <th class="column-status_pj">
                            Status Permohon
                        </th>
                        <th class="text-center column-action">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagination as $i => $permohonanPemakaianKendaraan)
                    <tr align="center">
                        <td class="text-center column-number">
                            {{ $loop->iteration }}
                        </td>
                        <td class="column-pemohon">
                            {{ $permohonanPemakaianKendaraan->pemohon }}
                        </td>
                        <td class="column-tujuan">
                            {{ $permohonanPemakaianKendaraan->tujuan }}
                        </td>
                        <td class="column-keperluan">
                            {{ $permohonanPemakaianKendaraan->keperluan }}
                        </td>
                        <td class="column-penanggung_jawab">
                            {{ $permohonanPemakaianKendaraan->penanggung_jawab }}
                        </td>
                        <td class="column-tanggal_berangkat">
                            {{ $permohonanPemakaianKendaraan->tanggal_berangkat }}
                        </td>
                        <td class="column-tanggal_kembali">
                            {{ $permohonanPemakaianKendaraan->tanggal_kembali }}
                        </td>
                        <td class="column-jam_berangkat">
                            {{ $permohonanPemakaianKendaraan->jam_berangkat }}
                        </td>
                        <td class="column-jam_kembali">
                            {{ $permohonanPemakaianKendaraan->jam_kembali }}
                        </td>
                        <td class="column-nama-driver">
                            {{ $permohonanPemakaianKendaraan->spj->driver->nama_driver ?? '-' }}
                        </td>
                        <td class="column-status_pj">
                            {{ $permohonanPemakaianKendaraan->status_pj }}
                        </td>
                        <td class="text-center column-action" width="200">
                            @if($permohonanPemakaianKendaraan->penanggung_jawab == $user->id)
                            @if($permohonanPemakaianKendaraan->status_pj == 'Pending')
                            <a href="{{ route('approve-manager-kendaraan', [$permohonanPemakaianKendaraan->getKey()]) }}"
                                class="btn btn-success btn-sm">Approve</a>
                            <a href="{{ route('permohonankendaraan.edit', $permohonanPemakaianKendaraan->id) }}"
                                class="btn btn-info btn-sm">Edit</a>
                            <a onclick="return confirm('Apa anda yakin ingin menghapus permohonan ini?')"
                                href="{{ route('permohonankendaraan.destroy', $permohonanPemakaianKendaraan->id) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                            @elseif($permohonanPemakaianKendaraan->status_pj == 'Approved')
                            <a href="{{ route('permohonankendaraan.edit', $permohonanPemakaianKendaraan->id) }}"
                                class="btn btn-info btn-sm">Edit</a>
                            <a onclick="return confirm('Apa anda yakin ingin menghapus permohonan ini?')"
                                href="{{ route('permohonankendaraan.destroy', $permohonanPemakaianKendaraan->id) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                            @endif
                            @else
                            {{-- <a href="{{ route('permohonankendaraan.edit', $permohonanPemakaianKendaraan->id) }}"
                                class="btn btn-info btn-sm">Edit</a> --}}
                            <a onclick="return confirm('Apa anda yakin ingin menghapus permohonan ini?')"
                                href="{{ route('permohonankendaraan.destroy', $permohonanPemakaianKendaraan->id) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection