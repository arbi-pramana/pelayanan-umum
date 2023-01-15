@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Surat Perintah Jalan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::surat-perintah-jalan.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::surat-perintah-jalan.form-edit', [$suratPerintahJalan['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->id }}</td>
				</tr>
				<!-- Column nopol_kendaraan -->
				<tr>
				  <td width="200" class="field-name"><strong>Nopol Kendaraan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->nopol_kendaraan }}</td>
				</tr>
				<!-- Column jenis -->
				<tr>
				  <td width="200" class="field-name"><strong>Jenis</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->jenis }}</td>
				</tr>
				<!-- Column nama_pengemudi -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama Pengemudi</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->nama_pengemudi }}</td>
				</tr>
				<!-- Column tujuan -->
				<tr>
				  <td width="200" class="field-name"><strong>Tujuan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->tujuan }}</td>
				</tr>
				<!-- Column lama_perjalanan -->
				<tr>
				  <td width="200" class="field-name"><strong>Lama Perjalanan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->lama_perjalanan }}</td>
				</tr>
				<!-- Column tanggal_berangkat -->
				<tr>
				  <td width="200" class="field-name"><strong>Tanggal Berangkat</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->tanggal_berangkat }}</td>
				</tr>
				<!-- Column tanggal_kembali -->
				<tr>
				  <td width="200" class="field-name"><strong>Tanggal Kembali</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->tanggal_kembali }}</td>
				</tr>
				<!-- Column jam_berangkat -->
				<tr>
				  <td width="200" class="field-name"><strong>Jam Berangkat</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->jam_berangkat }}</td>
				</tr>
				<!-- Column jam_kembali -->
				<tr>
				  <td width="200" class="field-name"><strong>Jam Kembali</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->jam_kembali }}</td>
				</tr>
				<!-- Column pengisian_bbm -->
				<tr>
				  <td width="200" class="field-name"><strong>Pengisian Bbm</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->pengisian_bbm }}</td>
				</tr>
				<!-- Column penanggung_jawab -->
				<tr>
				  <td width="200" class="field-name"><strong>Penanggung Jawab</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->penanggung_jawab }}</td>
				</tr>
				<!-- Column penanggung_jawab_pool -->
				<tr>
				  <td width="200" class="field-name"><strong>Penanggung Jawab Pool</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $suratPerintahJalan->penanggung_jawab_pool }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
