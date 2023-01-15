@extends('front.layout.master-content')

@section('content')

<div id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});"
 data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
				<h2>List Surat Perintah Jalan</h2>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="tab-content" id="colorlib-reservation">
		<div class="header">
			<div class="row">
				<div class="col-md-9 no-margin">
					{{-- <a class="btn btn-success" href="{{ route('admin::pemesanan-ruangan.form-create') }}">Create</a> --}}
				</div>
				<div class="col-md-3 no-margin">
					<form method="GET">
						<div class="form-group" style="margin:0px">
							<div class="input-group" style="margin:0px">
								<div class="form-line">
									<input name="keyword" class="form-control" placeholder="Search something ..." value="{{ request('keyword') }}" />
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
		<br>
		<div class="body">
			@if($pagination->items())
			<div class="table-responsive">
				<table id="table-permohonan_konsumsi" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th width="20" class="text-center column-number">No</th>
							<th class='column-nama_pengemudi'>Nama Pengemudi</th>
							<th class='column-tujuan'>Tujuan</th>
							<th class='column-jarak'>Jarak</th>
							<th class='column-tanggal_berangkat'>Tanggal Berangkat</th>
							<th class='column-tanggal_kembali'>Tanggal Kembali</th>
							<th class='column-jam_berangkat'>Jam Berangkat</th>
							<th class='column-jam_kembali'>Jam Kembali</th>
							<th class='column-pengisian_bbm'>Pengisian BBM</th>
							<th class='column-penanggung_jawab'>Penanggung Jawab</th>
							<th class='column-status_pj'>Status Penanggung Jawab</th>
							<th class='column-penanggung_jawab_pool'>Penanggung Jawab Pool</th>
							<th class='column-status_pj_pool'>Status Penanggung Jawab Pool</th>
							<?php $role = \DB::table('karyawan')->select('role')->where('id','=',\Auth::guard('front')->id())->first(); ?>
							@if($role == null)
							<th class="text-center column-action">Action</th>
							@endif
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
						@foreach($pagination->items() as $i => $suratPerintahJalan)
						<tr>
							<td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
							<td class='column-nama_pengemudi'>{{ $suratPerintahJalan->nama_pengemudi_x }}</td>
							<td class='column-tujuan'>{{ $suratPerintahJalan->tujuan }}</td>
							<td class='column-jarak'>{{ $suratPerintahJalan->jarak }}</td>
							<td class='column-tanggal_berangkat'>{{ $suratPerintahJalan->tanggal_berangkat }}</td>
							<td class='column-tanggal_kembali'>{{ $suratPerintahJalan->tanggal_kembali }}</td>
							<td class='column-jam_berangkat'>{{ $suratPerintahJalan->jam_berangkat }}</td>
							<td class='column-jam_kembali'>{{ $suratPerintahJalan->jam_kembali }}</td>
							<td class='column-pengisian_bbm'>{{ $suratPerintahJalan->pengisian_bbm }}</td>
							<td class='column-penanggung_jawab'>{{ $suratPerintahJalan->penanggung_jawab }}</td>
							<td class='column-status_pj'>{{ $suratPerintahJalan->status_pj }}</td>
							<td class='column-penanggung_jawab_pool'>{{ $suratPerintahJalan->penanggung_jawab_pool }}</td>
							<td class='column-status_pj_pool'>{{ $suratPerintahJalan->status_pj_pool }}</td>

							@if($role=="Manajer")
							<td width="200" class="text-center column-action">
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('approve-manager-surat-perintah-jalan', [$suratPerintahJalan->getKey()]) }}">Approve
									Manager</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-surat-perintah-jalan', [$suratPerintahJalan->getKey()]) }}">Delete</a>
								@elseif($role=="Supervisor")
							<td width="200" class="text-center column-action">
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('approve-manager-surat-perintah-jalan', [$suratPerintahJalan->getKey()]) }}">Approve
									Supervisor</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-surat-perintah-jalan', [$suratPerintahJalan->getKey()]) }}">Delete</a>
								@elseif($role=="Penanggung Jawab Pool")
							<td width="200" class="text-center column-action">
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('approve-penanggung-jawab-pool', [$suratPerintahJalan->getKey()]) }}">Approve
									PJ Pool</a>
								<a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-surat-perintah-jalan', [$suratPerintahJalan->getKey()]) }}">Delete</a>
								@endif
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{!! $pagination->links() !!}
			@else
			<div class="well well-sm">
				Pemesanan Ruangan empty
			</div>
			@endif
		</div>
	</div>

</div><!-- /.container -->
@stop