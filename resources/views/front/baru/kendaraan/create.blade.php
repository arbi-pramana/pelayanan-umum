@extends('front.baru.master')
@section('content')
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap">
        <div class="col-md-12">
            <h4>Formulir Permohonan Kendaraan</h4>    
            <form action="{{ route('permohonankendaraan.submit') }}" class="colorlib-form" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tujuan">
                                Tujuan <span style="color:red;">*</span>
                            </label>
                            <div class="form-field">
                                <textarea name="tujuan" id="input-tujuan" cols="30" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div id="googleMap" style="width:100%;height:300px;"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pemohon">
                                        Pemohon
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control" name="pemohon" readonly="" type="text" value="{{ $pemohon['nama'] }}"/>
                                        <input class="form-control" name="pemohon_id"type="hidden" value="{{ $pemohon['id'] }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keperluan">
                                        Keperluan <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control" id="keperluan" name="keperluan" placeholder="Masukkan keperluan" type="text" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="penanggung_jawab">
                                        Nama Pemesan <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input type="text" class="form-control" name="penanggung_jawab" required>
                                        {{-- <select class="form-control" name="penanggung_jawab">
                                            <option>
                                                Please chooses
                                            </option>
                                            @foreach($array_pj_kendaraan as $manajer)
                                            <option style="color: black" value='{{ $manajer["id"] }}'>
                                                {{ $manajer["nama"] }}
                                            </option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Tanggal<span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control input-date" id="tanggal_berangkat" name="range_date" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_kembali">
                                        Tanggal Kembali <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control input-date/" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Berangkat" type="date" required>
                                        </input>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Jam Berangkat <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input class="form-control time-awal" id="jam_berangkat" name="jam_berangkat" placeholder="Jam Berangkat" type="time" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_kembali">
                                        Jam Kembali <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input class="form-control time-akhir" id="jam_kembali" name="jam_kembali" placeholder="Jam Kembali" type="time" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Driver<span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <select name="driver_kendaraan" id="driver_kendaraan" class="form-control driver_kendaraan" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="keterangan">
                                        Keterangan
                                    </label>
                                    <div class="form-field">
                                        <textarea name="keterangan" class="form-control" cols="30" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input style="margin-top: 25px;" class="btn btn-primary btn-block" id="submit" name="submit" type="submit" value="Submit">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
  var myLatLng = {lat: -6.1114326, lng: 106.7821099};
  var mapOptions = {
      center: myLatLng,
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
  };
  
  //create map
  var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

  //create a DirectionsRenderer object which we will use to display the route
  var directionsDisplay = new google.maps.DirectionsRenderer();

  //bind the DirectionsRenderer to the map
  directionsDisplay.setMap(map);

  //create a DirectionsService object to use the route method and get a result for our request
  var directionsService = new google.maps.DirectionsService();

  $("#input-tujuan").change(function(){
    var request = {
      origin: "Pjb Up Muara Karang Pt., Pluit, North Jakarta City, Jakarta, Indonesia",
      destination: document.getElementById("input-tujuan").value,
      travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
      unitSystem: google.maps.UnitSystem.METRIC  //METRIC, IMPERIAL
    }

    directionsService.route(request, function (result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        //display route
        directionsDisplay.setDirections(result);
      }else {
        console.log(result)
      }
    })
  })

  var mapOptions = {}
  var input2 = document.getElementById("input-tujuan");
  new google.maps.places.Autocomplete(input2, mapOptions);
</script>
<script>
    function changeFunc(value) {
        $.ajax({
            url: "{{url('api/permohonankonsumsi/')}}?id=" + value,

            success: function (result) {
                console.log(result);
                $("[name='kegiatan']").val(result.nama_acara);
                $("[name='tanggal']").val(result.tanggal);
                $("[name='jam']").val(result.waktu_awal);
                $("[name='jumlah_peserta']").val(result.jumlah_peserta);
                $("[name='ruang']").val(result.nama_ruang);
                $("[name='jenis_konsumsi']").val(result.makanan);
            }
        });
    }
</script>
<script>
     $('.input-date').on('change', function(){
        $("#driver_kendaraan").empty();
        var tanggal = $(this).val();
        var awal = $('.time-awal').val();
        var akhir = $('.time-akhir').val();

            $.ajax({
                    type: "GET",
                    url: "{{ url('/getdriver') . '/' }}" + tanggal +'/'+awal+'/' + akhir,
                    success: function(res) {
                        res.drivers.forEach(element => {
                            $('#driver_kendaraan').append("<option value="+element.id+">"+element.nama_driver+"</option>")
                        });
                    }
                });
            })
     $('.time-awal').on('change', function(){
        $("#driver_kendaraan").empty();
        var tanggal = $('.input-date').val();
        var awal = $(this).val();
        var akhir = $('.time-akhir').val();

            $.ajax({
                    type: "GET",
                    url: "{{ url('/getdriver') . '/' }}" + tanggal +'/'+awal+'/' + akhir,
                    success: function(res) {
                        res.drivers.forEach(element => {
                            $('#driver_kendaraan').append("<option value="+element.id+">"+element.nama_driver+"</option>")
                        });
                    }
                });
            })
     $('.time-akhir').on('change', function(){
        $("#driver_kendaraan").empty();
        var tanggal = $('.input-date').val();
        var awal = $('.time-awal').val();
        var akhir = $(this).val();

            $.ajax({
                    type: "GET",
                    url: "{{ url('/getdriver') . '/' }}" + tanggal +'/'+awal+'/' + akhir,
                    success: function(res) {
                        res.drivers.forEach(element => {
                            $('#driver_kendaraan').append("<option value="+element.id+">"+element.nama_driver+"</option>")
                        });
                    }
                });
            })

</script>
@endsection