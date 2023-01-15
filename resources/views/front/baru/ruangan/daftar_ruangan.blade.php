@extends('front.baru.master')
@section('content')
<div class="container">
    <h3 class="booking-title">Daftar Ruangan tersedia untuk {{$jumlah_peserta}} orang pada tanggal
        {{$date}}</h3>
    <form class="booking-item-dates-change mb40" action="{{url('fetchruangan')}}" method="GET">
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-lg form-group-icon-left">
                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                        <label>Tanggal Pemesanan</label>
                        <input class="form-control" type="date" name="tanggal" value="{{Request::get('tanggal')}}" required autocomplete="off" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-lg form-group-icon-left">
                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                        <label>Tanggal Selesai</label>
                        <input class="form-control" type="date" name="tanggal_selesai" value="{{Request::get('tanggal_selesai')}}" required autocomplete="off" />
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-lg form-group-icon-left">
                    <i class="fa fa-clock input-icon input-icon-highlight"></i>
                    <label>Waktu Mulai</label>
                    <input class="form-control" type="time" name="waktu_awal" value="{{Request::get('waktu_awal')}}" required autocomplete="off" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-lg form-group-icon-left">
                    <i class="fa fa-clock input-icon input-icon-highlight"></i>
                    <label>Waktu Selesai</label>
                    <input class="form-control" type="time" name="waktu_akhir" value="{{Request::get('waktu_akhir')}}" required autocomplete="off" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-lg form-group-icon-left">
                    <i class="fa fa-users input-icon input-icon-highlight"></i>
                    <label>Jumlah Peserta</label>
                    <input class="form-control" type="number" min="0" max="200" required autocomplete="off" name="jumlah_peserta" value="{{Request::get('jumlah_peserta')}}" />
                </div>
            </div>
        </div>
        </div>
        <button class="btn btn-primary btn-lg" type="submit">
            Cari Ruangan
        </button>
    </form>

    <div class="row">
        @foreach($ruangs as  $ruang)
            <div class="col-md-10 col-md-offset-1">
                <ul class="booking-list">
                    <li>
                        <form class="booking-item" method="GET" action="pemesananruangan">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="booking-item-img-wrap">
                                        <img src="{{asset($ruang->foto_ruang)}}" alt="Image Alternative text" />
                                        <div class="booking-item-img-num">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="booking-item-title">{{$ruang->nama_ruang}}</h5>
                                    <p class="booking-item-last-booked">
                                        {{$ruang->deskripsi}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <span class="booking-item-price-from">Kapasitas</span>
                                    <span class="booking-item-price">{{$ruang->kapasitas}}</span>
                                    <span>orang</span>
                                    <br>
                                    <input type="hidden" value="{{$ruang->id}}" name="id_ruang">
                                    <input type="hidden" value="{{$ruang->nama_ruang}}" name="nama_ruang">
                                    <input type="hidden" value="{{Request::get('tanggal')}}" name="tanggal">
                                    <input type="hidden" value="{{Request::get('tanggal_selesai')}}" name="tanggal_selesai">
                                    <input type="hidden" value="{{$waktu_awal}}" name="waktu_awal">
                                    <input type="hidden" value="{{$waktu_akhir}}" name="waktu_akhir">
                                    <input type="hidden" value="{{$jumlah_peserta}}" name="jumlah_peserta">
                                    <input type="submit" class="btn btn-available" value="Tersedia">
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="gap"></div>
</div>
{{-- @endif --}}
@endsection