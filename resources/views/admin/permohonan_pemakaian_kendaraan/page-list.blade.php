
@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Permohonan Pemakaian Kendaraan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::permohonan-pemakaian-kendaraan.form-create') }}">Create</a>
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
		  <table id="table-permohonan_pemakaian_kendaraan" class="table table-bordered">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-pemohon'>Pemohon</th>
		        <th class='column-tujuan'>Tujuan</th>
		        <th class='column-keperluan'>Keperluan</th>
		        <th class='column-tanggal_berangkat'>Tanggal Berangkat</th>
		        <th class='column-tanggal_kembali'>Tanggal Kembali</th>
		        <th class='column-jam_berangkat'>Jam Berangkat</th>
		        <th class='column-jam_kembali'>Jam Kembali</th>
		        <th class='column-penanggung_jawab'>Status</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @if(!$pagination->count())
		      <tr>
		        <td colspan="11" class="text-center">
		          Records empty.
		        </td>
		      </tr>
		      @endif
		      @foreach($pagination->items() as $i => $permohonanPemakaianKendaraan)
			  @if ($permohonanPemakaianKendaraan->status_pj == 'Approved')
			  	<tr style="background-color: #9ED2C6;color:black;">
			  @elseif($permohonanPemakaianKendaraan->status_pj == 'Rejected')
				<tr style="background-color: #FF8AAE;color:black;">
			  @else
			  <tr>
			  @endif
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-pemohon'>{{ $permohonanPemakaianKendaraan->pemohon }}</td>
		        <td class='column-tujuan'>{{ $permohonanPemakaianKendaraan->tujuan }}</td>
		        <td class='column-keperluan'>{{ $permohonanPemakaianKendaraan->keperluan }}</td>
		        <td class='column-tanggal_berangkat'>{{ $permohonanPemakaianKendaraan->tanggal_berangkat }}</td>
		        <td class='column-tanggal_kembali'>{{ $permohonanPemakaianKendaraan->tanggal_kembali }}</td>
		        <td class='column-jam_berangkat'>{{ $permohonanPemakaianKendaraan->jam_berangkat }}</td>
		        <td class='column-jam_kembali'>{{ $permohonanPemakaianKendaraan->jam_kembali }}</td>
		        <td class='column-penanggung_jawab'>{{ $permohonanPemakaianKendaraan->status_pj }}</td>
		        <td width="200" class="text-center column-action">
					{{-- @if (now() <= $permohonanPemakaianKendaraan->tanggal_berangkat) --}}
						@if (Auth::user()->role == 'adminkendaraan')
							@if($permohonanPemakaianKendaraan->status_pj == 'Pending')
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::permohonan-pemakaian-kendaraan.approve', [$permohonanPemakaianKendaraan->getKey()]) }}">Approve</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::permohonan-pemakaian-kendaraan.reject', [$permohonanPemakaianKendaraan->getKey()]) }}">Reject</a>
							@endif

						@else
							@if($permohonanPemakaianKendaraan->status_pj == 'Pending')
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::permohonan-pemakaian-kendaraan.approve', [$permohonanPemakaianKendaraan->getKey()]) }}">Approve</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::permohonan-pemakaian-kendaraan.reject', [$permohonanPemakaianKendaraan->getKey()]) }}">Reject</a>
								<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-pemakaian-kendaraan.form-edit', [$permohonanPemakaianKendaraan->getKey()]) }}">Edit</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::permohonan-pemakaian-kendaraan.delete', [$permohonanPemakaianKendaraan->getKey()]) }}">Delete</a>
							@endif
							@if($permohonanPemakaianKendaraan->status_pj == 'Approved' || $permohonanPemakaianKendaraan->status_pj == 'Rejected')
								<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-pemakaian-kendaraan.form-edit', [$permohonanPemakaianKendaraan->getKey()]) }}">Edit</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::permohonan-pemakaian-kendaraan.delete', [$permohonanPemakaianKendaraan->getKey()]) }}">Delete</a>
							@endif
						@endif
					{{-- @endif --}}
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
		{!! $pagination->links() !!}
		@else
		<div class="well well-sm">
			Permohonan Pemakaian Kendaraan empty
		</div>
		@endif
	</div>
</div>
@stop
