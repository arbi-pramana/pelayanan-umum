@extends('front.layout.master-content')
@section('content')
<div id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});"
 data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
				<h2>Form Permohonan ATK</h2>
			</div>
		</div>
	</div>
</div>

<div id="colorlib-reservation">
	<div class="tab-content">
		<form action="{{ route('permohonanatk.submit') }}" method="POST" class="colorlib-form">
			{!! csrf_field() !!}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="jumlah_barang">Jumlah Barang</label>
						<div class="form-field">
							<input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<div class="form-field">
							<select class="form-control" id="nama_barang" name="nama_barang">
								@foreach($array_barang as $barang)
								<option value="{{ $barang['id'] }}" style="color: black">{{ $barang["nama_barang"] }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="pemohon">Pemohon</label>
						<div class="form-field">
							<input type="text" name="pemohon" class="form-control" placeholder="Masukkan Nama Ruang" value="{{ $pemohon['nama'] }}"
							 readonly>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="bagian">Bagian</label>
						<div class="form-field">
							<input type="text" name="bagian" class="form-control" placeholder="Masukkan Bagian">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<div class="form-field">
							<input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-block">
				</div>
			</div>
		</form>
	</div>
</div>
@stop