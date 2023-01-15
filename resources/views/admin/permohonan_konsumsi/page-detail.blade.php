@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Permohonan Konsumsi</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::permohonan-konsumsi.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::permohonan-konsumsi.approve', [$permohonanKonsumsi['id']]) }}" class="btn btn-success">Approve</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column no_permohonan_konsumsi -->
				<tr>
				  <td width="200" class="field-name"><strong>No Permohonan Konsumsi</strong></td>
				  <td width="10" class="text-center">:</td>
				  @if ($permohonanKonsumsi->no_permohonan_konsumsi == 0)
				  <td class="field-value">Tanpa Ruangan</td>
				  @else
				  <td class="field-value">{{ $permohonanKonsumsi->nomor['no_pemesanan_ruangan'] }}</td>
				  @endif
				</tr>
				<!-- Column tanggal -->
				<tr>
				  <td width="200" class="field-name"><strong>Tanggal</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->tanggal }}</td>
				</tr>
				<!-- Column jam -->
				<tr>
				  <td width="200" class="field-name"><strong>Jumlah </strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->jumlah }}</td>
				</tr>
				<!-- Column sumber_dana -->
				<tr>
				  <td width="200" class="field-name"><strong>Sumber Dana</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->sumber_dana }}</td>
				</tr>
				<!-- Column kegiatan -->
				<tr>
				  <td width="200" class="field-name"><strong>Kegiatan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->kegiatan }}</td>
				</tr>
				<!-- Column jenis_konsumsi -->
				<tr>
				  <td width="200" class="field-name"><strong>Jenis Konsumsi</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->jenis_konsumsi }}</td>
				</tr>
				<!-- Column jumlah -->
				<tr>
				  <td width="200" class="field-name"><strong>Jumlah</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->jumlah }}</td>
				</tr>
				<!-- Column pemohon -->
				<tr>
				  <td width="200" class="field-name"><strong>Pemohon</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->pemohon }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Status</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->status_pj }}</td>
				</tr>
				<tr>
				  <td width="200" class="field-name"><strong>Status Terlaksana</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->status_pelaksana }}</td>
				</tr>
				<!-- Column keterangan -->
				<tr>
				  <td width="200" class="field-name"><strong>Keterangan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $permohonanKonsumsi->keterangan }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
