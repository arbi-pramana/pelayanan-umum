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
                        <th>Design Ruangan</th>
                        {{-- <td>Status Spv</td>
                        <td>Status Manajer</td> --}}
                        <td>Status Permohonan</td>
                        <td>Alasan Reject</td>
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
                        <td>{{ $pemesananRuangan->design_ruangan }}</td>
                        {{-- <td>{{ $pemesananRuangan->status_supervisor }}</td>
                        <td>{{ $pemesananRuangan->status_manajer }}</td> --}}
                        <td>{{ $pemesananRuangan->status_pj }}</td>
                        <td>{{ $pemesananRuangan->alasan_reject }}</td>
                        <td>
                            @if ($pemesananRuangan->attachment == null)
                                <span> - </span>
                            @else
                                <a href="{{asset('pemesanan_ruangan/attachment/'.$pemesananRuangan->attachment) }}" download>
                                    Click
                                </a>
                            @endif
                        </td>
                        <td>{{ $pemesananRuangan->keterangan }}</td>
                        <td class="row" width="300">
                                @if($pemesananRuangan->status_pj == 'Pending')
                                    <a class="btn btn-sm btn-delete btn-danger delete-button" href="#" data-id="{{$pemesananRuangan->id}}">Delete</a>
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
@section('script')
<script>
    $('.delete-button').on('click', function(e){
       var form = this;
       var id = $(this).attr("data-id")
       e.preventDefault();
       swal({
           title: "Apakah ingin menghapus data ? ",
           icon: "warning",
           buttons: true,
           dangerMode: true,
           })
           .then((willDelete) => {
           if (willDelete) {
               $.get("{{url('deletelistRuang')}}"+'/'+id, function(){
                   swal(
                       'Terhapus!',
                       'Data berhasil terhapus !',
                       'success'
                   ).then(()=>{
                       location.reload()
                   })
               });
           }
           });
   }); 
</script>

@endsection