@extends('front.baru.master')
@section('content')
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap">
        <div class="col-md-12">
            <h4>Formulir Permohonan Kendaraan</h4>    
            <form action="{{ route('permohonankendaraan.submit') }}" class="colorlib-form" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-4">
                        @include('admin::partials.fields.map', [
                            'name' => 'latlng',
                            'label' => 'Koordinat',
                            'col' => 'col-md-12'
                        ])
                        <div class="form-group">
                            <label for="tujuan">
                                Tujuan <span style="color:red;">*</span>
                            </label>
                            <div class="form-field">
                                <textarea name="tujuan" id="" cols="30" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pemohon">
                                        Pemohon
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control" name="pemohon" readonly="" type="text" value="{{ $pemohon['nama'] }}"/>
                                        <input class="form-control" name="pemohon_id"type="hidden" value="{{ $pemohon['id'] }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keperluan">
                                        Keperluan <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control" id="keperluan" name="keperluan" placeholder="Masukkan keperluan" type="text" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="penanggung_jawab">
                                        Nama Pemesan <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input type="text" class="form-control" name="penanggung_jawab" required>
                                        {{-- <select class="form-control" name="penanggung_jawab">
                                            <option>
                                                Please chooses
                                            </option>
                                            @foreach($array_pj_kendaraan as $manajer)
                                            <option style="color: black" value='{{ $manajer["id"] }}'>
                                                {{ $manajer["nama"] }}
                                            </option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Tanggal Berangkat <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control input-date/" id="tanggal_berangkat" name="tanggal_berangkat" placeholder="Tanggal Berangkat" type="date" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_kembali">
                                        Tanggal Kembali <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <input class="form-control input-date/" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Berangkat" type="date" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_berangkat">
                                        Jam Berangkat <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input class="form-control time" id="jam_berangkat" name="jam_berangkat" placeholder="Jam Berangkat" type="time" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_kembali">
                                        Jam Kembali <span style="color:red;">*</span>
                                    </label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input class="form-control time" id="jam_kembali" name="jam_kembali" placeholder="Jam Kembali" type="time" required>
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="keterangan">
                                        Keterangan
                                    </label>
                                    <div class="form-field">
                                        <textarea name="keterangan" class="form-control" cols="30" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input style="margin-top: 25px;" class="btn btn-primary btn-block" id="submit" name="submit" type="submit" value="Submit">
                                </input>
                            </div>
                        </div>
                    </div>
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