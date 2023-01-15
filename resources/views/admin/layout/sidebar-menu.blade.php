<div class="menu">
  <ul class="list">
    <li class="header">MAIN NAVIGATION</li>
    @if (Auth::user()->role == 'superadmin')
      @foreach(config('superadmin.menu') as $menu)
        @include('admin::layout.sidebar-menu-item', ['menu' => $menu])
      @endforeach
    @endif
    @if (Auth::user()->role == 'adminruang')
      @foreach(config('adminruang.menu') as $menu)
        @include('admin::layout.sidebar-menu-item', ['menu' => $menu])
      @endforeach
    @endif
    @if (Auth::user()->role == 'adminkendaraan')
      @foreach(config('adminkendaraan.menu') as $menu)
        @include('admin::layout.sidebar-menu-item', ['menu' => $menu])
      @endforeach
    @endif

  </ul>
</div>