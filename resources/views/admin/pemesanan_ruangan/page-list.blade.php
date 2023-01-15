@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Pemesanan Ruangan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::pemesanan-ruangan.form-create') }}">Create</a>
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
		  <table id="table-pemesanan_ruangan" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-no_pemesanan_ruangan'>No Pemesanan Ruangan</th>
		        <th class='column-tanggal'>Tanggal</th>
		        <th class='column-nama_acara'>Nama Acara</th>
		        <th class='column-pemohon'>Nama Pemohon</th>
		        <th class='column-waktu'>Waktu Awal</th>
		        <th class='column-waktu'>Waktu Akhir</th>
		        <th class='column-jumlah_peserta'>Jumlah Peserta</th>
		        <th class='column-id_ruang'>Ruang</th>
		        {{-- <th class='column-status-supervisor'>Status Spv</th>
		        <th class='column-status-manajer'>Status Manajer</th> --}}
		        <th class='column-status-penanggung_jawab'>Status Penanggung Jawab</th>
		        <th class='column-file_attachment'>File Attachment</th>
		        <th class='column-keterangan'>Keterangan</th>
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
		      @foreach($pagination->items() as $i => $pemesananRuangan)
				@if ($pemesananRuangan->status_pj == 'Approved')
				<tr style="background-color: #9ED2C6;color:black;">
				@elseif($pemesananRuangan->status_pj == 'Rejected')
				<tr style="background-color: #FF8AAE;color:black;">
				@else
				<tr>
				@endif
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-no_pemesanan_ruangan'>{{ $pemesananRuangan->no_pemesanan_ruangan }}</td>
		        <td class='column-tanggal'>{{ $pemesananRuangan->tanggal }}</td>
		        <td class='column-nama_acara'>{{ $pemesananRuangan->nama_acara }}</td>
		        <td class='column-pemohon'>{{ $pemesananRuangan->pemohon }}</td>
		        <td class='column-waktu_awal'>{{ date('H:i',$pemesananRuangan->waktu_awal) }}</td>
		        <td class='column-waktu_akhir'>{{ date('H:i',$pemesananRuangan->waktu_akhir) }}</td>
		        <td class='column-jumlah_peserta'>{{ $pemesananRuangan->jumlah_peserta }}</td>
		        <td class='column-id_ruang'>{{ $pemesananRuangan->ruang['nama_ruang'] }}</td>
		        {{-- <td class='column-status_supervisor'>{{ $pemesananRuangan->status_supervisor }}</td>
		        <td class='column-status_manajer'>{{ $pemesananRuangan->status_manajer }}</td> --}}
		        <td class='column-status_penanggung_jawab'>{{ $pemesananRuangan->status_pj }}</td>
		        <td class='column-file_attachment'>
		          <a target="_blank" href="{{asset('pemesanan_ruangan/attachment/'.$pemesananRuangan->attachment) }}" download>click</a>
		        </td>
		        <td class='column-keterangan'>{{ $pemesananRuangan->keterangan }}</td>
		        <td width="200" class="text-center column-action">
					{{-- @if (now() <= $pemesananRuangan->tanggal) --}}
						@if (Auth::user()->role == 'adminruang')
							@if($pemesananRuangan->status_pj != 'Approved')
							<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::pemesanan-ruangan.approve', [$pemesananRuangan->getKey()]) }}">Approve</a>
							<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::pemesanan-ruangan.reject', [$pemesananRuangan->getKey()]) }}">Reject</a>
							@endif
						@else
							@if($pemesananRuangan->status_pj != 'Approved')
							<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::pemesanan-ruangan.approve', [$pemesananRuangan->getKey()]) }}">Approve</a>
							<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::pemesanan-ruangan.reject', [$pemesananRuangan->getKey()]) }}">Reject</a>
							<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::pemesanan-ruangan.form-edit', [$pemesananRuangan->getKey()]) }}">Edit</a>
							<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::pemesanan-ruangan.delete', [$pemesananRuangan->getKey()]) }}">Delete</a>
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
			Pemesanan Ruangan empty
		</div>
		@endif
	</div>
</div>
@stop
