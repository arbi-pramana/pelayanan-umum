@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Surat Perintah Jalan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::surat-perintah-jalan.form-create') }}">Create</a>
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
		  <table id="table-surat_perintah_jalan" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <!-- <th class='column-nopol_kendaraan'>Nopol Kendaraan</th> -->
		        <!-- <th class='column-jenis'>Jenis</th> -->
		        <th class='column-nama_pengemudi'>Nama Pengemudi</th>
		        <th class='column-nama_pengemudi'>Nama Kendaraan</th>
		        <th class='column-nama_pengemudi'>Nomor Polisi</th>
		        <th class='column-tujuan'>Tujuan</th>
		        {{-- <th class='column-lama_perjalanan'>Lama Perjalanan</th> --}}
		        <th class='column-tanggal_berangkat'>Tanggal Berangkat</th>
		        <th class='column-tanggal_kembali'>Tanggal Kembali</th>
		        <th class='column-jam_berangkat'>Jam Berangkat</th>
		        <th class='column-jam_kembali'>Jam Kembali</th>
		        <th class='column-pengisian_bbm'>Estimasi Pengisian Bbm</th>
		        <th class='column-pengisian_bbm'>Estimasi Bbm Ke 1</th>
		        <th class='column-pengisian_bbm'>Estimasi Bbm Ke 2</th>
		        <th class='column-pengisian_bbm'>Biaya Tol</th>
		        <th class='column-pengisian_bbm'>Estimasi Total Biaya Ke 1 Perjalanan</th>
		        <th class='column-pengisian_bbm'>Estimasi Total Biaya Ke 2 Perjalanan</th>
		        <th class='column-pengisian_bbm'>Status Perjalanan</th>
		        {{-- <th class='column-penanggung_jawab'>Penanggung Jawab</th>
		        <th>Status PJ</th>
		        <th class='column-penanggung_jawab_pool'>Penanggung Jawab Pool</th>
		        <th>Status PJ Pool</th> --}}
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @if(!$pagination->count())
		      <tr>
		        <td colspan="14" class="text-center">
		          Records empty.
		        </td>
		      </tr>
		      @endif
		      @foreach($pagination->items() as $i => $suratPerintahJalan)
			  @if ($suratPerintahJalan->status_perjalanan =='Sudah Sampai')
			  <tr style="background-color: #9ED2C6;color:black;">
			  @else
				  <tr>
			  @endif
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->nama_driver }}</td>
		        <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->kendaraan->nama_kendaraan }}</td>
		        <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->kendaraan->no_pol }}</td>
		        <td class='column-tujuan'>{{ $suratPerintahJalan->tujuan }}</td>
		        <td class='column-tanggal_berangkat'>{{ $suratPerintahJalan->tanggal_berangkat }}</td>
		        <td class='column-tanggal_kembali'>{{ $suratPerintahJalan->tanggal_kembali }}</td>
		        <td class='column-jam_berangkat'>{{ $suratPerintahJalan->jam_berangkat }}</td>
		        <td class='column-jam_kembali'>{{ $suratPerintahJalan->jam_kembali }}</td>
		        <td class='column-pengisian_bbm'>{{ $suratPerintahJalan->pengisian_bbm }} L </td>
		        <td class='column-pengisian_bbm'>Rp . {{ number_format($suratPerintahJalan->total_biaya - $suratPerintahJalan->biaya_toll) }} 	Pertalite / Dexlite  </td>
		        <td class='column-pengisian_bbm'>Rp . {{ number_format($suratPerintahJalan->total_biaya_2 - $suratPerintahJalan->biaya_toll) }} Pertamax / Dex  </td>
		        <td class='column-pengisian_bbm'>Rp . {{ number_format($suratPerintahJalan->biaya_toll) }}  
				
				</td>
		        <td class='column-pengisian_bbm'>Rp . {{ number_format($suratPerintahJalan->total_biaya) }} 
					Pertalite / Dexlite
				 </td>
		        <td class='column-pengisian_bbm'>Rp . {{ number_format($suratPerintahJalan->total_biaya_2) }} 
				Pertamax / Dex </td>
				<td class='column-jam_kembali'>{{ $suratPerintahJalan->status_perjalanan }}</td>
		        {{-- @php
		        $pj = App\Models\Karyawan::where('id',$suratPerintahJalan->penanggung_jawab)->first();
		        $pj_pool = App\Models\Karyawan::where('id',$suratPerintahJalan->penanggung_jawab_pool)->first();
		        @endphp --}}
		        {{-- <td class='column-penanggung_jawab'>{{ $pj->nama }}</td>
		        <td> {{$suratPerintahJalan->status_pj}} </td>
		        <td> {{$suratPerintahJalan ? $suratPerintahJalan->status_pj_pool : ''}} </td>
		        <td class='column-penanggung_jawab_pool'>{{ $pj_pool ? $pj_pool->nama : '' }}</td> --}}
		        <td width="500" class="text-center column-action row">
					@if (Auth::user()->role == 'superadmin')
						@if ($suratPerintahJalan->status_perjalanan != 'Sudah Sampai')
						<a class="btn btn-sm btn-edit btn-success" href="{{ route('admin::surat-perintah-jalan.sampai', [$suratPerintahJalan->getKey()]) }}">Sampai</a>
						<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::surat-perintah-jalan.form-edit', [$suratPerintahJalan->getKey()]) }}">Edit</a>
						<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::surat-perintah-jalan.delete', [$suratPerintahJalan->getKey()]) }}">Delete</a>
						<a class="btn btn-success" href="{{ route('admin::surat-perintah-jalan.send-email',['id'=>$suratPerintahJalan->id]) }}">Send Email</a>
						@endif
						<a class="btn btn-warning" href="{{ route('admin::surat-perintah-jalan.page-pdf',['id'=>$suratPerintahJalan->id]) }}" target="_blank">Export PDF</a>
						
					@else
						@if ($suratPerintahJalan->status_perjalanan != 'Sudah Sampai')
						<a class="btn btn-sm btn-edit btn-success" href="{{ route('admin::surat-perintah-jalan.sampai', [$suratPerintahJalan->getKey()]) }}">Sampai</a>
						<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::surat-perintah-jalan.form-edit', [$suratPerintahJalan->getKey()]) }}">Edit</a>
						<a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::surat-perintah-jalan.delete', [$suratPerintahJalan->getKey()]) }}">Delete</a>
						<a class="btn btn-success" href="{{ route('admin::surat-perintah-jalan.send-email',['id'=>$suratPerintahJalan->id]) }}">Send Email</a>
						@endif
						<a class="btn btn-warning" href="{{ route('admin::surat-perintah-jalan.page-pdf',['id'=>$suratPerintahJalan->id]) }}" target="_blank">Export PDF</a>
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
			Surat Perintah Jalan empty
		</div>
		@endif
	</div>
</div>
@stop
