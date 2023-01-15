@extends('front.baru.master')
@section('content')
<div class="top-area show-onload">
    <div class="bg-holder full">
        <div class="bg-front full-height bg-front-mob-rel">
            <div class="container full-height" style="margin-top: -100px;" >
                <div class="rel full-height">
                    <div class="search-tabs search-tabs-bg search-tabs-bottom mb50" >
                        <div class="tabbable" >
                            <ul class="nav nav-tabs" id="myTab" >
                                <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-building-o"></i>
                                        <span>Ruangan</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-1">
                                    <h2>Cek Ketersediaan Ruangan</h2>
                                    <form action="{{url('fetchruangan')}}" method="GET">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                    <label>Tanggal Pemesanan</label>
                                                    <input class="form-control" type="date" name="tanggal" required
                                                        autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-clock input-icon input-icon-highlight"></i>
                                                    <label>Waktu Mulai</label>
                                                    <input class="form-control" type="time" name="waktu_awal" required
                                                        autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-clock input-icon input-icon-highlight"></i>
                                                    <label>Waktu Selesai</label>
                                                    <input class="form-control" type="time" name="waktu_akhir" required
                                                        autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-users input-icon input-icon-highlight"></i>
                                                    <label>Jumlah Peserta</label>
                                                    <input class="form-control" type="number" min="0" required autocomplete="off" name="jumlah_peserta" />
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-lg" type="submit">
                                            Cari Ruangan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-slider owl-carousel-area visible-lg" id="owl-carousel-slider" data-nav="false">
            <div class="bg-holder full">
                <div class="bg-mask"></div>
                <div class="bg-img"
                    style="background-image:url({{asset('vendor/frontend')}}/img/196_365_2048x1365.jpg);"></div>
            </div>
            <div class="bg-holder full">
                <div class="bg-mask"></div>
                <div class="bg-img"
                    style="background-image:url({{asset('vendor/frontend')}}/img/el_inevitable_paso_del_tiempo_2048x2048.jpg);">
                </div>
            </div>
            <div class="bg-holder full">
                <div class="bg-mask"></div>
                <div class="bg-img"
                    style="background-image:url({{asset('vendor/frontend')}}/img/viva_las_vegas_2048x1365.jpg);"></div>
            </div>
        </div>
        <div class="bg-img hidden-lg"
            style="background-image:url({{asset('vendor/frontend')}}/img/196_365_2048x1365.jpg);"></div>
        <div class="bg-mask hidden-lg"></div>
    </div>
    <div class="gap"></div>
</div>
<div class="container">
    <div class="gap"></div>
    <h1 class="text-center mb20">Ruangan Kami</h1>
    <div class="row row-wrap">
        @php
        $ruang = App\Models\Ruang::get();
        @endphp
        @foreach($ruang as $i => $ruangan)
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header">
                    <a class="hover-img" href="#">
                        <img src="{{asset($ruangan->foto_ruang)}}" alt="Image Alternative text"
                            title="{{$ruangan->nama_ruang}}" />
                    </a>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">{{$ruangan->nama_ruang}}</a></h5>
                    <p class="mb0"><small>{{$ruangan->deskripsi}}</small>
                    </p>
                    <p class="mb0 text-darken"><span
                            class="text-lg lh1em text-color">{{$ruangan->kapasitas}}</span><small> orang/ruangan</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="gap gap-small"></div>
</div>
@endsection