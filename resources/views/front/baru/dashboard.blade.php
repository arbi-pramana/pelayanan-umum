@extends('front.baru.master')
@section('content')
<style>
    .img-dashboard{
        width: 100px;
        height: 100px;
        margin-left: 50px;
    }
    .headline{
        margin-top:100px;
        font-weight: 100;
    }
    .baris{
        display: flex;
        justify-content: center;
        align-self: center;
        gap: 25px;
        margin-top:-50px;
    }
    .ruangan-box{
        color:white;
        background-color: #d4d2d2;
        border-radius: 5px;
        opacity: 60%;
        padding-top: 50px;
        padding-bottom: 50px;
        /* margin-right: 10px; */
    }
    .kendaraan-box{
        color:white;
        background-color: #d4d2d2;
        opacity: 60%;
        border-radius: 5px;
      /* margin-left:5px; */
      /* margin-right:10px; */
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .konsumsi-box{
        color:white;
        background-color: #d4d2d2;
        border-radius: 5px;
        opacity: 60%;
      /* margin-left: 10px; */
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .ruangan-box:hover{
        opacity: 100%;
    }
    .kendaraan-box:hover{
        opacity: 100%;
    }
    .konsumsi-box:hover{
        opacity: 100%;
    }
    .item-ruangan{
        /* display :flex; */
        margin-left: 50px;
        justify-content: center;
    }
    .item-kendaraan{
        /* display :flex; */
        margin-left: 50px;
        justify-content: center;
    }
    .item-konsumsi{
        /* display :flex; */
        margin-left: 50px;
        justify-content: center;
    }
</style>
<div class="top-area show-onload" >
    <div class="bg-holder full">
        <div class="bg-front full-height bg-front-mob-rel">
            <div class="container full-height">
                <div class="rel full-height">
                    <div class="headline">
                        <span style="color:white;font-size:40px;">Selamat Datang Di <b>Aplikasi Pelayanan Umum UPMKR</b>, <br><br> Silahkan Pilih Pelayanan Dibawah Ini  : </span>
                    </div>
                    <div class="search-tabs search-tabs-bg search-tabs-bottom mb25" >
                        <div class="tabbable">
                            <div class="">
                                <div class="tab-pane fade in active" id="tab-1" style="margin-top:-450px;">
                                  <div class=" baris">
                                      <a href="{{route('pemesananruangan')}}" class="col-md-4 dashboard-item ruangan-box">
                                        <div class="item-ruangan">
                                            <img src="{{asset('logo/condominium.png')}}" alt="" class="img-dashboard">
                                            <br>
                                            <h4 style="color: black;margin-top:10px;">Permohonan Ruangan</h4>
                                        </div>
                                     </a>
                                      <a href="{{route('permohonankendaraan')}}" class="col-md-4 dashboard-item kendaraan-box">
                                        <div class="item-kendaraan">
                                            <img src="{{asset('logo/electric-car.png')}}" alt="" class="img-dashboard">
                                            <h4 style="color: black; margin-top:10px;">Peminjaman Kendaraan</h4>
                                        </div>
                                     </a>
                                      <a href="{{route('permohonankonsumsi')}}" class="col-md-4 dashboard-item konsumsi-box">
                                        <div class="item-konsumsi">
                                            <img src="{{asset('logo/juice.png')}}" alt="" class="img-dashboard">
                                            <h4 style="color: black;margin-top:10px;">Pemesanan Konsumsi</h4>
                                        </div>
                                     </a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-slider owl-carousel-area visible-lg" id="owl-carousel-slider" data-nav="false" >
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
@endsection