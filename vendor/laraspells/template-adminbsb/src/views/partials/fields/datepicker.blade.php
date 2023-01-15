<?php
$id         = "input-{$name}";
$value      = isset($value)? $value : null;
$label      = isset($label)? $label : null;
$required   = isset($required)? (bool) $required : false;
$value      = isset($value)? $value : null;
$left_icon  = isset($left_icon)? $left_icon : 'date_range';
$right_icon = isset($right_icon)? $right_icon : null;
$format     = isset($format)? $format : "YYYY-MM-DD";
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
    class="form-control input-datepicker"
    value="{{ $value or '' }}" 
    name="{{ $name }}" 
    id="{{ $id }}"
    {{ $required? 'required' : '' }}
  />
</div>
@endcomponent

@css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css')
@js('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js')
@js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js')
@script('init-datepicker')
<script>
  $(function() {
    $("input.input-datepicker").bootstrapMaterialDatePicker({
      format: "{{ $format }}",
      time: false
    });
  });
</script>
@endscript