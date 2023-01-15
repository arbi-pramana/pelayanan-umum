@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Kendaraan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::kendaraan.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::kendaraan.form-edit', [$kendaraan['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $kendaraan->id }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Nama Kendaraan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $kendaraan->nama_kendaraan }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Tipe BBM</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $kendaraan->tipe_bbm }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Nomor Polisi</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $kendaraan->no_pol }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
