@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Test</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::test.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::test.form-edit', [$test['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $test->id }}</td>
				</tr>
				<!-- Column nama -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $test->nama }}</td>
				</tr>
				<!-- Column field1 -->
				<tr>
				  <td width="200" class="field-name"><strong>Field 1</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $test->field1 }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
