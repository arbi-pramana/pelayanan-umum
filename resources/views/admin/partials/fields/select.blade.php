<?php
$id           = "input-{$name}";
$value        = isset($value)? $value : null;
$label        = isset($label)? $label : ucwords(snake_case(camel_case($name), ' '));
$required     = isset($required)? (bool) $required : false;
$value        = isset($value)? $value : null;
$empty_option = isset($empty_option)? $empty_option : "-- Pick {$label} --";
$left_icon    = isset($left_icon)? $left_icon : null;
$right_icon   = isset($right_icon)? $right_icon : null;
?>

@css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.css')
@js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js')

@component('admin::partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label,
  'left_icon' => $left_icon,
  'right_icon' => $right_icon,
])
  <select
    class="form-control show-tick"
    name="{{ $name }}" 
    id="{{ $id }}"
    {{ $required? 'required' : '' }}>
    @if($empty_option)
    <option value="">{{ $empty_option }}</option>  
    @endif
    @foreach($options as $option)
    <option value="{{ $option['value'] }}" {{ $value == $option['value']? 'selected' : '' }}>{{ $option['label'] }}</option>
    @endforeach
  </select>
@endcomponent