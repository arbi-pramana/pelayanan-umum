@extends('front.layout.master-content')
@section('content')			
				<div id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});" data-stellar-background-ratio="0.5">
					<div class="overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
								<h2>Form Pemesanan Ruang</h2>
							</div>
						</div>
					</div>
				</div>
				
				<div id="colorlib-reservation">
					<div class="tab-content">
					<form action="{{ route('pemesananruangan.submit') }}" method="POST" class="colorlib-form" enctype="multipart/form-data">
					{!! csrf_field() !!}
		              	<div class="row">
							<div class="col-md-4">
			              	 	<div class="form-group" data-validate="No. Pemesanan Ruangan">
			                    <label for="no_pemesanan_ruangan">No. Pemesanan Ruangan</label>
			                    <div class="form-field">
			                      <?php
			                      $x=\DB::table('pemesanan_ruangan')->where('tanggal','like', '%'.date("Y-m-",strtotime($_GET['tanggal'])).'%')->count();
			                      ?>
			                      <input type="text" name="no_pemesanan_ruangan" class="form-control" placeholder="No. Pemesanan Ruangan" value="PR-{{date('Ymd')}}-{{$_GET['id_ruang'].$x+1}}" readonly="">
			                      
			                    </div>
			                  </div>
			              	</div>	
			                <div class="col-md-4">
			                  <div class="form-group">
			                    <label for="tanggal">Tanggal Peminjaman</label>
			                    <div class="form-field">
			                      <i class="icon icon-calendar2"></i>
			                      <input type="text" name="tanggal" class="form-control" value="{{$_GET['tanggal']}}" readonly="">
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-2">
			                  <div class="form-group">
			                    <label for="date">Waktu Awal Peminjaman</label>
			                    <div class="form-field">
			                      <i class="icon icon-calendar2"></i>
			                      <input type="time" name="waktu_awal" id="waktu" class="form-control time" placeholder="Waktu Awal Peminjaman" value="{{$_GET['waktu_awal']}}" readonly="">
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-2">
			                  <div class="form-group">
			                    <label for="date">Waktu Akhir Peminjaman</label>
			                    <div class="form-field">
			                      <i class="icon icon-calendar2"></i>
			                      <input type="time" name="waktu_akhir" id="waktu" class="form-control time" placeholder="Waktu Akhir Peminjaman" value="{{$_GET['waktu_akhir']}}" readonly="">
			                    </div>
			                  </div>
			                </div>
		            	</div>
		            	<div class="row">
		            		<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="pemohon">Pemohon</label>
				                    <div class="form-field">
				                      <input type="text" name="pemohon" class="form-control" value="{{ $pemohon['nama'] }}" readonly="">
				                    </div>
			                  	</div>
		              		</div>
		              		<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="nama_acara">Nama Acara</label>
				                    <div class="form-field">
				                      <input type="text" name="nama_acara" class="form-control" placeholder="Masukkan Nama Acara">
				                    </div>
			                  	</div>
		              		</div>
		              		<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="jumlah_peserta">Jumlah Peserta</label>
				                    <div class="form-field">
				                      <input type="text" name="jumlah_peserta" class="form-control" value="{{$_GET['jumlah_peserta']}}" id="jumlah_peserta"readonly>
				                    </div>
			                  	</div>
		              		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="ruang">Ruang</label>
				                    <div class="form-field">
				                      <input type="hidden" name="id_ruang" class="form-control" value="{{$_GET['id_ruang']}}" readonly="">
				                      <input type="text" name="nama_ruang" class="form-control" value="{{$_GET['nama_ruang']}}" readonly="">
				                    </div>
			                  	</div>
		              		</div>
		              		<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="attachment">Attachment</label>
				                    <div class="form-field">
				                      <input type="file" name="attachment" class="form-control" placeholder="Masukkan Attachment">
				                    </div>
			                  	</div>
		              		</div>
		              		<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="file_layout">Tambah Konsumsi</label>
				                    <div class="form-field">
				                      <select name="konsumsi" class="form-control">
				                    	<option value="" disabled="" selected="" style="color:#000;">Pilih</option>
				                    	<option value="iya" style="color:#000;">Iya</option>
				                    	<option value="tidak" style="color:#000;">Tidak</option>
				                      </select>
				                    </div>
			                  	</div>
		                    </div>
		            	</div>
		            	<div class="row">
	              			<div class="col-md-4">
			              	 	<div class="form-group">
				                    <label for="keterangan">Sub-Ruang</label>
				                    <div class="form-field">
				                    	@php
				                    		$checksub = App\Models\ChildRuang::where('id_parent_ruang', $_GET['id_ruang']);
				                    		$count = $checksub->count();
				                    		$fetch = $checksub->get();
				                    	@endphp
				                    	@if($count > 0)
				                    		@foreach($fetch as $i => $subruang)
			                    			<input type="checkbox" value="{{$subruang->id}}" name="subruang[]" id="{{$i}}" onclick="test(this)"><label for="{{$i}}">{{$subruang->nama_subruang}} - {{$subruang->kapasitas}} pax</label><br>
			                    			@endforeach
			                    		@else
			                    			<input type="checkbox" style="color:#FFFFFF;" disabled id="0"><label for="0">Tidak ada sub ruang</label>
			                    		@endif
			                    	</div>
			                  	</div>
		              		</div>
				            <input type="hidden" id="total" name="total" class="form-control" value="{{$_GET['jumlah_peserta']}}" >
		              		<!-- Rev Arbi -->
		              		<!-- <div class="col-md-2">
			              	 	<div class="form-group">
				                    <label for="keterangan">Total Pax</label>
				                    <div class="form-field">
				                    </div>
			                  	</div>
		              		</div> -->
	              			<div class="col-md-6">
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

<script type="text/javascript">
    var total = parseInt(document.getElementById('total').value);

    function test(item){
        if(item.checked){
           total += parseInt(item.value);
        }else{
           total -= parseInt(item.value);
        }
        //alert(total);
        document.getElementById('total').value = total;
    }
</script>

@stop