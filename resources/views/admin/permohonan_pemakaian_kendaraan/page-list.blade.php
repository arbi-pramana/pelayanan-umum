
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
				<th class='column-tanggal'>Tanggal Pemesanan </th>
		        <th class='column-tanggal'>Jam Pemesanan </th>
		        <th class='column-pemohon'>Pemohon</th>
		        <th class='column-tujuan'>Tujuan</th>
		        <th class='column-keperluan'>Keperluan</th>
		        <th class='column-tanggal_berangkat'>Tanggal Berangkat</th>
		        <th class='column-tanggal_kembali'>Tanggal Kembali</th>
		        <th class='column-jam_berangkat'>Jam Berangkat</th>
		        <th class='column-jam_kembali'>Jam Kembali</th>
		        <th class='column-jam_kembali'>Keterangan</th>
		        <th class='column-penanggung_jawab'>Status</th>
		        <th class='column-penanggung_jawab'>Alasan Reject</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($pagination as $i => $permohonanPemakaianKendaraan)
			  @if ($permohonanPemakaianKendaraan->status_pj == 'Approved')
			  	<tr style="background-color: #9ED2C6;color:black;">
			  @elseif($permohonanPemakaianKendaraan->status_pj == 'Rejected')
				<tr style="background-color: #FF8AAE;color:black;">
			  @else
			  <tr>
			  @endif
		        <td class="text-center column-number">{{ $loop->iteration }}</td>
		        <td class='column-pemohon'>{{ $permohonanPemakaianKendaraan->created_at->format("Y-m-d") }}</td>
		        <td class='column-pemohon'>{{ $permohonanPemakaianKendaraan->created_at->format("H:i:s") }}</td>
		        <td class='column-pemohon'>{{ $permohonanPemakaianKendaraan->pemohon }}</td>
		        <td class='column-tujuan'>{{ $permohonanPemakaianKendaraan->tujuan }}</td>
		        <td class='column-keperluan'>{{ $permohonanPemakaianKendaraan->keperluan }}</td>
		        <td class='column-tanggal_berangkat'>{{ $permohonanPemakaianKendaraan->tanggal_berangkat }}</td>
		        <td class='column-tanggal_kembali'>{{ $permohonanPemakaianKendaraan->tanggal_kembali }}</td>
		        <td class='column-jam_berangkat'>{{ $permohonanPemakaianKendaraan->jam_berangkat }}</td>
		        <td class='column-jam_kembali'>{{ $permohonanPemakaianKendaraan->jam_kembali }}</td>
		        <td class='column-jam_kembali'>{{ $permohonanPemakaianKendaraan->keterangan }}</td>
		        <td class='column-penanggung_jawab'>{{ $permohonanPemakaianKendaraan->status_pj }}</td>
		        <td class='column-penanggung_jawab'>{{ $permohonanPemakaianKendaraan->alasan_reject }}</td>
		        <td width="200" class="text-center column-action">
					{{-- @if (now() <= $permohonanPemakaianKendaraan->tanggal_berangkat) --}}
						@if (Auth::user()->role == 'adminkendaraan')
							@if($permohonanPemakaianKendaraan->status_pj == 'Pending')
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::permohonan-pemakaian-kendaraan.approve', [$permohonanPemakaianKendaraan->getKey()]) }}">Approve</a>
								<a class="btn btn-sm btn-delete btn-danger reject-button" href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$permohonanPemakaianKendaraan->id}}">Reject</a>
							@endif

						@else
							@if($permohonanPemakaianKendaraan->status_pj == 'Pending')
								<a class="btn btn-sm btn-delete btn-success" href="{{ route('admin::permohonan-pemakaian-kendaraan.approve', [$permohonanPemakaianKendaraan->getKey()]) }}">Approve</a>
								<a class="btn btn-sm btn-delete btn-danger reject-button" href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$permohonanPemakaianKendaraan->id}}">Reject</a>
								<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-pemakaian-kendaraan.form-edit', [$permohonanPemakaianKendaraan->getKey()]) }}">Edit</a>
								<a class="btn btn-sm btn-delete btn-danger delete-button" href="#" data-id="{{$permohonanPemakaianKendaraan->id}}">Delete</a>
							@endif
							@if($permohonanPemakaianKendaraan->status_pj == 'Approved' || $permohonanPemakaianKendaraan->status_pj == 'Rejected')
								<a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-pemakaian-kendaraan.form-edit', [$permohonanPemakaianKendaraan->getKey()]) }}">Edit</a>
								<a class="btn btn-sm btn-delete btn-danger delete-button" href="#" data-id="{{$permohonanPemakaianKendaraan->id}}">Delete</a>
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
		<form action="{{ route('admin::permohonan-pemakaian-kendaraan.reject')}}" method="get">
			<div class="form-group">
				<input type="hidden" id="id-kendaraan" name="id_kendaraan">
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
			$('#id-kendaraan').val($(this).attr("data-id"));
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
				   $.get("{{url('admin/permohonan-pemakaian-kendaraan/delete')}}"+'/'+id, function(){
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
