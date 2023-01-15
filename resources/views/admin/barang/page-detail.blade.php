@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Barang</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::barang.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::barang.form-edit', [$barang['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $barang->id }}</td>
				</tr>
				<!-- Column nama_barang -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Barang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $barang->nama_barang }}</td>
				</tr>
				<!-- Column id_kategori -->
				<tr>
				  <td width="200" class="field-name"><strong>Id Kategori</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $barang->id_kategori }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
