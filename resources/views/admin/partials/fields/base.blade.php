<?php
$id = "form-{$name}";
$input_id = "input-{$name}";
$label = isset($label)? $label : ucwords(snake_case(camel_case($name), ' '));
$required = isset($required)? (bool) $required : false;
$error_message = $errors->first($name);
$left_icon = isset($left_icon)? $left_icon : null;
$right_icon = isset($right_icon)? $right_icon : null;
?>

<div id="{{ $id }}" class="form-group {{ $error_message? 'has-error' : '' }}">
  <label for="{{ $id }}">
    {{ $label }}
    @if($required)
    <strong class="text-danger">*</strong>
    @endif
  </label>
  {{-- Help Block --}}
  @if(isset($help))
  <div class="help-block"><small>{{ $help }}</small></div>
  @endif
  @if($left_icon OR $right_icon)
  <div class="input-group">
    @if($left_icon)
    <span class="input-group-addon">
      <i class="material-icons">{{ $left_icon }}</i>
    </span>
    @endif
    {!! $slot !!}
    @if($right_icon)
    <span class="input-group-addon">
      <i class="material-icons">{{ $right_icon }}</i>
    </span>
    @endif
  </div>
  @else
  {!! $slot !!}
  @endif

  {{-- Validation Error --}}
  @if($error_message)
  <div class="help-block validation-error">{{ $error_message }}</div>
  @endif

</div>
