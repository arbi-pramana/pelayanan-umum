@extends('admin::layout.master')

@section('content')
@include('admin::partials.alert-messages')
<div class="block-header">
    <h2>Edit Driver</h2>
</div>
<div class="card">
  <div class="body">
    {!! $form->render() !!}
  </div>
</div>
@stop
