<?php
$id         = "input-{$name}";
$value      = isset($value)? $value : null;
$label      = isset($label)? $label : null;
$required   = isset($required)? (bool) $required : false;
$readonly   = isset($readonly)? (bool) $readonly : false;
$value      = isset($value)? $value : null;
$left_icon  = isset($left_icon)? $left_icon : null;
$right_icon = isset($right_icon)? $right_icon : null;
?>

<input type="hidden" value="{{ $value or '' }}" name="{{ $name }}" id="{{ $id }}"/>
