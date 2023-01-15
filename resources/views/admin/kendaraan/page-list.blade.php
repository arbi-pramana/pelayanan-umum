@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Kendaraan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::kendaraan.form-create') }}">Create</a>
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
		  <table id="table-karyawan" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-nama'>Nama Kendaraan</th>
		        <th class='column-no_induk'>Tipe BBM</th>
		        <th class='column-nid'>Nomor Polisi</th>
		        <th class='column-nid'>Status Kendaraan</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @if(!$pagination->count())
		      <tr>
		        <td colspan="17" class="text-center">
		          Records empty.
		        </td>
		      </tr>
		      @endif
		      @foreach($pagination->items() as $i => $kendaraan)
		      <tr>
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-nama'>{{ $kendaraan->nama_kendaraan }}</td>
		        <td class='column-no_induk'>{{ $kendaraan->tipe_bbm }}</td>
		        <td class='column-nid'>{{ $kendaraan->no_pol }}</td>
		        <td class='column-nid'>{{ $kendaraan->status_kendaraan }}</td>
		        <td width="200" class="text-center column-action">
		          <a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::kendaraan.form-edit', [$kendaraan->getKey()]) }}">Edit</a>
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::kendaraan.delete', [$kendaraan->getKey()]) }}">Delete</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
		{!! $pagination->links() !!}
		@else
		<div class="well well-sm">
			Kendaraan empty
		</div>
		@endif
	</div>
</div>
@stop
