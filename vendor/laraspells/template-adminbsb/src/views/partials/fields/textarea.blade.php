<?php
$id       = "input-{$name}";
$value    = isset($value)? $value : null;
$label    = isset($label)? $label : null;
$required = isset($required)? (bool) $required : false;
$value    = isset($value)? $value : null;
?>

@component('{? view_namespace ?}partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label
])
<div class="form-line">
  <textarea class="form-control" name="{{ $name }}" id="{{ $id }}" {{ $required? 'required' : '' }}>{{ $value }}</textarea>
</div>
@endcomponent