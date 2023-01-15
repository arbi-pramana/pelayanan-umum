@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Child Ruang</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::child-ruang.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::child-ruang.form-edit', [$childRuang['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $childRuang->id }}</td>
				</tr>
				<!-- Column id_parent_ruang -->
				<tr>
				  <td width="200" class="field-name"><strong>Id Ruang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $childRuang->id_parent_ruang }}</td>
				</tr>
				<!-- Column deskripsi -->
				<tr>
				  <td width="200" class="field-name"><strong>Deskripsi Ruang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $childRuang->deskripsi }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
