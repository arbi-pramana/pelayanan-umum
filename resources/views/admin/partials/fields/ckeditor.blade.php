<?php
$id       = "input-{$name}";
$value    = isset($value)? $value : null;
$label    = isset($label)? $label : null;
$required = isset($required)? (bool) $required : false;
$value    = isset($value)? $value : null;
?>

@component('admin::partials.fields.base', [
  'name' => $name,
  'required' => $required,
  'label' => $label
])
<div class="form-line">
  <textarea class="form-control textarea-ckeditor" name="{{ $name }}" id="{{ $id }}" {{ $required? 'required' : '' }}>{{ $value }}</textarea>
</div>
@endcomponent

@js('//cdn.ckeditor.com/4.7.1/standard/ckeditor.js')
@script('ckeditor-init')
<script>
  $(function() {
    $('.textarea-ckeditor').each(function() {
      CKEDITOR.replace(this);
    });
  });
</script>
@endscript
