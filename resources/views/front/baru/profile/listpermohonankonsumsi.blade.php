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
                        <th>Alasan Reject</th>
                        <th>Keterangan</th>
                        <th>Attachment</th>
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
                        <td>{{ $permohonanKonsumsi->nomor['no_pemesanan_ruangan'] ?? '' }}</td>
                        @endif
                        <td>{{ $permohonanKonsumsi->tanggal }}</td>
                        <td>{{ $permohonanKonsumsi->tanggal_selesai }}</td>
                        <td>{{ $permohonanKonsumsi->jumlah }}</td>
                        <td>{{ $permohonanKonsumsi->sumber_dana }}</td>
                        <td>{{ $permohonanKonsumsi->kegiatan }}</td>
                        <td>{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
                        <td>{{ $permohonanKonsumsi->jumlah_peserta }}</td>
                        <td>{{ $permohonanKonsumsi->status_pj }}</td>
                        <td>{{ $permohonanKonsumsi->alasan_reject }}</td>
                        <td>{{ $permohonanKonsumsi->keterangan }}</td>
                        <td>
                            <a href="{{asset('pemesanan_ruangan/attachment/'.$permohonanKonsumsi->attachment) }}" download> Click</a>
                        </td>
                        {{-- <td>{{ $permohonanKonsumsi->status_approval }}</td> --}}
                        <td>
                                @if($permohonanKonsumsi->status_pj == 'Pending')
                                <a class="btn btn-sm btn-delete btn-danger delete-button" href="#" data-id="{{$permohonanKonsumsi->id}}">Delete</a>
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
               $.get("{{url('deletelistKonsumsi')}}"+'/'+id, function(){
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