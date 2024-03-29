@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Permohonan Konsumsi</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::permohonan-konsumsi.form-create') }}">Create</a>
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
		  <table id="my-table" class="table table-bordered">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-no_permohonan_konsumsi'>No Permohonan Konsumsi</th>
				<th class='column-tanggal'>Tanggal Pemesanan </th>
		        <th class='column-tanggal'>Jam Pemesanan </th>
		        <th class='column-tanggal'>Tanggal</th>
		        <th class='column-tanggal'>Tanggal Selesai</th>
		        <th class='column-jam'>Jumlah</th>
		        <th class='column-sumber_dana'>Sumber Dana</th>
		        <th class='column-kegiatan'>Kegiatan</th>
		        <th class='column-jenis_konsumsi'>Jenis Konsumsi</th>
		        <th class='column-jumlah'>Jumlah</th>
		        <th class='column-pemohon'>Pemohon</th>
		        {{-- <th class='column-supervisor'>Supervisor</th>
		        <th class='column-status_supervisor'>Status Supervisor</th>
		        <th class='column-manajer'>Manajer</th>
		        <th class='column-status_manajer'>Status Manajer</th> --}}
		        <th class='column-status_pj'>Status</th>
		        <th class='column-status_pj'>Status Pelaksana</th>
		        <th class='column-keterangan'>Keterangan</th>
		        <th class='column-keterangan'>Alasan Reject</th>
		        <th class='column-keterangan'>Attachment</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($pagination as $i => $permohonanKonsumsi)
				@if ($permohonanKonsumsi->status_pj == 'Approved' && $permohonanKonsumsi->status_pelaksana == 'Terlaksana' )
					<tr style="background-color: #FAF4B7;color:black;">
				@elseif ($permohonanKonsumsi->status_pj == 'Approved')
					<tr style="background-color: #9ED2C6;color:black;">
				@elseif($permohonanKonsumsi->status_pj == 'Rejected')
					<tr style="background-color: #FF8AAE;color:black;">
				@else
					<tr>
				@endif
		        <td class="text-center column-number">{{ $loop->iteration }}</td>
				@if ($permohonanKonsumsi->no_permohonan_konsumsi == '0')
					<td class='column-no_permohonan_konsumsi'>Tanpa Ruangan</td>
				@else
		        	<td class='column-no_permohonan_konsumsi'>{{ $permohonanKonsumsi->nomor->no_pemesanan_ruangan ?? ''}}</td>
				@endif
		        <td class='column-tanggal'>{{ $permohonanKonsumsi->created_at->format("Y-m-d") }}</td>
		        <td class='column-tanggal'>{{ $permohonanKonsumsi->created_at->format("H:i:s") }}</td>
		        <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal }}</td>
		        <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal_selesai }}</td>
		        <td class='column-jam'>{{ $permohonanKonsumsi->jumlah }}</td>
		        <td class='column-sumber_dana'>{{ $permohonanKonsumsi->sumber_dana }}</td>
		        <td class='column-kegiatan'>{{ $permohonanKonsumsi->kegiatan }}</td>
		        <td class='column-jenis_konsumsi'>{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
		        <td class='column-jumlah'>{{ $permohonanKonsumsi->jumlah_peserta }}</td>
		        <td class='column-pemohon'>{{ $permohonanKonsumsi->pemohon }}</td>
		        {{-- <td class='column-supervisor'>{{ $permohonanKonsumsi->nama_supervisor }}</td>
		        <td class='column-status_supervisor'>{{ $permohonanKonsumsi->status_supervisor }}</td>
		        <td class='column-manajer'>{{ $permohonanKonsumsi->nama_manajer }}</td>
		        <td class='column-status_manajer'>{{ $permohonanKonsumsi->status_manajer }}</td> --}}
		        <td class='column-status_pj'>{{ $permohonanKonsumsi->status_pj }}</td>
		        <td class='column-status_pj'>{{ $permohonanKonsumsi->status_pelaksana }}</td>
		        <td class='column-keterangan'>{{ $permohonanKonsumsi->keterangan }}</td>
		        <td class='column-keterangan'>{{ $permohonanKonsumsi->alasan_reject }}</td>
				<td>
					<a href="{{asset('pemesanan_ruangan/attachment/'.$permohonanKonsumsi->attachment) }}" download> Click</a>
				</td>
		        <td width="200" class="text-center column-action">
				{{-- @if (now() <= $permohonanKonsumsi->tanggal) --}}
					@if (Auth::user()->role == 'adminruang')
						@if($permohonanKonsumsi->status_pj == 'Pending')
							<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::permohonan-konsumsi.approve', [$permohonanKonsumsi->getKey()]) }}">Approve</a>
							<a class="btn btn-sm btn-delete btn-danger reject-button" href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$permohonanKonsumsi->id}}">Reject</a>
						@endif 
						@if($permohonanKonsumsi->status_pelaksana != 'Terlaksana' && $permohonanKonsumsi->status_pj == 'Approved' )
							<a class="btn btn-sm btn-delete btn-warning" href="{{ route('admin::permohonan-konsumsi.terlaksana', [$permohonanKonsumsi->getKey()]) }}">Selesai</a>
						@endif 
					@else
						@if($permohonanKonsumsi->status_pj == 'Pending')
							<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::permohonan-konsumsi.approve', [$permohonanKonsumsi->getKey()]) }}">Approve</a>
							<a class="btn btn-sm btn-delete btn-danger reject-button" href="#"  data-toggle="modal" data-target="#exampleModal" data-id="{{$permohonanKonsumsi->id}}">Reject</a>
							
						@endif 
						@if($permohonanKonsumsi->status_pj == 'Rejected')
						<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-konsumsi.form-edit', [$permohonanKonsumsi->getKey()]) }}">Edit</a>
							<a class="btn btn-sm btn-delete btn-danger delete-button" href="#" data-id="{{$permohonanKonsumsi->id}}">Delete</a>
						@endif 
						@if($permohonanKonsumsi->status_pelaksana != 'Terlaksana' && $permohonanKonsumsi->status_pj == 'Approved' )
							<a class="btn btn-sm btn-delete btn-warning" href="{{ route('admin::permohonan-konsumsi.terlaksana', [$permohonanKonsumsi->getKey()]) }}">Selesai</a>
							<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-konsumsi.form-edit', [$permohonanKonsumsi->getKey()]) }}">Edit</a>
							<a class="btn btn-sm btn-delete btn-danger delete-button" href="#" data-id="{{$permohonanKonsumsi->id}}">Delete</a>
						@endif 
					@endif
				{{-- @endif --}}
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
	</div>
</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Beri Alasan Untuk Reject</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="{{ route('admin::permohonan-konsumsi.reject')}}" method="get">
				<div class="form-group">
					<input type="hidden" id="id-konsumsi" name="id_konsumsi">
					<label for="exampleFormControlTextarea1">Alasan Reject</label>
					<textarea class="form-control" id="alasan" rows="3" name="alasan"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
			</div>
		</div>
		</div>
	</div>
@stop
@section('js')
	<script>
		$('.reject-button').on('click', function () {
			$('#id-konsumsi').val($(this).attr("data-id"));
		})
	</script>
	<script>
		$('.delete-button').on('click', function(e){
		   var form = this;
		   var id = $(this).attr("data-id")
		   e.preventDefault();
		   swal({
			   title: "Apakah ingin menghapus data ? ",
			   icon: "warning",
			   buttons: true,
			   dangerMode: true,
			   })
			   .then((willDelete) => {
			   if (willDelete) {
				   $.get("{{url('admin/permohonan-konsumsi/delete')}}"+'/'+id, function(){
					   swal(
						   'Terhapus!',
						   'Data berhasil terhapus !',
						   'success'
					   ).then(()=>{
						   location.reload()
					   })
				   });
			   }
			   });
	   }); 
   </script>


@stop
