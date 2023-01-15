@extends('front.baru.master')

@section('content')
<div data-stellar-background-ratio="0.5" id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});">
  <div class="overlay">
  </div>
  <div class="container" style="padding: 15px 0px; color: white;">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
        <h2 style="color: white;">
          List Permohonan Kendaraan
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="container" style="padding-top: 30px;">
  <div class="tab-content" id="colorlib-reservation">
    <div class="header">
      <div class="row">
        <div class="col-md-9 no-margin">
          {{--
          <a class="btn btn-success" href="{{ route('admin::pemesanan-ruangan.form-create') }}">
            Create
          </a>
          --}}
        </div>
        <div class="col-md-3 no-margin">
          <form method="GET">
            <div class="form-group" style="margin:0px">
              <div class="input-group" style="margin:0px">
                <div class="form-line">
                  <input class="form-control" name="keyword" placeholder="Search something ..." value="{{ request('keyword') }}"/>
                </div>
                <div class="input-group-btn">
                  <button class="btn btn-info">
                    Search
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    	@if(session('info'))
			<div class="alert alert-info">{{ session('info') }}</div>
    	@endif
    	@if(session('danger'))
			<div class="alert alert-danger">{{ session('danger') }}</div>
    	@endif
      <div class="body">
        @if($pagination->items())
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover" id="table-pemesanan_ruangan">
            <thead>
              <tr>
                <th class="text-center column-number" width="20">
                  No
                </th>
                <th class="column-pemohon">
                  Pemohon
                </th>
                <th class="column-tujuan">
                  Tujuan
                </th>
                <th class="column-keperluan">
                  Keperluan
                </th>
                <th class="column-penanggung_jawab">
                  Penanggung Jawab
                </th>
                <th class="column-tanggal_berangkat">
                  Tanggal Berangkat
                </th>
                <th class="column-tanggal_kembali">
                  Tanggal Kembali
                </th>
                <th class="column-jam_berangkat">
                  Jam Berangkat
                </th>
                <th class="column-jam-kembali">
                  Jam Kembali
                </th>
                <th class="column-status_pj">
                  Status Penanggung Jawab
                </th>
                <th class="text-center column-action">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @if(!$pagination->count())
              <tr>
                <td class="text-center" colspan="15">
                  Records empty.
                </td>
              </tr>
              @endif
					    @foreach($pagination->items() as $i => $permohonanPemakaianKendaraan)
              <tr>
                <td class="text-center column-number">
                  {{ $pagination->firstItem() + $i }}
                </td>
                <td class="column-pemohon">
                  {{ $permohonanPemakaianKendaraan->pemohon }}
                </td>
                <td class="column-tujuan">
                  {{ $permohonanPemakaianKendaraan->tujuan }}
                </td>
                <td class="column-keperluan">
                  {{ $permohonanPemakaianKendaraan->keperluan }}
                </td>
                <td class="column-penanggung_jawab">
                  {{ $permohonanPemakaianKendaraan->nama_penanggung_jawab }}
                </td>
                <td class="column-tanggal_berangkat">
                  {{ $permohonanPemakaianKendaraan->tanggal_berangkat }}
                </td>
                <td class="column-tanggal_kembali">
                  {{ $permohonanPemakaianKendaraan->tanggal_kembali }}
                </td>
                <td class="column-jam_berangkat">
                  {{ $permohonanPemakaianKendaraan->jam_berangkat }}
                </td>
                <td class="column-jam_kembali">
                  {{ $permohonanPemakaianKendaraan->jam_kembali }}
                </td>
                <td class="column-status_pj">
                  {{ $permohonanPemakaianKendaraan->status_pj }}
                </td>
                <td class="text-center column-action" width="200">
                  <a href="{{ route('permohonankendaraan.edit', $permohonanPemakaianKendaraan->id) }}" class="btn btn-info btn-sm">Edit</a>
                  <a onclick="return confirm('Apa anda yakin ingin menghapus permohonan ini?')" href="{{ route('permohonankendaraan.destroy', $permohonanPemakaianKendaraan->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {!! $pagination->links() !!}
				@else
        <div class="well well-sm">
          Permohonan Kendaraan empty
        </div>
        @endif
      </div>
    </br>
  </div>
</div>
<!-- /.container -->
@stop
