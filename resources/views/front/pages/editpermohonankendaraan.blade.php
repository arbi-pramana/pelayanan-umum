@extends('front.layout.master-content')
@section('content')
<div data-stellar-background-ratio="0.5" id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});">
  <div class="overlay">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
        <h2>
          Form Permohonan Kendaraan
        </h2>
      </div>
    </div>
  </div>
</div>
<div id="colorlib-reservation">
  @if(empty(isset($_GET['nama_ruang'])))
  <div class="tab-content">
    <form action="{{ route('permohonankendaraan.update', $permohonan['id']) }}" class="colorlib-form" method="POST">
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-md-3">
          @include('admin::partials.fields.map', [
            'name' => 'latlng',
            'label' => 'Koordinat',
            'col' => 'col-md-12',
            'value' => $permohonan['latlng']
          ])
          <div class="form-group">
            <label for="tujuan">
              Tujuan
            </label>
            <div class="form-field">
              <input class="form-control" name="tujuan" value="{{ $permohonan['tujuan'] }}" placeholder="Masukkan Tujuan" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="pemohon">
                  Pemohon
                </label>
                <div class="form-field">
                  <input class="form-control" name="pemohon" value="{{ $permohonan['pemohon'] }}" readonly="" type="text"/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="keperluan">
                  Keperluan
                </label>
                <div class="form-field">
                  <i class="icon icon-calendar2"></i>
                  <input class="form-control" id="keperluan" name="keperluan" value="{{ $permohonan['keperluan'] }}" placeholder="Masukkan keperluan" type="text"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="penanggung_jawab">
                  Penanggung Jawab
                </label>
                <div class="form-field">
                  <select class="form-control" name="penanggung_jawab">
                    <option>Please chooses</option>
                    @foreach($array_pj_kendaraan as $manajer)
                    <option {{ $permohonan['penanggung_jawab'] == $manajer['id'] ? 'selected' : '' }} value='{{ $manajer["id"] }}'>
                      {{ $manajer["nama"] }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_berangkat">
                  Tanggal Berangkat
                </label>
                <div class="form-field">
                  <input class="form-control input-date" id="tanggal_berangkat" name="tanggal_berangkat" value="{{ $permohonan['tanggal_berangkat'] }}" placeholder="Tanggal Berangkat" type="date"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_kembali">
                  Tanggal Kembali
                </label>
                <div class="form-field">
                  <input class="form-control input-date" id="tanggal_kembali" name="tanggal_kembali" value="{{ $permohonan['tanggal_kembali'] }}" placeholder="Tanggal Berangkat" type="date"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_berangkat">
                  Jam Berangkat
                </label>
                <div class="form-field">
                  <input class="form-control time" id="jam_berangkat" name="jam_berangkat" value="{{ $permohonan['jam_berangkat'] }}" placeholder="Jam Berangkat" type="time"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jam_kembali">
                  Jam Kembali
                </label>
                <div class="form-field">
                  <input class="form-control time" id="jam_kembali" name="jam_kembali" value="{{ $permohonan['jam_kembali'] }}" placeholder="Jam Kembali" type="time"/>
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
                  <input class="form-control" name="keterangan" value="{{ $permohonan['keterangan'] }}" placeholder="Masukkan Keterangan" type="text"/>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary btn-block">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  @endif

  @if(isset($_GET['nama_ruang']))
  <div class="tab-content">
    <form action="{{ route('pemesananruangan.update', $permohonan['id']) }}" class="colorlib-form" method="POST">
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-md-4">
          <div class="form-group" data-validate="No. Pemesanan Ruangan">
            <label for="no_pemesanan_ruangan">
              No. Pemesanan Ruangan
            </label>
            <div class="form-field">
              <input class="form-control" name="no_pemesanan_ruangan" value="{{ $permohonan['no_pemesanan_ruangan'] }}" placeholder="No. Pemesanan Ruangan" readonly="" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="tanggal">
              Tanggal Peminjaman
            </label>
            <div class="form-field">
              <i class="icon icon-calendar2"></i>
              <input class="form-control" name="tanggal" value="{{ $permohonan['tanggal'] }}" readonly="" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="date">
              Waktu Awal Peminjaman
            </label>
            <div class="form-field">
              <i class="icon icon-calendar2"></i>
              <input class="form-control time" id="waktu" name="waktu_awal" value="{{ $permohonan['waktu_awal'] }}" placeholder="Waktu Awal Peminjaman" type="time"/>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="date">
              Waktu Akhir Peminjaman
            </label>
            <div class="form-field">
              <i class="icon icon-calendar2"></i>
              <input class="form-control time" id="waktu" name="waktu_akhir" value="{{ $permohonan['waktu_akhir'] }}" placeholder="Waktu Akhir Peminjaman" type="time"/>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="pemohon">
              Pemohon
            </label>
            <div class="form-field">
              <input type="text" name="pemohon" value="{{ $permohonan['pemohon'] }}" class="form-control" readonly/>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nama_acara">
              Nama Acara
            </label>
            <div class="form-field">
              <input class="form-control" name="nama_acara" value="{{ $permohonan['nama_acara'] }}" placeholder="Masukkan Nama Acara" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="jumlah_peserta">
              Jumlah Peserta
            </label>
            <div class="form-field">
              <input class="form-control" name="jumlah_peserta" value="{{ $permohonan['jumlah_peserta'] }}" readonly"="" type="text""/>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="ruang">
              Ruang
            </label>
            <div class="form-field">
              <input class="form-control" name="id_ruang" value="{{ $permohonan['id_ruang'] }}" readonly="" type="hidden"/>
              <input class="form-control" name="nama_ruang" value="{{ $permohonan['nama_ruang'] }}" readonly="" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="attachment">
              Attachment
            </label>
            <div class="form-field">
              <input class="form-control" name="attachment" placeholder="Masukkan Attachment" type="file"/>
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
              <input class="form-control" name="keterangan" value="{{ $permohonan['keterangan'] }}" placeholder="Masukkan Keterangan" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>
    </form>
  </div>
  @endif
</div>
@stop

@script
<script type="text/javascript">
$(function() {
  $('.input-date').datepicker({
    format: 'yyyy-mm-dd'
  })
})
</script>
@endscript
