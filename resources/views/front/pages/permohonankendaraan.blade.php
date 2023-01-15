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
    <form action="{{ route('permohonankendaraan.submit') }}" class="colorlib-form" method="POST">
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-md-3">
          @include('admin::partials.fields.map', [
            'name' => 'latlng',
            'label' => 'Koordinat',
            'col' => 'col-md-12'
          ])
          <div class="form-group">
            <label for="tujuan">
              Tujuan
            </label>
            <div class="form-field">
              <input class="form-control" name="tujuan" placeholder="Masukkan Tujuan" type="text"/>
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
                  <input class="form-control" name="pemohon" readonly="" type="text" value="{{ $pemohon['nama'] }}"/>
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
                  <input class="form-control" id="keperluan" name="keperluan" placeholder="Masukkan keperluan" type="text">
                  </input>
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
                    <option>
                      Please chooses
                    </option>
                    @foreach($array_pj_kendaraan as $manajer)
                    <option style="color: black" value='{{ $manajer["id"] }}'>
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
                  <input class="form-control input-date/" id="tanggal_berangkat" name="tanggal_berangkat" placeholder="Tanggal Berangkat" type="date">
                  </input>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_kembali">
                  Tanggal Kembali
                </label>
                <div class="form-field">
                  <input class="form-control input-date/" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Berangkat" type="date">
                  </input>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_berangkat">
                  Jam Berangkat
                </label>
                <div class="form-field">
                  <i class="icon icon-calendar2"></i>
                  <input class="form-control time" id="jam_berangkat" name="jam_berangkat" placeholder="Jam Berangkat" type="time">
                  </input>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jam_kembali">
                  Jam Kembali
                </label>
                <div class="form-field">
                  <i class="icon icon-calendar2"></i>
                  <input class="form-control time" id="jam_kembali" name="jam_kembali" placeholder="Jam Kembali" type="time">
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
                  <input class="form-control" name="keterangan" placeholder="Masukkan Keterangan" type="text"/>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <input class="btn btn-primary btn-block" id="submit" name="submit" type="submit" value="Submit">
              </input>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  @endif

  @if(isset($_GET['nama_ruang']))
  <div class="tab-content">
    <form action="{{ route('pemesananruangan.submit') }}" class="colorlib-form" method="POST">
      {!! csrf_field() !!}
      <div class="row">
        <div class="col-md-4">
          <div class="form-group" data-validate="No. Pemesanan Ruangan">
            <label for="no_pemesanan_ruangan">
              No. Pemesanan Ruangan
            </label>
            <div class="form-field">
              <input ="pr-{{date('ymd')}}-{{$_get['id_ruang']}}"="" class="form-control" name="no_pemesanan_ruangan" placeholder="No. Pemesanan Ruangan" readonly="" type="text" value="">
              </input>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="tanggal">
              Tanggal Peminjaman
            </label>
            <div class="form-field">
              <i class="icon icon-calendar2">
              </i>
              <input class="form-control" name="tanggal" readonly="" type="text" value="{{$_GET['tanggal']}}"/>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="date">
              Waktu Awal Peminjaman
            </label>
            <div class="form-field">
              <i class="icon icon-calendar2">
              </i>
              <input class="form-control time" id="waktu" name="waktu_awal" placeholder="Waktu Awal Peminjaman" type="time" value="{{$_GET['waktu_awal']}}">
              </input>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="date">
              Waktu Akhir Peminjaman
            </label>
            <div class="form-field">
              <i class="icon icon-calendar2">
              </i>
              <input class="form-control time" id="waktu" name="waktu_akhir" placeholder="Waktu Akhir Peminjaman" type="time" value="{{$_GET['waktu_akhir']}}">
              </input>
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
              <input type="text" name="pemohon" class="form-control" value="{{ $pemohon["nama"] }}" readonly/>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="nama_acara">
              Nama Acara
            </label>
            <div class="form-field">
              <input class="form-control" name="nama_acara" placeholder="Masukkan Nama Acara" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="jumlah_peserta">
              Jumlah Peserta
            </label>
            <div class="form-field">
              <input class="form-control" name="jumlah_peserta" readonly"="" type="text" value="{{$_GET['jumlah_peserta']}}/">
              </input>
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
              <input class="form-control" name="id_ruang" readonly="" type="hidden" value="{{$_GET['id_ruang']}}">
                <input class="form-control" name="nama_ruang" readonly="" type="text" value="{{$_GET[  'nama_ruang']}}"/>
              </input>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="attachment">
              Attachment
            </label>
            <div class="form-field">
              <input class="form-control" name="attachment" placeholder="Masukkan Attachment" type="file">
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
              <input class="form-control" name="keterangan" placeholder="Masukkan Keterangan" type="text"/>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <input class="btn btn-primary btn-block" id="submit" name="submit" type="submit" value="Submit">
          </input>
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
