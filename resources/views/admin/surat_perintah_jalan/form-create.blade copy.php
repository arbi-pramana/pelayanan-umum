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
setInterval(function(){ 
	$.ajax({url: "{{url('api/biayapermeter')}}", success: function(result) {
		jarak = $("[name='jarak']").val()
  	total = parseFloat(jarak) * parseInt(result.value);
    	// $("[name='total_biaya']").val(total);
  	}});
}, 1500);

// function fetchLokasiByPermohonanKendaraan (id) {
//   $.getJSON("{{ url('api/permohonankendaraan') }}?", {id: id})
//     .done(function (data) {
//       $("#input-tujuan").val(data.tujuan);
//       $("#input-tanggal_berangkat").val(data.tanggal_berangkat);
//       $("#input-tanggal_kembali").val(data.tanggal_kembali);
//       $("#input-jam_berangkat").val(data.jam_berangkat);
//       $("#input-jam_kembali").val(data.jam_kembali);
//       $("#input-penanggung_jawab").val(data.penanggung_jawab).trigger('change');
//       $("#input-latlng").val(data.latlng).trigger('fetch');
//     })
//     .fail(function () {
//       alert('Terjadi kesalahan saat mengambil data lokasi permohonan pemakaian kendaraan.');
//     });
// }

function calcRoute(){
  var originLocation = {
    "origin": {
      "query": "Pjb Up Muara Karang Pt., Pluit, North Jakarta City, Jakarta, Indonesia"
    },
    "destination": {
      "query": "Bekasi, West Java, Indonesia"
    },
    "travelMode": "DRIVING",
    "unitSystem": 0
  }

  var request = {
    origin: originLocation,
    destination: document.getElementById("input-tujuan").value,
    travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
    unitSystem: google.maps.UnitSystem.METRIC  //METRIC, IMPERIAL
  }

  directionsService.route(request, function (result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      console.log(result)
    }else {
      console.log(result)
    }
}


$(function() {
  $("#input-id_permohonan_pemakaian_kendaraan").change(function () {
    var value = $(this).val();
    fetchLokasiByPermohonanKendaraan(value);
  });

  $("#input-latlng").on('routes', function (e, data) {
    $("#input-rute").val(JSON.stringify(data.paths));
    $("#input-jarak").val((data.distance.value / 1000)*2);
    $("#input-lama_perjalanan").val(data.duration.value);
    $("#input-pengisian_bbm").val(((data.distance.value / 1000)*2 / 6).toFixed(3));
  });
});

$('#input-kendaraan_id').change(function(){
  $.ajax({
          type: "GET",
          url: "{{ url('/api/getdetailkendaraan') . '/' }}" + $("#input-kendaraan_id").val(),
          success: function(res) {
            if (res.tipe_bbm == 'bensin')
              var harga = 12500;
            else{
              var harga = 17800;
            }
            $("#input-total_hide").val(
             Math.floor($("#input-pengisian_bbm").val() * parseInt(harga))
              );
            console.log(harga);
          
                        }
                    });

});
$('#input-biaya_toll').keyup(function(){
// console.log($("#input-total_hide").val())
   $('#input-total_biaya').val(
    parseInt($("#input-total_hide").val()) + parseInt($('#input-biaya_toll').val())
    )
});
</script>
@endscript