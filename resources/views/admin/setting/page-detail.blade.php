@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Setting</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::setting.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::setting.form-edit', [$setting['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $setting->id }}</td>
				</tr>
				<!-- Column key -->
				<tr>
				  <td width="200" class="field-name"><strong>Key</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $setting->key }}</td>
				</tr>
				<!-- Column value -->
				<tr>
				  <td width="200" class="field-name"><strong>Value</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $setting->value }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
