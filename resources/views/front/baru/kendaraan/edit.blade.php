@extends('front.baru.master')
@section('content')
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap">
        <div class="col-md-12">
            <h4>Formulir Permohonan Kendaraan</h4>    
            <form action="{{ route('permohonankendaraan.update', [$permohonan->id]) }}" class="colorlib-form" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tujuan">
                                Tujuan
                            </label>
                            <div class="form-field">
                                <input class="form-control" name="tujuan" id="input-tujuan" value="{{ $permohonan->tujuan }}" placeholder="Masukkan Tujuan" type="text"/>
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
                                        <input class="form-control" name="pemohon" value="{{ $permohonan->pemohon }}" readonly="" type="text" value="{{ $pemohon['nama'] }}"/>
                                        <input class="form-control" name="pemohon_id"type="hidden" value="{{ $pemohon['id'] }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keperluan">
                                        Keperluan
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control" id="keperluan" name="keperluan" value="{{ $permohonan->keperluan }}" placeholder="Masukkan keperluan" type="text">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="penanggung_jawab">
                                        Penanggung Jawab
                                    </label>
                                    <label for="penanggung_jawab">
                                        Nama Pemesan <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input type="text" class="form-control" name="penanggung_jawab" value="{{ $permohonan->penanggung_jawab }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Tanggal Berangkat
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control input-date/" id="tanggal_berangkat" name="tanggal_berangkat" value="{{ $permohonan->tanggal_berangkat }}" placeholder="Tanggal Berangkat" type="date">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_kembali">
                                        Tanggal Kembali
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control input-date/" id="tanggal_kembali" name="tanggal_kembali" value="{{ $permohonan->tanggal_kembali }}" placeholder="Tanggal Berangkat" type="date">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Jam Berangkat
                                    </label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input class="form-control time" id="jam_berangkat" name="jam_berangkat" value="{{ $permohonan->jam_berangkat }}" placeholder="Jam Berangkat" type="time">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_kembali">
                                        Jam Kembali
                                    </label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input class="form-control time" id="jam_kembali" name="jam_kembali" value="{{ $permohonan->jam_kembali }}" placeholder="Jam Kembali" type="time">
                                        </input>
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
                                        <input class="form-control" name="keterangan" value="{{ $permohonan->keterangan }}" placeholder="Masukkan Keterangan" type="text"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input style="margin-top: 25px;" class="btn btn-primary btn-block" id="submit" name="submit" type="submit" value="Simpan">
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

  $(document).ready(function(){
      var request = {
        origin: "Pjb Up Muara Karang Pt., Pluit, North Jakarta City, Jakarta, Indonesia",
        destination: "{{$permohonan->tujuan}}",
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
@endsection