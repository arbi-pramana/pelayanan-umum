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
        <form action="{{ route('spjalan.submit') }}" method="POST" class="colorlib-form">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_pengemudi">Nama Pengemudi</label>
                        <div class="form-field">
                            <input name="nama_pengemudi" type="text" class="form-control" required>
                        </div>
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
                        <label for="tgl_berangkat">Tgl Berangkat</label>
                        <div class="form-field">
                            <input name="tgl_berangkat" type="date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tgl_kembali">Tgl Kembali</label>
                        <div class="form-field">
                            <input name="tgl_kembali" type="date" class="form-control" required>
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
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="bbm">Pengisian BBM</label>
                        <div class="form-field">
                            <input name="bbm" type="number" class="form-control" required>
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
    setInterval(function () {
        $.ajax({
            url: "{{url('api/biayapermeter')}}",
            success: function (result) {
                jarak = $("[name='jarak']").val()
                total = parseFloat(jarak) * parseInt(result.value)
                $("[name='total_biaya']").val(total)
            }
        });
    }, 10);


    $(function () {
        $("#input-tujuan").on('routes', function (e, data) {
            $("#input-rute").val(JSON.stringify(data.paths));
            $("#input-jarak").val(data.distance.value / 1000);
            $("#input-lama_perjalanan").val(data.duration.value);
        });
    });
</script>
@stop