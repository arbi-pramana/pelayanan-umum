@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Driver</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::driver.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::driver.form-edit', [$driver['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $driver->id }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Nama driver</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $driver->nama_driver }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Email</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $driver->email }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
