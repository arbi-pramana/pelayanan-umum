@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Ruang</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::ruang.form-create') }}">Create</a>
			</div>
			<div class="col-md-3 no-margin">
				{{-- <form method="GET">
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
				</form> --}}
			</div>
		</div>
	</div>
	<div class="body">
		<div class="table-responsive">
		  <table id="my-table" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-nama_ruang'>Nama Ruang</th>
		        <th class='column-kapasitas'>Kapasitas</th>
		        <th class='column-foto_ruang'>Foto Ruang</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($pagination as $i => $ruang)
		      <tr>
		        <td class="text-center column-number">{{ $loop->iteration }}</td>
		        <td class='column-nama_ruang'>{{ $ruang->nama_ruang }}</td>
		        <td class='column-kapasitas'>{{ $ruang->kapasitas }}</td>
		        <td class='column-foto_background'><a href="../{{ $ruang->foto_ruang }}" target="_blank">{{ $ruang->foto_ruang }}</a>
		        <td width="200" class="text-center column-action">
		          <a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::ruang.form-edit', [$ruang->getKey()]) }}">Edit</a>
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::ruang.delete', [$ruang->getKey()]) }}">Delete</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
	</div>
</div>
@stop
