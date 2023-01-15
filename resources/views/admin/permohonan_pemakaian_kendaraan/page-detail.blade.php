@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Permohonan Pemakaian Kendaraan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::permohonan-pemakaian-kendaraan.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::permohonan-pemakaian-kendaraan.approve', [$permohonanPemakaianKendaraan['id']]) }}" class="btn btn-success">Approve</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column pemohon -->
				<tr>
				  <td width="200" class="field-name"><strong>Pemohon</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->pemohon }}</td>
				</tr>
				<!-- Column tujuan -->
				<tr>
				  <td width="200" class="field-name"><strong>Tujuan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->tujuan }}</td>
				</tr>
				<!-- Column keperluan -->
				<tr>
				  <td width="200" class="field-name"><strong>Keperluan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->keperluan }}</td>
				</tr>
				<!-- Column tanggal_berangkat -->
				<tr>
				  <td width="200" class="field-name"><strong>Tanggal Berangkat</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->tanggal_berangkat }}</td>
				</tr>
				<!-- Column tanggal_kembali -->
				<tr>
				  <td width="200" class="field-name"><strong>Tanggal Kembali</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->tanggal_kembali }}</td>
				</tr>
				<!-- Column jam_berangkat -->
				<tr>
				  <td width="200" class="field-name"><strong>Jam Berangkat</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->jam_berangkat }}</td>
				</tr>
				<!-- Column jam_kembali -->
				<tr>
				  <td width="200" class="field-name"><strong>Jam Kembali</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->jam_kembali }}</td>
				</tr>
				<!-- Column penanggung_jawab -->
				<tr>
				  <td width="200" class="field-name"><strong>Pemesan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->penanggung_jawab }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Status</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanPemakaianKendaraan->status_pj }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
