@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Karyawan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::karyawan.form-create') }}">Create</a>
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
		        <th class='column-nama'>Nama</th>
		        <th class='column-nid'>Nomor Induk</th>
		        <th class='column-password'>Password</th>
{{-- 		        <th class='column-id_atasan'>ID Atasan</th>
		        <th class='column-id_supervisor'>ID Supervisor</th>
		        <th class='column-id_manajer'>ID Manajer</th> --}}
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($pagination as $i => $karyawan)
		      <tr>
		        <td class="text-center column-number">{{ $loop->iteration }}</td>
		        <td class='column-nama'>{{ $karyawan->nama }}</td>
		        <td class='column-nid'>{{ $karyawan->no_induk }}</td>
		        <td class='column-password'>{{ $karyawan->password }}</td>
		        {{-- <td class='column-id_atasan'>{{ $karyawan->id_atasan }}</td>
		        <td class='column-id_supervisor'>{{ $karyawan->id_supervisor }}</td>
		        <td class='column-id_manajer'>{{ $karyawan->id_manajer }}</td> --}}
		        <td width="200" class="text-center column-action">
		          <a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::karyawan.form-edit', [$karyawan->getKey()]) }}">Edit</a>
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::karyawan.delete', [$karyawan->getKey()]) }}">Delete</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
	</div>
</div>
@stop
