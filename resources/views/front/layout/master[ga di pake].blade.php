<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Form Request PJB</title>

    <!-- Bootstrap core CSS -->
      <link href="{{ asset('vendor/bootstrap3/css/bootstrap.min.css') }}" rel="stylesheet">


    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/images/icons/favicon.ico') }}" rel="icon" type="image/png">
    <!--===============================================================================================-->
      <!--<link href="{{ asset('vendor/formbootstrap3/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> -->
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link  href="{{ asset('vendor/formbootstrap3/fonts/iconic/css/material-design-iconic-font.min.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/vendor/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/vendor/animsition/css/animsition.min.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/vendor/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/vendor/noui/nouislider.min.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
      <link href="{{ asset('vendor/formbootstrap3/css/util.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('vendor/formbootstrap3/css/main.css') }}" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Aplikasi Form Request</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pemesanan Ruangan
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="pemesananruangan">Pemesanan Ruangan</a></li>
              <li><a href="listpeminjamanruang">List Peminjaman Ruang</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Permohonan Konsumsi
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="permohonankonsumsi">Permohonan Konsumsi</a></li>
              <li><a href="listpermohonankonsumsi">List Permohonan Konsumsi</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Permohonan ATK
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="permohonanatk">Permohonan ATK</a></li>
              <li><a href="listpermohonanatk">List Permohonan ATK</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Permohonan Kendaraan
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="permohonankendaraan">Permohonan Kendaraan</a></li>
              <li><a href="listpermohonankendaraan">List Permohonan Kendaraan</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Surat Perintah Jalan
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="suratperintahjalan">Surat Perintah Jalan</a></li>
              <li><a href="listsuratperintahjalan">List Surat Perintah Jalan</a></li>
            </ul>
          </li>
          <li><a href="/logout"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
      </div>
    </nav>

    @yield('content')

  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <!--===============================================================================================-->
    <script srcc="{{ asset('vendor/formbootstrap3/vendor/animsition/js/animsition.min.js') }}"></script>
  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/formbootstrap3/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/vendor/select2/select2.min.js') }}"></script>
    <script>
      $(".js-select2").each(function(){
        $(this).select2({
          minimumResultsForSearch: 20,
          dropdownParent: $(this).next('.dropDownSelect2')
        });


        $(".js-select2").each(function(){
          $(this).on('select2:close', function (e){
            if($(this).val() == "Please chooses") {
              $('.js-show-service').slideUp();
            }
            else {
              $('.js-show-service').slideUp();
              $('.js-show-service').slideDown();
            }
          });
        });
      })
    </script>
  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/formbootstrap3/vendor/daterangepicker/daterangepicker.js') }}"></script>
  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/vendor/countdowntime/countdowntime.js') }}"></script>
  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/vendor/noui/nouislider.min.js') }}"></script>
    <script>
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [ 1500, 3900 ],
            connect: true,
            range: {
                'min': 1500,
                'max': 7500
            }
        });

        var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function( values, handle ) {
            skipValues[handle].innerHTML = Math.round(values[handle]);
            $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
            $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
        });
    </script>
  <!--===============================================================================================-->
    <script src="{{ asset('vendor/formbootstrap3/js/main.js') }}"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('vendor/bootstrap3/js/bootstrap.min.js') }}"></script>

  </body>
</html>
