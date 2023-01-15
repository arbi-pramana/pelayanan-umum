<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT. PJB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/home/css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ asset('vendor/home/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('vendor/home/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('vendor/home/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><img src="{{ asset('vendor/home/images/pjb.png') }}" height="150px"></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li class="active"><a href="/">Home</a></li>
                                <li class="has-dropdown">
                                    <a href="#">Pemesanan Ruang</a>
                                    <ul class="dropdown">
                                        <li><a href="{{url('listpeminjamanruang')}}">List Permohonan Ruang</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">Permohonan Konsumsi</a>
                                    <ul class="dropdown">
                                        <li><a href="permohonankonsumsi">Form Permohonan Konsumsi</a></li>
                                        <li><a href="listpeminjamanruang">List Permohonan Konsumsi</a></li>
                                    </ul>
                                </li>
                                {{-- <li class="has-dropdown">
                                    <a href="#">Permohonan ATK</a>
                                    <ul class="dropdown">
                                        <li><a href="permohonanatk">Form Permohonan ATK</a></li>
                                        <li><a href="listpermohonanatk">List Permohonan ATK</a></li>
                                    </ul>
                                </li> --}}
                                <li class="has-dropdown">
                                    <a href="#">Peminjaman Kendaraan</a>
                                    <ul class="dropdown">
                                        <li><a href="permohonankendaraan">Form Peminjaman Kendaraan</a></li>
                                        <li><a href="listpermohonankendaraan">List Pemeinjaman Kendaraan</a></li>
                                        <li><a href="listsuratperintahjalan">List Surat Perintah Jalan</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">Akun</a>
                                    <ul class="dropdown">
                                        {{--
                                        <li>SELAMAT DATANG {{ $pemohon["nama"] }}</li> --}}
                                        <li><a href="/logout">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url({{ asset('vendor/home/images/img_bg_1.jpg') }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        {{--
                                        <h2>2 Days Tour</h2>
                                        <h1>Amazing Maldives Tour</h1> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url({{ asset('vendor/home/images/img_bg_2.jpg') }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        {{--
                                        <h2>10 Days Cruises</h2>
                                        <h1>From Greece to Spain</h1> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url({{ asset('vendor/home/images/img_bg_5.jpg') }});">
                        <div class="overlay"></div>
                        <div class="container-fluids">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        {{--
                                        <h2>Explore our most tavel agency</h2>
                                        <h1>Our Travel Agency</h1> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url({{ asset('vendor/home/images/img_bg_4.jpg') }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        {{--
                                        <h2>Experience the</h2>
                                        <h1>Best Trip Ever</h1> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <div id="colorlib-reservation">
            <!-- <div class="container"> -->
            <div class="row">
                <div class="search-wrap">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> Ruangan</a></li>
                            {{--
                            <li><a data-toggle="tab" href="#konsumsi"><i class="flaticon-cocktail"></i> Konsumsi</a></li>
                            <li><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> Hotel</a></li>
                            <li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> Car Rent</a></li>
                            <li><a data-toggle="tab" href="#cruises"><i class="flaticon-boat"></i> Cruises</a></li> --}}
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="hotel" class="tab-pane fade in active">
                            <form method="get" class="colorlib-form" action="{{url('fetchruangan')}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="booknow">
                                            <h3 style="color: #FFF;">Cek Ketersediaannya</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" align="center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Tanggal Pemesanan</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" name="date" id="date" class="form-control date" placeholder="Tanggal Pemesanan" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="time">Waktu Mulai</label>
                                        <div class="form-group">
                                            <input type="time" name="waktu_awal" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="time">Waktu Selesai</label>
                                        <div class="form-group">
                                            <input type="time" name="waktu_akhir" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="guests">Jumlah Peserta</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" placeholder="Jumlah Peserta" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" name="submit" id="submit" value="Cari" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{--
                        <div id="konsumsi" class="tab-pane fade">
                            <form method="post" class="colorlib-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Where:</label>
                                            <div class="form-field">
                                                <input type="text" id="location" class="form-control" placeholder="Search Location">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date">Check-in:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date">Check-out:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="guests">Guest</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="people" id="people" class="form-control">
                                                    <option value="#">1</option>
                                                    <option value="#">2</option>
                                                    <option value="#">3</option>
                                                    <option value="#">4</option>
                                                    <option value="#">5+</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" name="submit" id="submit" value="Find Flights" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div id="car" class="tab-pane fade">
                            <form method="post" class="colorlib-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Where:</label>
                                            <div class="form-field">
                                                <input type="text" id="location" class="form-control" placeholder="Search Location">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Start Date:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Return Date:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" name="submit" id="submit" value="Find Car" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="cruises" class="tab-pane fade">
                            <form method="post" class="colorlib-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Where:</label>
                                            <div class="form-field">
                                                <input type="text" id="location" class="form-control" placeholder="Search Location">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Start Date:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="guests">Categories</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="#">Suite</option>
                                                    <option value="#">Super Deluxe</option>
                                                    <option value="#">Balcony</option>
                                                    <option value="#">Economy</option>
                                                    <option value="#">Luxury</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" name="submit" id="submit" value="Find Cruises" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
    <footer id="colorlib-footer" role="contentinfo">
        {{--
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <h4>Tour Agency</h4>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                    <p>
                        <ul class="colorlib-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Book Now</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">Flight</a></li>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Tour</a></li>
                            <li><a href="#">Car Rent</a></li>
                            <li><a href="#">Beach &amp; Resorts</a></li>
                            <li><a href="#">Cruises</a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Top Deals</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">Edina Hotel</a></li>
                            <li><a href="#">Quality Suites</a></li>
                            <li><a href="#">The Hotel Zephyr</a></li>
                            <li><a href="#">Da Vinci Villa</a></li>
                            <li><a href="#">Hotel Epikk</a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-2">
                    <h4>Blog Post</h4>
                    <ul class="colorlib-footer-links">
                        <li><a href="#">The Ultimate Packing List For Female Travelers</a></li>
                        <li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>
                        <li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-md-push-1">
                    <h4>Contact Information</h4>
                    <ul class="colorlib-footer-links">
                        <li>291 South 21th Street,
                            <br> Suite 721 New York NY 10016</li>
                        <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
                        <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                        <li><a href="#">yoursite.com</a></li>
                    </ul>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> PT PJB by <a href="https://ditamadigital.co.id" target="_blank">Ditamadigital</a></span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/home/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('vendor/home/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/home/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('vendor/home/js/jquery.waypoints.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('vendor/home/js/jquery.flexslider-min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('vendor/home/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('vendor/home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendor/home/js/magnific-popup-options.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('vendor/home/js/bootstrap-datepicker.j') }}s"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('vendor/home/js/jquery.stellar.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('vendor/home/js/main.js') }}"></script>

</body>

</html>