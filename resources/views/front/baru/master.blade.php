<!DOCTYPE HTML>
<html>

<head>
    <title>PT. PJB</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('vendor/frontend')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('vendor/frontend')}}/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('vendor/frontend')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('vendor/frontend')}}/css/styles.css">
    <link rel="stylesheet" href="{{asset('vendor/frontend')}}/css/mystyles.css">
    <link rel="stylesheet" href="{{asset('vendor/frontend')}}/css/switcher.css" />
    @styles()

    <link rel="icon" href="{{asset('vendor/home')}}/images/pjb.png">

    <script src="{{asset('vendor/frontend')}}/js/modernizr.js"></script>
</head>

<body>

    <div class="global-wrap">
        <header id="main-header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="logo" href="index.html">
                                <img src="{{asset('vendor/home')}}/images/pjb.png" alt="Image Alternative text" title="Aplikasi PJB"
                                    style="width:30%;" />
                            </a>
                        </div>
                        <div class="col-md-offset-5 col-md-4">
                            <div class="top-user-area clearfix">
                                <ul class="top-user-area-list list list-horizontal list-border">
                                    <li class="top-user-area-avatar">
                                        <a href="{{route('profile.index')}}">
                                            @php
                                            $user = App\Models\Karyawan::where('id',
                                            auth()->guard('front')->id())->first();
                                            @endphp
                                            <img class="origin round" src="{{asset('vendor/frontend')}}/img/amaze_40x40.jpg"
                                                alt="Image Alternative text" title="Amaze" />Hi, {{$user->nama}}
                                        </a>
                                    </li>
                                    <li><a href="{{route('logout')}}">Keluar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav">
                <ul class="slimmenu" id="slimmenu">
                    <li><a href="{{url('/')}}">Beranda</a></li>
                    <li><a href="{{route('pemesananruangan')}}">Pemesanan Ruangan</a></li>
                    <li><a href="{{route('permohonankonsumsi')}}">Permohonan Konsumsi</a></li>
                    {{-- <li><a href="{{route('permohonanatk')}}">Permohonan ATK</a></li> --}}
                    <li><a href="{{route('permohonankendaraan')}}">Peminjaman Kendaraan</a></li>
                </ul>
            </div>
        </header>

        @yield('content')

        <footer id="main-footer">
            <div class="container">
                <div class="row row-wrap">
                    <div class="center">
                        <p class="text-center">{{date('Y')}} - Aplikasi Pelayanan Umum PT. PJB. By Ditamadigital</p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="{{asset('vendor/frontend')}}/js/jquery.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/bootstrap.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/slimmenu.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/bootstrap-datepicker.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/bootstrap-timepicker.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/nicescroll.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/dropit.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/ionrangeslider.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/icheck.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/fotorama.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/typeahead.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/card-payment.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/magnific.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/owl-carousel.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/fitvids.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/tweet.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/countdown.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/gridrotator.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/custom.js"></script>
        <script src="{{asset('vendor/frontend')}}/js/switcher.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSrThpCRzBbdGhfA27I6T4H-JkzEl4zk0&libraries=places"></script>
        @yield('script')
        @scripts()
    </div>
</body>

</html>