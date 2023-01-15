@extends('front.layout.master-content')

@section('content')	

			<div id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
							<h2>List Pemesanan Ruang</h2>
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
		  <table id="table-pemesanan_ruangan" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-no_pemesanan_ruangan'>No Pemesanan Ruangan</th>
		        <th class='column-tanggal'>Tanggal</th>
		        <th class='column-nama_acara'>Nama Acara</th>
		        <th class='column-waktu'>Waktu Awal</th>
		        <th class='column-waktu'>Waktu Akhir</th>
		        <th class='column-jumlah_peserta'>Jumlah Peserta</th>
		        <th class='column-id_ruang'>Id Ruang</th>
		        <th class='column-attachment'>Attachment</th>
		        <th class='column-keterangan'>Keterangan</th>
		        <!-- <th class='column-status_pj'>Status Penanggung Jawab</th> -->
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
		      <tr>
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-no_pemesanan_ruangan'>{{ $pemesananRuangan->no_pemesanan_ruangan }}</td>
		        <td class='column-tanggal'>{{ $pemesananRuangan->tanggal }}</td>
		        <td class='column-nama_acara'>{{ $pemesananRuangan->nama_acara }}</td>
		        <td class='column-waktu'>{{ $pemesananRuangan->waktu_awal }}</td>
		        <td class='column-waktu'>{{ $pemesananRuangan->waktu_akhir }}</td>
		        <td class='column-jumlah_peserta'>{{ $pemesananRuangan->jumlah_peserta }}</td>
		        <td class='column-id_ruang'>{{ $pemesananRuangan->nama_ruang }}</td>
		        <td class='column-file_layout'>
		          <a target="_blank" href="{{Storage::disk('uploads')->url($pemesananRuangan->attachment) }}">{{ $pemesananRuangan->attachment }}</a>
		        </td>
		        <td class='column-keterangan'>{{ $pemesananRuangan->keterangan }}</td>
		        <!-- <td class='column-status_pj'>{{ $pemesananRuangan->status_pj }}</td> -->
		        <td width="200" class="text-center column-action">
		          <?php $role = \DB::table('karyawan')->select('role')->where('id','=',\Auth::guard('front')->id())->first(); ?>
		          
				  @if($role=="Manajer")
		          @elseif($role=="Supervisor")
		          @endif
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('delete-list-ruang', [$pemesananRuangan->getKey()]) }}">Delete</a>
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