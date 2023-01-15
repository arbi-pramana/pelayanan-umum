@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Permohonan Atk</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::permohonan-atk.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::permohonan-atk.form-edit', [$permohonanAtk['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->id }}</td>
				</tr>
				<!-- Column jumlah -->
				<tr>
				  <td width="200" class="field-name"><strong>Jumlah</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->jumlah }}</td>
				</tr>
				<!-- Column nama_barang -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Barang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->nama_barang }}</td>
				</tr>
				<!-- Column jumlah_diberikan -->
				<tr>
				  <td width="200" class="field-name"><strong>Jumlah Diberikan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->jumlah_diberikan }}</td>
				</tr>
				<!-- Column keterangan -->
				<tr>
				  <td width="200" class="field-name"><strong>Keterangan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->keterangan }}</td>
				</tr>
				<!-- Column pemohon -->
				<tr>
				  <td width="200" class="field-name"><strong>Pemohon</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->pemohon }}</td>
				</tr>
				<!-- Column bagian -->
				<tr>
				  <td width="200" class="field-name"><strong>Bagian</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->bagian }}</td>
				</tr>
				<!-- Column penanggung_jawab -->
				<tr>
				  <td width="200" class="field-name"><strong>Penanggung Jawab</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanAtk->penanggung_jawab }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
