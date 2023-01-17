@extends('front.baru.master')
@section('content')
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap">
        <div class="col-md-8">
            <h4>Formulir Pemesanan Ruangan</h4>
            <form action="{{ route('pemesananruangan.submit') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-3">
                        <?php
                        $x=\DB::table('pemesanan_ruangan')->where('tanggal','like', '%'.date("Y-m-",strtotime($_GET['tanggal'])).'%')->count();
                        ?>
                        <label>No Pemesanan Ruangan</label>
                        <input class="form-control" name="no_pemesanan_ruangan" type="text" value="PR-{{date('Ymd')}}-{{$_GET['id_ruang'].($x+1)}}"
                            required readonly />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Pemohon</label>
                        <input class="form-control" name="pemohon" type="text" value="{{ $pemohon['nama'] }}" required
                            readonly />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Nama Acara <span style="color:red;">*</span> </label>
                        <input class="form-control" name="nama_acara" type="text" required />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Nama Pemesan <span style="color:red;">*</span> </label>
                        <input name="pemohon_id" type="hidden" value="{{\Auth::guard('front')->user()->id}}">
                        <input class="form-control" name="nama_pemesan" type="text" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Tanggal Pemesanan</label>
                        <input class="form-control" name="tanggal" type="date" value="{{$_GET['tanggal']}}" readonly
                            required />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Tanggal_selesai</label>
                        <input class="form-control" name="tanggal_selesai" type="date" value="{{$_GET['tanggal_selesai']}}" readonly
                            required />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Waktu Awal</label>
                        <input class="form-control" name="waktu_awal" type="time" value="{{Request::get('waktu_awal')}}"
                            readonly required />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Waktu Akhir</label>
                        <input class="form-control" name="waktu_akhir" type="time" value="{{Request::get('waktu_akhir')}}"
                            readonly required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Attachment</label>
                        <input class="form-control" name="attachment" type="file"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Design Ruangan</label>
                        <select class="form-control" name="design_ruangan" required>
                            @php
                                $layout = App\Models\LayoutRuang::get();
                            @endphp
                            @foreach ($layout as $item)
                            <option>{{$item->nama_layout_ruang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Tambah Konsumsi</label>
                        <select class="form-control" name="konsumsi" required>
                            <option value="Ya">Ya</option>
                            <option value="Tidak" selected>Tidak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Jumlah Peserta</label>
                        <input class="form-control" name="jumlah_peserta" type="number" readonly value="{{Request::get('jumlah_peserta')}}"
                            required />
                    </div>
                </div>
                {{-- <div class="row">
                @php
                    $manager = App\Models\Karyawan::where('id', $pemohon->id_manajer)->first();
                    $supervisor = App\Models\Karyawan::where('id', $pemohon->id_supervisor)->first();
                @endphp
                    <div class="form-group col-md-6">
                        <label>Supervisor</label>
                        @if(!empty($supervisor->nama))
                        <input class="form-control" type="text" value="{{$supervisor->nama}}" readonly required />
                        @else
                        <input type="text" class="form-control" value="-" readonly="" required>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label>Manager</label>
                        @if(!empty($supervisor->nama))
                        <input class="form-control" type="text" value="{{$manager->nama}}" readonly required />
                        @else
                        <input type="text" class="form-control" value="-" readonly="" required>
                        @endif
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="form-group col-md-12">
                        <label>Sub-Ruang</label>
                        @php
                        $checksub = App\Models\ChildRuang::where('id_parent_ruang', $_GET['id_ruang']);
                        $count = $checksub->count();
                        $fetch = $checksub->get();
                        @endphp
                        @if($count > 0)
                        @foreach($fetch as $i => $subruang)
                        <input type="checkbox" value="{{$subruang->id}}" name="subruang[]" id="{{$i}}" onclick="test(this)">
                        {{$subruang->nama_subruang}} - {{$subruang->kapasitas}} pax&nbsp;&nbsp;
                        @endforeach
                        @else
                        <input type="checkbox" disabled id="0"> Tidak ada sub ruang
                        @endif
                    </div>
                </div> --}}
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <input type="hidden" name="id_ruang" class="form-control" value="{{$_GET['id_ruang']}}" readonly="">
                <input type="hidden" name="nama_ruang" class="form-control" value="{{$_GET['nama_ruang']}}" readonly="">
                <div class="text-right">
                    <input class="btn btn-primary" type="submit" value="Kirim Permintaan" />
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="booking-item-payment">
                <header class="clearfix">
                    <a class="booking-item-payment-img" href="#">
                        <img src="{{asset($ruang->foto_ruang)}}" alt="Image Alternative text" />
                    </a>
                    <h5 class="booking-item-payment-title"><a>{{$ruang->nama_ruang}}</a></h5>
                </header>
                <ul class="booking-item-payment-details">
                    <li>
                        @php
                        $diff = date_diff(date_create(Request::get('waktu_awal')),
                        date_create(Request::get('waktu_akhir')));
                        @endphp
                        <h5>Booking untuk {{$diff->h}}.{{$diff->i}} jam.</h5>
                        <div class="booking-item-payment-date">
                            <p class="booking-item-payment-date-day">{{Request::get('waktu_awal')}}</p>
                        </div>
                        <i class="fa fa-arrow-right booking-item-payment-date-separator"></i>
                        <div class="booking-item-payment-date">
                            <p class="booking-item-payment-date-day">{{Request::get('waktu_akhir')}}</p>
                        </div>
                    </li>
                    <li>
                        <h5>Jumlah Peserta</h5>
                        <p class="booking-item-payment-item-title">{{$_GET['jumlah_peserta']}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection