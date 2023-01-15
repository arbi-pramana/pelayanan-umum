@extends('admin::layout.master')

@section('content')
@include('admin::partials.alert-messages')
<div class="block-header">
    <h2>Edit Surat Perintah Jalan</h2>
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

  $(document).ready(function(){
    var request = {
      origin: "Pjb Up Muara Karang Pt., Pluit, North Jakarta City, Jakarta, Indonesia",
      destination: "{{$form->model->tujuan}}",
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

  setInterval(function(){ 
    $.ajax({url: "{{url('api/biayapermeter')}}", success: function(result) {
      console.log(result)
      jarak = $("[name='jarak']").val()
      total = parseFloat(jarak) * parseInt(result.value);
      $("[name='total_biaya']").val(total);
    }});
  }, 5000);
</script>
</script>
@endscript