@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Pemesanan Ruangan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::pemesanan-ruangan.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::pemesanan-ruangan.approve', [$pemesananRuangan['id']]) }}" class="btn btn-success">Approve</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column no_pemesanan_ruangan -->
				<tr>
				  <td width="200" class="field-name"><strong>No Pemesanan Ruangan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->no_pemesanan_ruangan }}</td>
				</tr>
				<!-- Column tanggal -->
				<tr>
				  <td width="200" class="field-name"><strong>Tanggal</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->tanggal }}</td>
				</tr>
				<!-- Column nama_acara -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Acara</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->nama_acara }}</td>
				</tr>
				<!-- Column pemohon -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Pemohon</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->pemohon }}</td>
				</tr>
				<!-- Column waktu-awal -->
				<tr>
				  <td width="200" class="field-name"><strong>Waktu Awal</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ date('H:i',$pemesananRuangan->waktu_awal) }}</td>
				</tr>
				<!-- Column waktu-akhir -->
				<tr>
				  <td width="200" class="field-name"><strong>Waktu Akhir</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ date('H:i',$pemesananRuangan->waktu_akhir) }}</td>
				</tr>
				<!-- Column jumlah_peserta -->
				<tr>
				  <td width="200" class="field-name"><strong>Jumlah Peserta</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->jumlah_peserta }}</td>
				</tr>
				<!-- Column id_ruang -->
				<tr>
				  <td width="200" class="field-name"><strong>Ruangan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->ruang['nama_ruang'] }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Design Ruangan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->design_ruangan }}</td>
				</tr>
				<!-- Column file_attachment -->
				<tr>
				  <td width="200" class="field-name"><strong>Attachment</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">
				    <a target="_blank" href="{{asset('pemesanan_ruangan/attachment/'.$pemesananRuangan->attachment) }}" download>Click Here</a>
				  </td>
				</tr>
				<!-- Column id_ruang -->
				<tr>
				  <td width="200" class="field-name"><strong>Status</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->status_pj }}</td>
				</tr>
				<!-- Column keterangan -->
				<tr>
				  <td width="200" class="field-name"><strong>Keterangan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $pemesananRuangan->keterangan }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
