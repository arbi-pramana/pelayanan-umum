@extends('front.layout.master-home')

@section('content')
	@if(isset($pemesanan_ruangan))
		<div class="container">
			<div class="row">
				@foreach($ruangs as $i => $ruang)
					<div class="col-md-4">
						<div style="padding: 30px;">
							<div class="container">
								<div class="row">
									<form action="pemesananruangan" method="get">
									<div class="hotel-entry">
										@if(count($pemesanan_ruangan[$ruang->id]) > 0)
										<a class="hotel-img" style="background-image:url({{asset($ruang->foto_ruang)}} ); width: 250px;">
										<p class="notavailable"><span>Not Available</span></p>
										</a>
										<h3>{{$ruang->nama_ruang}}</h3>
										@else
										<a class="hotel-img" style="background-image:url({{asset($ruang->foto_ruang)}} ); width: 250px;">
										<button type="submit" class="available"><span>Available</span></button>
										</a>
										<h3>{{$ruang->nama_ruang}}</h3>
										<input type="hidden" value="{{$ruang->id}}" name="id_ruang">
										<input type="hidden" value="{{$ruang->nama_ruang}}" name="nama_ruang">
										<input type="hidden" value="{{$date}}" name="tanggal">
								        <input type="hidden" value="{{$waktu_awal}}" name="waktu_awal"> 
								        <input type="hidden" value="{{$waktu_akhir}}" name="waktu_akhir"> 
								        <input type="hidden" value="{{$jumlah_peserta}}" name="jumlah_peserta">
										@endif
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	@endif
@stop