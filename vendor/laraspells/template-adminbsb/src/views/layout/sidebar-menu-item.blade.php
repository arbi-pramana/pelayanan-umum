@php
$route = array_get($menu, 'route');
$icon = array_get($menu, 'icon');
$label = array_get($menu, 'label');
$childs = array_get($menu, 'childs');
@endphp

@if(is_array($childs))
<li>
  <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
    @if($icon)
    <i class="material-icons">{{ $icon }}</i>
    @endif
    <span>{{ $label }}</span>
  </a>
  <ul class="ml-menu">
  @foreach($childs as $childmenu)
    @include('{? view_namespace ?}layout.sidebar-menu-item', ['menu' => $childmenu])
  @endforeach
  </ul>
</li>
@else
<li class="{{ ($route && Request::route()->getName() == $route)? 'active' : '' }}">
  <a href="{{ $route ? route($route) : 'javascript:void(0)' }}">
    @if($icon)
    <i class="material-icons">{{ $icon }}</i>
    @endif
    <span>{{ $label }}</span>
  </a>
</li>
@endif