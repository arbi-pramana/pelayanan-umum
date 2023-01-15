@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Ruang</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::layout-ruang.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::layout-ruang.form-edit', [$ruang['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $ruang->id }}</td>
				</tr>
				<!-- Column id_ruang -->
				<tr>
				  <td width="200" class="field-name"><strong>Id Ruang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $ruang->id_ruang }}</td>
				</tr>
				<!-- Column nama_ruang -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Ruang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $ruang->nama_ruang }}</td>
				</tr>
				<!-- Column kapasitas -->
				<tr>
				  <td width="200" class="field-name"><strong>Kapasitas</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $ruang->kapasitas }}</td>
				</tr>
				<!-- Column deskripsi -->
				<tr>
				  <td width="200" class="field-name"><strong>Deskripsi</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $ruang->deskripsi }}</td>
				</tr>
				<!-- Column foto_ruang -->
				<tr>
				  <td width="200" class="field-name"><strong>Foto Ruang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $ruang->foto_ruang }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
