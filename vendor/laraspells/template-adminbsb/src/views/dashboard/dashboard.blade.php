@extends('{? view_namespace ?}layout.master')

@section('content')
  @include('{? view_namespace ?}partials.alert-messages')
  
  <div class="block-header">
      <h2>Dashboard</h2>
  </div>
  
  <div class="row">
    <div class="col-md-3">
      @include('{? view_namespace ?}partials.infobox', [
        'icon' => 'home',
        'count' => 50,
        'label' => 'Count Data',
        'hover_effect' => 'zoom',
        'icon_classes' => 'bg-blue',
      ])
    </div>
    <div class="col-md-3">
      @include('{? view_namespace ?}partials.infobox', [
        'icon' => 'home',
        'count' => 50,
        'label' => 'Count Data',
        'color' => 'blue',
        'hover_effect' => 'expand',
      ])
    </div>
    <div class="col-md-3">
      @include('{? view_namespace ?}partials.infobox', [
        'icon' => 'home',
        'count' => 50,
        'label' => 'Count Data',
        'color' => 'blue',
        'hover_effect' => 'expand',
        'right_icon' => true,
        'solid_color' => true,
      ])
    </div>
    <div class="col-md-3">
      @include('{? view_namespace ?}partials.infobox', [
        'icon' => 'home',
        'count' => 50,
        'label' => 'Count Data',
        'hover_effect' => 'zoom',
        'right_icon' => true,
        'icon_color' => 'blue'
      ])
    </div>
  </div>

  @component('{? view_namespace ?}partials.card', [
    'title' => 'Dashboard',
    'description' => 'This is default dashboard page.'
  ])
    @slot('header_dropdown')
    <ul class="header-dropdown m-r--5">
      <li class="dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
          <i class="material-icons">more_vert</i>
        </a>
        <ul class="dropdown-menu pull-right">
          <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
          <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
          <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
        </ul>
      </li>
    </ul>
    @endslot

    <table class="table table-striped table-bordered no-margin">
      <tr>
        <td width="120">Route Name</td>
        <td width="10" class="text-center">:</td>
        <td><code>{? schema.route.name ?}dashboard</code></td>
      </tr>
      <tr>
        <td width="120">Controller</td>
        <td width="10" class="text-center">:</td>
        <td><code>{? schema.controller.path ?}/DashboardController.php</code></td>
      </tr>
      <tr>
        <td width="120">View</td>
        <td width="10" class="text-center">:</td>
        <td><code>{? schema.view.path ?}/dashboard/dashboard.blade.php</code></td>
      </tr>
    </table>
  @endcomponent

@stop