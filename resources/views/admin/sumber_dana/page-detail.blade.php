@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Sumber Dana</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::sumber-dana.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::sumber-dana.form-edit', [$sumberDana['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $sumberDana->id }}</td>
				</tr>
				<!-- Column nama_sumber_dana -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Sumber Dana</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $sumberDana->nama_sumber_dana }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
