<?php
$id       = "input-{$name}";
$value    = isset($value)? $value : null;
$label    = isset($label)? $label : null;
$required = isset($required)? (bool) $required : false;
$value    = isset($value)? $value : [];
$inline   = isset($inline)? (bool) $inline : true;
?>

@component('admin::partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label
])
<div class="checkbox-group {{ $inline? 'checkbox-group-inline' : '' }}">
  @foreach($options as $i => $option)
  <div class="checkbox">
    <input id="cb-{{ $id }}-{{ $i }}" name="{{ $name }}[]" type='checkbox' value="{{ $option['value'] }}" {{ in_array($option['value'], $value)? 'checked' : '' }}>
    <label for="cb-{{ $id }}-{{ $i }}">{{ $option['label'] }}</label>
  </div>
  @endforeach
</div>
@endcomponent