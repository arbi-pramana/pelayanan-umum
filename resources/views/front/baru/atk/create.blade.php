@extends('front.baru.master')
@section('content')
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap">
        <div class="col-md-12">
            <h4>Formulir Permohonan ATK</h4>
            <form action="{{ route('permohonanatk.submit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-3">
                        @php
                        $prs = App\Models\PemesananRuangan::get();
                        @endphp
                        <label>Nama Barang</label>
                        <select class="form-control" id="nama_barang" name="nama_barang" required>
                            <option value="" disabled selected>pilih satu</option>
                            @foreach($array_barang as $barang)
                            <option value="{{ $barang['id'] }}" style="color: black">{{ $barang["nama_barang"] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Jumlah Barang</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Pemohon</label>
                        <input type="text" name="pemohon" class="form-control" placeholder="Nama Pemohon" value="{{ $pemohon['nama'] }}"
                            readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Bagian</label>
                        <input type="text" name="bagian" class="form-control" placeholder="Masukkan Bagian">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                    </div>
                </div>
                <div class="text-right">
                    <input class="btn btn-primary" type="submit" value="Kirim Permintaan" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function changeFunc(value) {
        $.ajax({
            url: "{{url('api/permohonankonsumsi/')}}?id=" + value,

            success: function (result) {
                console.log(result);
                $("[name='kegiatan']").val(result.nama_acara);
                $("[name='tanggal']").val(result.tanggal);
                $("[name='jam']").val(result.waktu_awal);
                $("[name='jumlah_peserta']").val(result.jumlah_peserta);
                $("[name='ruang']").val(result.nama_ruang);
                $("[name='jenis_konsumsi']").val(result.makanan);
            }
        });
    }
</script>
@endsection