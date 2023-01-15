@php
$solid_color = isset($solid_color) ? (bool) $solid_color : false;
$color = isset($color) ? $color : null;
$hover_effect = isset($hover_effect) ? $hover_effect : '';
$classes = isset($classes) ? $classes : [];

$icon_color = isset($icon_color) ? $icon_color : null;
$right_icon = isset($right_icon) ? (bool) $right_icon : false;
$icon_classes = isset($icon_classes) ? $icon_classes : '';
$label_classes = isset($label_classes) ? $label_classes : '';

if (is_string($classes)) $classes = explode(' ', $classes);
if ($color) $classes[] = "bg-{$color}";
if ($hover_effect) $classes[] = "hover-{$hover_effect}-effect";

$infobox_class = $right_icon ? 'info-box-3' : ($solid_color ? 'info-box-2' : 'info-box');
@endphp

<div class="{{ $infobox_class }} {{ implode(' ', $classes) }}">
  <div class="icon {{ $icon_classes }}">
    <i class="material-icons {{ $icon_color ? "col-{$icon_color}" : "" }}">{{ $icon }}</i>
  </div>
  <div class="content">
    <div class="text {{ $label_classes }}">{{ $label }}</div>
    <div class="number count-to"
      data-from="0" 
      data-to="{{ $count }}" 
      data-speed="{{ $speed or 1000 }}" 
      data-fresh-interval="{{ $interval or 20 }}">
      {{ $count }}
    </div>
  </div>
</div>