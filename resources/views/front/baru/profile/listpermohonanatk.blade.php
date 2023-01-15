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
    <h1 class="page-title">List Permohonan ATK</h1>
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
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-pencil"></i>
                            Permohonan ATK
                        </a>
                    </li>
                    <li>
                        <a href="{{route('list-permohonan-kendaraan')}}">
                            <i class="fa fa-map-marker"></i>
                            Permohonan Kendaraan
                        </a>
                    </li>
                    <li>
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
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Jumlah Diberikan</th>
                        <th>Bagian</th>
                        <th>Keterangan</th>
                        <th>Status Penanggung Jawab</th>
                        <th>Action</th>
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
                    @foreach($pagination->items() as $i => $permohonanAtk)
                    <tr align="center">
                        <td>{{ $pagination->firstItem() + $i }}</td>
                        @php
                        $barang = App\Models\Barang::where('id',$permohonanAtk->nama_barang)->first();
                        @endphp
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $permohonanAtk->jumlah }}</td>
                        <td>{{ $permohonanAtk->jumlah_diberikan }}</td>
                        <td>{{ $permohonanAtk->bagian }}</td>
                        <td>{{ $permohonanAtk->keterangan }}</td>
                        <td>{{ $permohonanAtk->status_pj }}</td>
                        <td>
                            @php
                            $role =
                            \DB::table('karyawan')->select('role')->where('id','=',\Auth::guard('front')->id())->first();
                            @endphp
                            <a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-atk', [$permohonanAtk->getKey()]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pagination->links() }}
        </div>
    </div>
</div>
@endsection