@extends('front.layout.master-content')

@section('content')	

			<div id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
							<h2>List Permohonan Konsumsi</h2>
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
	<br>
	<div class="body">
		@if($pagination->items())
		<div class="table-responsive">
		  <table id="table-permohonan_konsumsi" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-no_permohonan_konsumsi'>No Permohonan Konsumsi</th>
		        <th class='column-tanggal'>Tanggal</th>
		        <th class='column-jam'>Jam</th>
		        <th class='column-sumber_dana'>Sumber Dana</th>
		        <th class='column-kegiatan'>Kegiatan</th>
		        <th class='column-jenis_konsumsi'>Jenis Konsumsi</th>
		        <th class='column-jumlah'>Jumlah</th>
		        <th class='column-pemohon'>Pemohon</th>
		        <th class='column-keterangan'>Keterangan</th>
		        <th class='column-status'>Status</th>
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
		      @foreach($pagination->items() as $i => $permohonanKonsumsi)
		      <tr>
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-no_permohonan_konsumsi'>{{ $permohonanKonsumsi->no_permohonan_konsumsi }}</td>
		        <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal }}</td>
		        <td class='column-jam'>{{ $permohonanKonsumsi->jam }}</td>
		        <td class='column-sumber_dana'>{{ $permohonanKonsumsi->nama_sumber_dana }}</td>
		        <td class='column-kegiatan'>{{ $permohonanKonsumsi->kegiatan }}</td>
		        <td class='column-jenis_konsumsi'>{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
		        <td class='column-jumlah'>{{ $permohonanKonsumsi->jumlah_peserta }}</td>
		        <td class='column-pemohon'>{{ $permohonanKonsumsi->pemohon }}</td>
		        <td class='column-keterangan'>{{ $permohonanKonsumsi->keterangan }}</td>
		        <td class='column-status'>{{ $permohonanKonsumsi->status_approval }}</td>
		        <td width="200" class="text-center column-action">
		          
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-konsumsi', [$permohonanKonsumsi->getKey()]) }}">Delete</a>
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