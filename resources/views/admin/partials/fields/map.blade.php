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
  height: 400px;
  width: 600px;
  magin-bottom: 15px;
}
</style>
@endstyle

@script('initialize-map-style')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSrThpCRzBbdGhfA27I6T4H-JkzEl4zk0&libraries=places"></script>
@endscript

@script
@endscript