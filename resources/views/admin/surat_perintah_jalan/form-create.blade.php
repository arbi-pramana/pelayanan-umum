@extends('admin::layout.master')

@section('content')
@include('admin::partials.alert-messages')
<div class="block-header">
  <h2>Create Surat Perintah Jalan</h2>
</div>
<div class="card">
  <div class="body">
    {!! $form->render() !!}
  </div>
</div>
@stop

@script
<script>
  var myLatLng = {lat: -6.1114326, lng: 106.7821099};
  var mapOptions = {
      center: myLatLng,
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
  };
  
  //create map
  var map = new google.maps.Map(document.getElementById('map-input-latlng'), mapOptions);

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
        console.log(result)
        //remove string 
        distance = result.routes[0].legs[0].distance.text.replace(/[^0-9\.]+/g, "");
        $("#input-jarak").val(parseFloat(distance)*2)
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

  // setInterval(function(){ 
  //   $.ajax({url: "{{url('api/biayapermeter')}}", success: function(result) {
  //     console.log(result)
  //     jarak = $("[name='jarak']").val()
  //     total = parseFloat(jarak) * parseInt(result.value);
  //     $("[name='total_biaya']").val(total);
  //   }});
  // }, 5000);

  $("#input-id_permohonan_pemakaian_kendaraan").change(function () {
        $.ajax({
          url: "{{ url('api/getdatapermohonan') }}"+'/' + $("#input-id_permohonan_pemakaian_kendaraan").val(),
          success: function(data){
            var request = {
              origin: "Pjb Up Muara Karang Pt., Pluit, North Jakarta City, Jakarta, Indonesia",
              destination:data.tujuan,
              travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
              unitSystem: google.maps.UnitSystem.METRIC  //METRIC, IMPERIAL
            }

            directionsService.route(request, function (result, status) {
              if (status == google.maps.DirectionsStatus.OK) {
                console.log(result)
                //remove string 
                distance = result.routes[0].legs[0].distance.text.replace(/[^0-9\.]+/g, "");
                $("#input-jarak").val(parseFloat(distance)*2)
                $("#input-pengisian_bbm").val(((distance*2) / 6).toFixed(3));
                //display route
                directionsDisplay.setDirections(result);
              }else {
                console.log(result)
              }
            })
            $("#input-tujuan").val(data.tujuan);
            $("#input-tanggal_berangkat").val(data.tanggal_berangkat);
            $("#input-tanggal_kembali").val(data.tanggal_kembali);
            $("#input-jam_berangkat").val(data.jam_berangkat);
            $("#input-jam_kembali").val(data.jam_kembali);
          }
        });
   });

   $('#input-kendaraan_id').change(function(){
  $.ajax({
          type: "GET",
          url: "{{ url('/api/getdetailkendaraan') . '/' }}" + $("#input-kendaraan_id").val(),
          success: function(res) {
            if (res.tipe_bbm == 'bensin')
            {
              var harga = 10000;
              var harga2 = 12800;
            }
            if (res.tipe_bbm == null){
              var harga = 0;
              var harga2 = 0;

            }
            if (res.tipe_bbm == 'diesel'){
              var harga = 16150;
              var harga2 = 16750;
            }

            $("#input-total_hide").val(
             Math.floor($("#input-pengisian_bbm").val() * parseInt(harga))
              );
            $("#input-total_hide_2").val(
             Math.floor($("#input-pengisian_bbm").val() * parseInt(harga2))
              );
            console.log(harga);
          
                        }
                    });

});


  $('#input-biaya_toll').keyup(function(){
    $('#input-total_biaya').val(
      parseInt($("#input-total_hide").val()) + parseInt($('#input-biaya_toll').val())
      )
    $('#input-total_biaya_2').val(
      parseInt($("#input-total_hide_2").val()) + parseInt($('#input-biaya_toll').val())
      )
  });
    
</script>
@endscript