<?php
$id         = "input-{$name}";
$value      = isset($value)? $value : null;
$label      = isset($label)? $label : null;
$required   = isset($required)? (bool) $required : false;
$value      = isset($value)? $value : null;
$left_icon  = isset($left_icon)? $left_icon : null;
$right_icon = isset($right_icon)? $right_icon : null;
?>

@component('admin::partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label,
  'left_icon' => $left_icon,
  'right_icon' => $right_icon,
])
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
@endcomponent
