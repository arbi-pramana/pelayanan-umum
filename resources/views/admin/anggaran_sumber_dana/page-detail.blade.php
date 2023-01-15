@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Anggaran Sumber Dana</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::anggaran-sumber-dana.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::anggaran-sumber-dana.form-edit', [$anggaranSumberDana['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $anggaranSumberDana->id }}</td>
				</tr>
				<!-- Column id_sumber_dana -->
				<tr>
				  <td width="200" class="field-name"><strong>Id Sumber Dana</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $anggaranSumberDana->id_sumber_dana }}</td>
				</tr>
				<!-- Column anggaran -->
				<tr>
				  <td width="200" class="field-name"><strong>Anggaran</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $anggaranSumberDana->anggaran }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
