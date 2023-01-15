<?php
$formats = [
  'date' => [
    'format' => 'yyyy-mm-dd', 
    'icon' => 'date_range',
    'options' => [
      'placeholder' => '____-__-__'
    ]
  ],
  'time12' => [
    'format' => 'hh:mm t', 
    'icon' => 'access_time',
    'options' => [
      'placeholder' => '__:__ _m',
      'alias' => 'time12',
      'hourFormat' => '12'
    ]
  ],
  'time24' => [
    'format' => 'hh:mm', 
    'icon' => 'access_time',
    'options' => [
      'placeholder' => '__:__',
      'alias' => 'time24',
      'hourFormat' => '24'
    ]
  ],
  'ipv4' => [
    'format' => '999.999.999.999',
    'icon' => 'computer',
    'options' => [
      'placeholder' => '___.___.___.___',
    ]
  ],
  'email' => [
    'icon' => 'email',
    'options' => [
      'alias' => 'email',
    ]
  ],
];

$id         = "input-{$name}";
$value      = isset($value)? $value : null;
$label      = isset($label)? $label : null;
$required   = isset($required)? (bool) $required : false;
$value      = isset($value)? $value : null;
$left_icon  = isset($left_icon)? $left_icon : null;
$right_icon = isset($right_icon)? $right_icon : null;

if (!isset($format)) {
  throw new InvalidArgumentException("Input mask require key 'format'.");
}

if (isset($formats[$format])) {
  $options = array_get($formats, $format.'.options');
  if (!$left_icon) {
    $left_icon = array_get($formats, $format.'.icon');
  }
  $format = array_get($formats, $format.'.format');
} else {
  $options = [];
}

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
    class="form-control input-mask"
    value="{{ $value or '' }}" 
    name="{{ $name }}" 
    id="{{ $id }}"
    {{ $required? 'required' : '' }}
  />
</div>
@endcomponent

@js('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js')

{{-- 
  @script param empty, 
  because initialize parameters is dynamic for every inputs 
--}}
@script()
<script>
  $(function() {
    @if($format)
    $("#{{ $id }}").inputmask('{{ $format }}', {!! $options? json_encode($options) : '{}' !!})
    @else
    $("#{{ $id }}").inputmask({!! $options? json_encode($options) : '{}' !!})
    @endif
  });
</script>
@endscript