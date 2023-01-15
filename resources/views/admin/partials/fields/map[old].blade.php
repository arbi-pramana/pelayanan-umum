<?php
$id         = "input-{$name}";
$value      = isset($value)? $value : null;
$label      = isset($label)? $label : null;
$required   = isset($required)? (bool) $required : false;
$value      = isset($value)? $value : null;
$left_icon  = isset($left_icon)? $left_icon : null;
$right_icon = isset($right_icon)? $right_icon : null;
$col        = isset($col)? $col : 'col-md-4';
?>

@component('admin::partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label,
])
<div class="row map-input">
  <div class="{{ $col }}">
    <div class="map" id="map-{{ $id }}"></div>
    <div class="form-line">
      <input 
        type="text" 
        class="form-control"
        value="{{ $value or '' }}" 
        name="{{ $name }}" 
        id="{{ $id }}"
        {{ $required? 'required' : '' }}
      />
    </div>
  </div>
</div>
@endcomponent

@style('initialize-map-style')
<style>
.map-input .map {
  height: 300px;
  width: 100%;
  magin-bottom: 15px;
}
</style>
@endstyle

@script('initialize-map-style')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSrThpCRzBbdGhfA27I6T4H-JkzEl4zk0&libraries=places"></script>
@endscript

@script
<script>
(function () {
  var baseCoordinate = {lat: -6.1114326, lng: 106.7821099}
  var map = new google.maps.Map(document.getElementById('map-{{ $id }}'), {
    center: baseCoordinate,
    zoom: 13
  });

  var markerBase = new google.maps.Marker({position: baseCoordinate, map: map});
  var markerTujuan = null;
  var directionPaths = null;
  var $input = $("#{{ $id }}");
  
  map.addListener('click', function(e) {
    setMarkerTujuan(e.latLng, true);
  });

  map.setRoutes = function (routes) {
    drawDirectionPaths(routes);
    var last = routes[routes.length - 1];
    setMarkerTujuan(last);
  };

  $input.data('map', map);
  $input.trigger('initMap', map);
  $input.on('fetch', function () {
    var latlng = $(this).val();
    var split = latlng.split(',');
    setMarkerTujuan({lat: parseFloat(split[0]), lng: parseFloat(split[1])}, true)
  });

  $(function () {
    if ($input.val()) {
      $input.trigger('fetch');
    }
  });

  // FUNCTIONS
  // ------------------------------------------------------------------------------

  function setMarkerTujuan (position, update) {
    if (markerTujuan) {
      markerTujuan.setPosition(position)
    } else {
      markerTujuan = new google.maps.Marker({position: position, map: map});
    }

    if (update) {
      var tujuan = markerTujuan.getPosition().lat()+','+markerTujuan.getPosition().lng();
      $input.val(tujuan);

      fetchRoutes(markerBase, markerTujuan);
    }
  }

  function getPaths (steps) {
    return [baseCoordinate].concat(steps.map(function(step) {
      return step.end_location;
    }));
  }

  function drawDirectionPaths (path) {
    if (directionPaths) {
      directionPaths.setPath(path);
    } else {
      directionPaths = new google.maps.Polyline({
        path: path,
        geodesic: true,
        strokeColor: '#002CFF',
        strokeOpacity: 1.0,
        strokeWeight: 3
      });
      directionPaths.setMap(map);
    }
  }

  function fetchRoutes (from, to) {
    var url = '{{ url('api/directions') }}?' + $.param({
      from: from.getPosition().lat()+','+from.getPosition().lng(),
      to: to.getPosition().lat()+','+to.getPosition().lng(),
    });

    fetch(url).then(res => res.json()).then(function (res) {
      var routes = res.routes;
      var leg = routes[0] && routes[0].legs && routes[0].legs[0] ? routes[0].legs[0] : null;
      var steps = leg ? leg.steps : null;
      var distance = leg ? leg.distance : null;
      var duration = leg ? leg.duration : null;

      // Draw steps
      if (steps) {
        drawDirectionPaths(getPaths(steps));
      }

      // Trigger route
      $input.trigger('routes', {
        steps: steps,
        paths: getPaths(steps),
        distance: distance,
        duration: duration,
        raw: res,
      });
    });
  }
})()
</script>
@endscript