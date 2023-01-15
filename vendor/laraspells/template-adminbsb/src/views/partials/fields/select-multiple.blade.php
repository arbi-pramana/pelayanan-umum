<?php
$id           = "input-{$name}";
$value        = isset($value)? $value : null;
$label        = isset($label)? $label : ucwords(snake_case(camel_case($name), ' '));
$required     = isset($required)? (bool) $required : false;
$value        = isset($value)? $value : [];
$empty_option = isset($empty_option)? $empty_option : "-- Pick {$label} --";
?>

@css('vendor/admin-bsb/plugins/bootstrap-select/css/bootstrap-select.css')
@js('vendor/admin-bsb/plugins/bootstrap-select/js/bootstrap-select.js')

@component('{? view_namespace ?}partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label
])
  <select multiple 
    class="form-control show-tick"
    name="{{ $name }}[]" 
    id="{{ $id }}"
    {{ $required? 'required' : '' }}>
    @if($empty_option)
    <option value="">{{ $empty_option }}</option>  
    @endif
    @foreach($options as $option)
    <option value="{{ $option['value'] }}" {{ in_array($option['value'], $value)? 'selected' : '' }}>{{ $option['label'] }}</option>
    @endforeach
  </select>
@endcomponent