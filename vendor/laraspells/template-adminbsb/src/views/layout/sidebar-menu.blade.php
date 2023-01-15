<div class="menu">
  <ul class="list">
    <li class="header">MAIN NAVIGATION</li>
    @foreach(config('{? config_key ?}.menu') as $menu)
      @include('{? view_namespace ?}layout.sidebar-menu-item', ['menu' => $menu])
    @endforeach
  </ul>
</div>