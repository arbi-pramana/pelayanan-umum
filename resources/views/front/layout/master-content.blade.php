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
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
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

	@styles

	<!-- Modernizr JS -->
	<script src="{{ asset('vendor/home/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
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
										<li><a href="{{url('permohonankonsumsi')}}">Form Permohonan Konsumsi</a></li>
										<li><a href="{{url('listpermohonankonsumsi')}}">List Permohonan Konsumsi</a></li>
									</ul>
								</li>
								{{-- <li class="has-dropdown">
									<a href="#">Permohonan ATK</a>
									<ul class="dropdown">
										<li><a href="{{url('permohonanatk')}}">Form Permohonan ATK</a></li>
										<li><a href="{{url('listpermohonanatk')}}">List Permohonan ATK</a></li>
									</ul>
								</li> --}}
								<li class="has-dropdown">
									<a href="#">Peminjaman Kendaraan</a>
									<ul class="dropdown">
										<li><a href="{{url('permohonankendaraan')}}">Form Peminjaman Kendaraan</a></li>
										<li><a href="{{url('listpermohonankendaraan')}}">List Peminjaman Kendaraan</a></li>
										<li><a href="{{url('listsuratperintahjalan')}}">List Surat Perintah Jalan</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="#">Akun</a>
									<ul class="dropdown">
										{{-- <li>SELAMAT DATANG {{ $pemohon["nama"] }}</li> --}}
										<li><a href="{{url('logout')}}">Sign Out</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	
	@yield('content')

	<footer id="colorlib-footer" role="contentinfo">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> PT PJB by <a href="https://ditamadigital.co.id" target="_blank">Ditamadigital</a></span>
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
	@scripts
	</body>
</html>