<?php
$id         = "input-{$name}";
$value      = isset($value)? $value : null;
$label      = isset($label)? $label : null;
$required   = isset($required)? (bool) $required : false;
$value      = isset($value)? $value : null;
$left_icon  = isset($left_icon)? $left_icon : null;
$right_icon = isset($right_icon)? $right_icon : null;
?>

@component('{? view_namespace ?}partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label,
  'left_icon' => $left_icon,
  'right_icon' => $right_icon,
])
<div class="form-line">
  <input 
    type="text" 
    class="form-control input-tags"
    value="{{ $value or '' }}" 
    name="{{ $name }}" 
    id="{{ $id }}"
    data-role="tagsinput"
    {{ $required? 'required' : '' }}
  />
</div>
@endcomponent

@css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css')
@js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js')