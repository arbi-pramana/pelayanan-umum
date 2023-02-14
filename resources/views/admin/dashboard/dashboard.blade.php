@extends('admin::layout.master')

@section('content')
  @include('admin::partials.alert-messages')
  
  <div class="block-header">
      <h2>Rangkuman Berjalan Aplikasi Pelayanan Umum</h2>
  </div>
  @if (Auth::user()->role == 'superadmin')
  <div class="row">
    <a href="{{url('admin/permohonan-konsumsi')}}" class="col-md-3">
        @include('admin::partials.infobox', [
          'icon' => 'fastfood',
          'count' => $konsumsi->count(),
          'label' => 'Permohonan Konsumsi',
          'hover_effect' => 'zoom',
          'icon_classes' => 'bg-blue',
          ])
    </a>
    <a href="{{url('admin/permohonan-pemakaian-kendaraan')}}" class="col-md-3">
      @include('admin::partials.infobox', [
        'icon' => 'directions_car',
        'count' => $kendaraan->count(),
        'label' => 'Permohonan Kendaraan',
        'hover_effect' => 'zoom',
        'icon_classes' => 'bg-blue',
      ])
    </a>
    <a href="{{url('admin/pemesanan-ruangan')}}" class="col-md-3">
      @include('admin::partials.infobox', [
        'icon' => 'meeting_room',
        'count' => $ruangan->count(),
        'label' => 'Pemesanan Ruangan',
        'hover_effect' => 'zoom',
        'icon_classes' => 'bg-blue',
        
      ])
    </a>
    <a href="{{url('admin/surat-perintah-jalan')}}" class="col-md-3">
      @include('admin::partials.infobox', [
        'icon' => 'directions_walk',
        'count' => $spj->count(),
        'label' => 'Surat Perintah Jalan',
        'hover_effect' => 'zoom',
        'icon_classes' => 'bg-blue',
      ])
    </a>
  </div>
  <div class="block-header">
    <h2>Rangkuman Berjalan Aplikasi Pelayanan Umum</h2>
  </div>
  @component('admin::partials.card', [
    'title' => 'Permohonan Konsumsi',
    'description' => ''
  ])
    @slot('header_dropdown')
    <ul class="header-dropdown m-r--5">
      <a href="{{url('admin/permohonan-konsumsi')}}" class="btn btn-primary">Semua</a>
    </ul>
    @endslot

    <div class="table-responsive">
      <table id="my-table" class="table table-bordered">
        <thead>
          <tr>
            <th width="20" class="text-center column-number">No</th>
            <th class='column-no_permohonan_konsumsi'>No Permohonan Konsumsi</th>
        <th class='column-tanggal'>Tanggal Pemesanan </th>
            <th class='column-tanggal'>Jam Pemesanan </th>
            <th class='column-tanggal'>Tanggal</th>
            <th class='column-tanggal'>Tanggal Selesai</th>
            <th class='column-jam'>Jumlah</th>
            <th class='column-sumber_dana'>Sumber Dana</th>
            <th class='column-kegiatan'>Kegiatan</th>
            <th class='column-jenis_konsumsi'>Jenis Konsumsi</th>
            <th class='column-jumlah'>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          @foreach($konsumsi as $i => $permohonanKonsumsi)
            <tr>
            <td class="text-center column-number">{{ $loop->iteration }}</td>
        @if ($permohonanKonsumsi->no_permohonan_konsumsi == '0')
            <td class='column-no_permohonan_konsumsi'>Tanpa Ruangan</td>
        @else
              <td class='column-no_permohonan_konsumsi'>{{ $permohonanKonsumsi->nomor->no_pemesanan_ruangan ?? ''}}</td>
        @endif
            <td class='column-tanggal'>{{ $permohonanKonsumsi->created_at->format("Y-m-d") }}</td>
            <td class='column-tanggal'>{{ $permohonanKonsumsi->created_at->format("H:i:s") }}</td>
            <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal }}</td>
            <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal_selesai }}</td>
            <td class='column-jam'>{{ $permohonanKonsumsi->jumlah }}</td>
            <td class='column-sumber_dana'>{{ $permohonanKonsumsi->sumber_dana }}</td>
            <td class='column-kegiatan'>{{ $permohonanKonsumsi->kegiatan }}</td>
            <td class='column-jenis_konsumsi'>{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
            <td class='column-jumlah'>{{ $permohonanKonsumsi->jumlah_peserta }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endcomponent

  @component('admin::partials.card', [
    'title' => 'Permohonan Kendaraan',
    'description' => ''
  ])
    @slot('header_dropdown')
    <ul class="header-dropdown m-r--5">
      <a href="{{url('admin/permohonan-pemakaian-kendaraan')}}" class="btn btn-primary">Semua</a>
    </ul>
    @endslot

     <div class="table-responsive">
        <table id="my-table2" class="table table-bordered">
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
            </tr>
          </thead>
          <tbody>
            @foreach($kendaraan as $i => $permohonanPemakaianKendaraan)
          
              <tr>
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
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  @endcomponent

  @component('admin::partials.card', [
    'title' => 'Pemesanan Ruangan',
    'description' => ''
  ])
    @slot('header_dropdown')
    <ul class="header-dropdown m-r--5">
      <a href="{{url('admin/pemesanan-ruangan')}}" class="btn btn-primary">Semua</a>
    </ul>
    @endslot

     <div class="table-responsive">
        <table id="my-table3" class="table table-bordered table-striped table-hover">
          <thead>
              <tr>
              <th width="20" class="text-center column-number">No</th>
              <th class='column-no_pemesanan_ruangan'>No Pemesanan Ruangan</th>
              <th class='column-tanggal'>Tanggal Pemesanan </th>
              <th class='column-tanggal'>Jam Pemesanan </th>
              <th class='column-tanggal'>Tanggal Mulai </th>
              <th class='column-tanggal'>Tanggal Selesai</th>
              <th class='column-nama_acara'>Nama Acara</th>
              <th class='column-pemohon'>Nama Pemohon</th>
              <th class='column-waktu'>Waktu Awal</th>
              <th class='column-waktu'>Waktu Akhir</th>
              <th class='column-jumlah_peserta'>Jumlah Peserta</th>
              <th class='column-id_ruang'>Ruangan</th>
              <th class='column-id_ruang'>Design Ruangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ruangan as $i => $pemesananRuangan)
        
          <tr>
              <td class="text-center column-number">{{ $loop->iteration }}</td>
              <td class='column-no_pemesanan_ruangan'>{{ $pemesananRuangan->no_pemesanan_ruangan }}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->created_at->format("Y-m-d") }}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->created_at->format("H:i:s")}}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->tanggal }}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->tanggal_selesai }}</td>
              <td class='column-nama_acara'>{{ $pemesananRuangan->nama_acara }}</td>
              <td class='column-pemohon'>{{ $pemesananRuangan->pemohon }}</td>
              <td class='column-waktu_awal'>{{ date('H:i',$pemesananRuangan->waktu_awal) }}</td>
              <td class='column-waktu_akhir'>{{ date('H:i',$pemesananRuangan->waktu_akhir) }}</td>
              <td class='column-jumlah_peserta'>{{ $pemesananRuangan->jumlah_peserta }}</td>
              <td class='column-id_ruang'>{{ $pemesananRuangan->ruang['nama_ruang'] }}</td>
              <td class='column-id_ruang'>{{ $pemesananRuangan->design_ruangan }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  @endcomponent

  @component('admin::partials.card', [
    'title' => 'Surat Perintah Jalan',
    'description' => ''
  ])
    @slot('header_dropdown')
    <ul class="header-dropdown m-r--5">
      <a href="{{url('admin/surat-perintah-jalan')}}" class="btn btn-primary">Semua</a>
    </ul>
    @endslot

      <div class="table-responsive">
        <table id="my-table4" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th width="20" class="text-center column-number">No</th>
              <!-- <th class='column-nopol_kendaraan'>Nopol Kendaraan</th> -->
              <!-- <th class='column-jenis'>Jenis</th> -->
              <th class='column-nama_pengemudi'>Nama Pengemudi</th>
              <th class='column-nama_pengemudi'>Nama Kendaraan</th>
              <th class='column-nama_pengemudi'>Nomor Polisi</th>
              <th class='column-tujuan'>Tujuan</th>
              {{-- <th class='column-lama_perjalanan'>Lama Perjalanan</th> --}}
              <th class='column-tanggal_berangkat'>Tanggal Berangkat</th>
              <th class='column-tanggal_kembali'>Tanggal Kembali</th>
              <th class='column-jam_berangkat'>Jam Berangkat</th>
              <th class='column-jam_kembali'>Jam Kembali</th>
            </tr>
          </thead>
          <tbody>
            @foreach($spj as $i => $suratPerintahJalan)
        
            <tr>
              <td class="text-center column-number">{{ $loop->iteration }}</td>
              <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->driver->nama_driver ?? '' }}</td>
              <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->kendaraan->nama_kendaraan ?? 'Tanpa Kendaraan' }}</td>
              <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->kendaraan->no_pol ?? 'Tanpa Kendaraan' }}</td>
              <td class='column-tujuan'>{{ $suratPerintahJalan->tujuan }}</td>
              <td class='column-tanggal_berangkat'>{{ $suratPerintahJalan->tanggal_berangkat }}</td>
              <td class='column-tanggal_kembali'>{{ $suratPerintahJalan->tanggal_kembali }}</td>
              <td class='column-jam_berangkat'>{{ $suratPerintahJalan->jam_berangkat }}</td>
              <td class='column-jam_kembali'>{{ $suratPerintahJalan->jam_kembali }}</td>
            @endforeach
          </tbody>
        </table>
      </div>
  @endcomponent
  @endif
  @if (Auth::user()->role == 'adminruang')
    <div class="row">
      <a href="{{url('admin/permohonan-konsumsi')}}" class="col-md-6">
          @include('admin::partials.infobox', [
            'icon' => 'fastfood',
            'count' => $konsumsi->count(),
            'label' => 'Permohonan Konsumsi',
            'hover_effect' => 'zoom',
            'icon_classes' => 'bg-blue',
            ])
      </a>
      <a href="{{url('admin/pemesanan-ruangan')}}" class="col-md-6">
        @include('admin::partials.infobox', [
          'icon' => 'meeting_room',
          'count' => $ruangan->count(),
          'label' => 'Pemesanan Ruangan',
          'hover_effect' => 'zoom',
          'icon_classes' => 'bg-blue',
          
        ])
      </a>
    </div>

    <div class="block-header">
      <h2>Rangkuman Berjalan Aplikasi Pelayanan Umum</h2>
    </div>
    @component('admin::partials.card', [
      'title' => 'Permohonan Konsumsi',
      'description' => ''
    ])
      @slot('header_dropdown')
      <ul class="header-dropdown m-r--5">
        <a href="{{url('admin/permohonan-konsumsi')}}" class="btn btn-primary">Semua</a>
      </ul>
      @endslot

      <div class="table-responsive">
        <table id="my-table" class="table table-bordered">
          <thead>
            <tr>
              <th width="20" class="text-center column-number">No</th>
              <th class='column-no_permohonan_konsumsi'>No Permohonan Konsumsi</th>
          <th class='column-tanggal'>Tanggal Pemesanan </th>
              <th class='column-tanggal'>Jam Pemesanan </th>
              <th class='column-tanggal'>Tanggal</th>
              <th class='column-tanggal'>Tanggal Selesai</th>
              <th class='column-jam'>Jumlah</th>
              <th class='column-sumber_dana'>Sumber Dana</th>
              <th class='column-kegiatan'>Kegiatan</th>
              <th class='column-jenis_konsumsi'>Jenis Konsumsi</th>
              <th class='column-jumlah'>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            @foreach($konsumsi as $i => $permohonanKonsumsi)
              <tr>
              <td class="text-center column-number">{{ $loop->iteration }}</td>
          @if ($permohonanKonsumsi->no_permohonan_konsumsi == '0')
              <td class='column-no_permohonan_konsumsi'>Tanpa Ruangan</td>
          @else
                <td class='column-no_permohonan_konsumsi'>{{ $permohonanKonsumsi->nomor->no_pemesanan_ruangan ?? ''}}</td>
          @endif
              <td class='column-tanggal'>{{ $permohonanKonsumsi->created_at->format("Y-m-d") }}</td>
              <td class='column-tanggal'>{{ $permohonanKonsumsi->created_at->format("H:i:s") }}</td>
              <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal }}</td>
              <td class='column-tanggal'>{{ $permohonanKonsumsi->tanggal_selesai }}</td>
              <td class='column-jam'>{{ $permohonanKonsumsi->jumlah }}</td>
              <td class='column-sumber_dana'>{{ $permohonanKonsumsi->sumber_dana }}</td>
              <td class='column-kegiatan'>{{ $permohonanKonsumsi->kegiatan }}</td>
              <td class='column-jenis_konsumsi'>{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
              <td class='column-jumlah'>{{ $permohonanKonsumsi->jumlah_peserta }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endcomponent
    @component('admin::partials.card', [
    'title' => 'Pemesanan Ruangan',
    'description' => ''
     ])
    @slot('header_dropdown')
    <ul class="header-dropdown m-r--5">
      <a href="{{url('admin/pemesanan-ruangan')}}" class="btn btn-primary">Semua</a>
    </ul>
    @endslot

     <div class="table-responsive">
        <table id="my-table3" class="table table-bordered table-striped table-hover">
          <thead>
              <tr>
              <th width="20" class="text-center column-number">No</th>
              <th class='column-no_pemesanan_ruangan'>No Pemesanan Ruangan</th>
              <th class='column-tanggal'>Tanggal Pemesanan </th>
              <th class='column-tanggal'>Jam Pemesanan </th>
              <th class='column-tanggal'>Tanggal Mulai </th>
              <th class='column-tanggal'>Tanggal Selesai</th>
              <th class='column-nama_acara'>Nama Acara</th>
              <th class='column-pemohon'>Nama Pemohon</th>
              <th class='column-waktu'>Waktu Awal</th>
              <th class='column-waktu'>Waktu Akhir</th>
              <th class='column-jumlah_peserta'>Jumlah Peserta</th>
              <th class='column-id_ruang'>Ruangan</th>
              <th class='column-id_ruang'>Design Ruangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ruangan as $i => $pemesananRuangan)
        
          <tr>
              <td class="text-center column-number">{{ $loop->iteration }}</td>
              <td class='column-no_pemesanan_ruangan'>{{ $pemesananRuangan->no_pemesanan_ruangan }}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->created_at->format("Y-m-d") }}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->created_at->format("H:i:s")}}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->tanggal }}</td>
              <td class='column-tanggal'>{{ $pemesananRuangan->tanggal_selesai }}</td>
              <td class='column-nama_acara'>{{ $pemesananRuangan->nama_acara }}</td>
              <td class='column-pemohon'>{{ $pemesananRuangan->pemohon }}</td>
              <td class='column-waktu_awal'>{{ date('H:i',$pemesananRuangan->waktu_awal) }}</td>
              <td class='column-waktu_akhir'>{{ date('H:i',$pemesananRuangan->waktu_akhir) }}</td>
              <td class='column-jumlah_peserta'>{{ $pemesananRuangan->jumlah_peserta }}</td>
              <td class='column-id_ruang'>{{ $pemesananRuangan->ruang['nama_ruang'] }}</td>
              <td class='column-id_ruang'>{{ $pemesananRuangan->design_ruangan }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  @endcomponent
  @endif
  @if (Auth::user()->role == 'adminkendaraan')
    <div class="row">
      <a href="{{url('admin/permohonan-pemakaian-kendaraan')}}" class="col-md-6">
        @include('admin::partials.infobox', [
          'icon' => 'directions_car',
          'count' => $kendaraan->count(),
          'label' => 'Permohonan Kendaraan',
          'hover_effect' => 'zoom',
          'icon_classes' => 'bg-blue',
        ])
      </a>
      <a href="{{url('admin/surat-perintah-jalan')}}" class="col-md-6">
        @include('admin::partials.infobox', [
          'icon' => 'directions_walk',
          'count' => $spj->count(),
          'label' => 'Surat Perintah Jalan',
          'hover_effect' => 'zoom',
          'icon_classes' => 'bg-blue',
        ])
      </a>
    </div>
    <div class="block-header">
      <h2>Rangkuman Berjalan Aplikasi Pelayanan Umum</h2>
    </div>
      @component('admin::partials.card', [
      'title' => 'Permohonan Kendaraan',
      'description' => ''
        ])
      @slot('header_dropdown')
      <ul class="header-dropdown m-r--5">
        <a href="{{url('admin/permohonan-pemakaian-kendaraan')}}" class="btn btn-primary">Semua</a>
      </ul>
      @endslot

      <div class="table-responsive">
          <table id="my-table2" class="table table-bordered">
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
              </tr>
            </thead>
            <tbody>
              @foreach($kendaraan as $i => $permohonanPemakaianKendaraan)
            
                <tr>
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
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    @endcomponent
      @component('admin::partials.card', [
      'title' => 'Surat Perintah Jalan',
      'description' => ''
        ])
      @slot('header_dropdown')
      <ul class="header-dropdown m-r--5">
        <a href="{{url('admin/surat-perintah-jalan')}}" class="btn btn-primary">Semua</a>
      </ul>
      @endslot

        <div class="table-responsive">
          <table id="my-table4" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th width="20" class="text-center column-number">No</th>
                <!-- <th class='column-nopol_kendaraan'>Nopol Kendaraan</th> -->
                <!-- <th class='column-jenis'>Jenis</th> -->
                <th class='column-nama_pengemudi'>Nama Pengemudi</th>
                <th class='column-nama_pengemudi'>Nama Kendaraan</th>
                <th class='column-nama_pengemudi'>Nomor Polisi</th>
                <th class='column-tujuan'>Tujuan</th>
                {{-- <th class='column-lama_perjalanan'>Lama Perjalanan</th> --}}
                <th class='column-tanggal_berangkat'>Tanggal Berangkat</th>
                <th class='column-tanggal_kembali'>Tanggal Kembali</th>
                <th class='column-jam_berangkat'>Jam Berangkat</th>
                <th class='column-jam_kembali'>Jam Kembali</th>
              </tr>
            </thead>
            <tbody>
              @foreach($spj as $i => $suratPerintahJalan)
          
              <tr>
                <td class="text-center column-number">{{ $loop->iteration }}</td>
                <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->driver->nama_driver ?? '' }}</td>
                <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->kendaraan->nama_kendaraan ?? 'Tanpa Kendaraan' }}</td>
                <td class='column-nama_pengemudi'>{{ $suratPerintahJalan->kendaraan->no_pol ?? 'Tanpa Kendaraan' }}</td>
                <td class='column-tujuan'>{{ $suratPerintahJalan->tujuan }}</td>
                <td class='column-tanggal_berangkat'>{{ $suratPerintahJalan->tanggal_berangkat }}</td>
                <td class='column-tanggal_kembali'>{{ $suratPerintahJalan->tanggal_kembali }}</td>
                <td class='column-jam_berangkat'>{{ $suratPerintahJalan->jam_berangkat }}</td>
                <td class='column-jam_kembali'>{{ $suratPerintahJalan->jam_kembali }}</td>
              @endforeach
            </tbody>
          </table>
        </div>
    @endcomponent
  @endif
  

@stop