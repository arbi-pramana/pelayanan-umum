@extends('front.layout.master-content')
@section('content')
<div id="colorlib-subscribe" style="background-image: url({{asset('vendor/home/images/room-1.jpg')}});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>Form Surat Perintah Jalan</h2>
            </div>
        </div>
    </div>
</div>
<div id="colorlib-reservation">
    <div class="tab-content">
        <form action="{{ route('suratperintahjalan.submit') }}" method="POST" class="colorlib-form">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="pengemudi">Nama Pengemudi</label>					
					<select class="form-control" id="nama_pengemudi" name="nama_pengemudi">
                        @foreach($array_pengemudi as $pengemudi)
                        	<option style="color:black;" value={{ $pengemudi["id"] }}>{{ $pengemudi["nama"] }}</option>
						@endforeach
					</select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <div class="form-field">
                            <input name="tujuan" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="jarak">Jarak</label>
                        <div class="form-field">
                            <input name="jarak" type="text" class="form-control" required>
                            <input name="pemohon" type="hidden" class="form-control" value="{{ $pemohon['nama'] }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="total_biaya">Total Biaya</label>
                        <div class="form-field">
                            <input name="total_biaya" type="number" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_berangkat">Tgl Berangkat</label>
                        <div class="form-field">
                            <input name="tanggal_berangkat" type="date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_kembali">Tgl Kembali</label>
                        <div class="form-field">
                            <input name="tanggal_kembali" type="date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jam_berangkat">Jam Berangkat</label>
                        <div class="form-field">
                            <input name="jam_berangkat" type="time" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jam_kembali">Jam Kembali</label>
                        <div class="form-field">
                            <input name="jam_kembali" type="time" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-6">
                    <label for="pj">Penanggung Jawab</label>					
					<select class="form-control" id="penanggung_jawab" name="penanggung_jawab">
                        @foreach($array_pj_sp as $manajer)
                        	<option style="color:black;" value={{ $manajer["id"] }}>{{ $manajer["nama"] }}</option>
						@endforeach
					</select>
                </div>
                <div class="col-md-6">
                    <label for="pj_pool">Penanggung Jawab Pool</label>
					<select class="form-control" id="penanggung_jawab_pool" name="penanggung_jawab_pool">
                        @foreach($pj_pool as $pj)
                        	<option style="color:black;" value={{ $pj["id"] }}>{{ $pj["nama"] }}</option>
						@endforeach
						</select>
				</div>
			</div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="bbm">Pengisian BBM</label>
                        <div class="form-field">
                            <input name="pengisian_bbm" type="number" class="form-control" required>
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
<script>
    // setInterval(function () {
    //     $.ajax({
    //         url: "{{url('api/biayapermeter')}}",
    //         success: function (result) {
    //             jarak = $("[name='jarak']").val()
    //             total = parseFloat(jarak) * parseInt(result.value)
    //             $("[name='total_biaya']").val(total)
    //         }
    //     });
    // }, 10);


    // $(function () {
    //     $("#input-tujuan").on('routes', function (e, data) {
    //         $("#input-rute").val(JSON.stringify(data.paths));
    //         $("#input-jarak").val(data.distance.value / 1000);
    //         $("#input-lama_perjalanan").val(data.duration.value);
    //     });
    // });
</script>
@stop