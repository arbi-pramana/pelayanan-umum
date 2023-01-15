@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Child Ruang</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::child-ruang.form-create') }}">Create</a>
			</div>
			<div class="col-md-3 no-margin">
				<form method="GET">
					<div class="form-group" style="margin:0px">
						<div class="input-group" style="margin:0px">
							<div class="form-line">
								<input name="keyword" class="form-control" placeholder="Search something ..." value="{{ request('keyword') }}"/>
							</div>
							<div class="input-group-btn">
								<button class="btn btn-info">Search</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="body">
		@if($pagination->items())
		<div class="table-responsive">
		  <table id="table-child_ruang" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-id_parent_ruang'>Id Ruang</th>
		        <th class='column-kapasitas'>Kapasitas</th>
		        <th class='column-deskripsi'>Nama Ruang</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @if(!$pagination->count())
		      <tr>
		        <td colspan="4" class="text-center">
		          Records empty.
		        </td>
		      </tr>
		      @endif
		      @foreach($pagination->items() as $i => $childRuang)
		      <tr>
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-id_parent_ruang'>{{ $childRuang->id_parent_ruang }}</td>
		        <td class='column-kapasitas'>{{ $childRuang->kapasitas }}</td>
		        <td class='column-nama_subruang'>{{ $childRuang->nama_subruang }}</td>
		        <td width="200" class="text-center column-action">
		          <a class="btn btn-sm btn-edit btn-default" href="{{ route('admin::child-ruang.page-detail', [$childRuang->getKey()]) }}">Show</a>
		          <a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::child-ruang.form-edit', [$childRuang->getKey()]) }}">Edit</a>
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::child-ruang.delete', [$childRuang->getKey()]) }}">Delete</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
		{!! $pagination->links() !!}
		@else
		<div class="well well-sm">
			Child Ruang empty
		</div>
		@endif
	</div>
</div>
@stop
