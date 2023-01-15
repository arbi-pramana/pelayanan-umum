@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Kategori Barang</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::kategori-barang.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::kategori-barang.form-edit', [$kategoriBarang['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $kategoriBarang->id }}</td>
				</tr>
				<!-- Column nama_kategori_barang -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Kategori Barang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $kategoriBarang->nama_kategori_barang }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
