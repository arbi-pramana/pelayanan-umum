@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>Detail Karyawan</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<a href="{{ route('admin::karyawan.page-list') }}" class="btn btn-default">Back to list</a>
		<a href="{{ route('admin::karyawan.form-edit', [$karyawan['id']]) }}" class="btn btn-primary">Edit</a>
	</div>
	<div class="body">
		<div class="table-responsive">
			<table class="table table-detail table-hover">
				<!-- Column id -->
				<tr>
				  <td width="200" class="field-name"><strong>Id</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->id }}</td>
				</tr>
				<!-- Column nama -->
				<tr>
				  <td width="200" class="field-name"><strong>Nama</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->nama }}</td>
				</tr>
				<!-- Column nama_tanpa_gelar -->
				<tr>
				  <td width="200" class="field-name"><strong>No. Induk</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->nama_tanpa_gelar }}</td>
				</tr>
				<!-- Column no_induk -->
				<tr>
				  <td width="200" class="field-name"><strong>No. Induk</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->no_induk }}</td>
				</tr>
				<!-- Column nid -->
				<tr>
				  <td width="200" class="field-name"><strong>NID</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->nid }}</td>
				</tr>
				<!-- Column jabatan -->
				<tr>
				  <td width="200" class="field-name"><strong>Jabatan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->jabatan }}</td>
				</tr>
				<!-- Column bidang -->
				<tr>
				  <td width="200" class="field-name"><strong>Bidang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->bidang }}</td>
				</tr>
				<!-- Column sub_bidang -->
				<tr>
				  <td width="200" class="field-name"><strong>Sub Bidang</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->sub_bidang }}</td>
				</tr>
				<!-- Column grade -->
				<tr>
				  <td width="200" class="field-name"><strong>Grade</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->grade }}</td>
				</tr>
				<!-- Column jenis_kelamin -->
				<tr>
				  <td width="200" class="field-name"><strong>Jenis Kelamin</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->jenis_kelamin }}</td>
				</tr>
				<!-- Column pendidikan -->
				<tr>
				  <td width="200" class="field-name"><strong>Pendidikan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->pendidikan }}</td>
				</tr>
				<!-- Column universitas -->
				<tr>
				  <td width="200" class="field-name"><strong>Universitas</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->universitas }}</td>
				</tr>
				<!-- Column password -->
				<tr>
				  <td width="200" class="field-name"><strong>Password</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->password }}</td>
				</tr>
				<!-- Column id_atasan -->
				<tr>
				  <td width="200" class="field-name"><strong>ID Atasan</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->id_atasan }}</td>
				</tr>
				<!-- Column id_supervisor -->
				<tr>
				  <td width="200" class="field-name"><strong>ID Supervisor</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->id_supervisor }}</td>
				</tr>
				<!-- Column id_manajer -->
				<tr>
				  <td width="200" class="field-name"><strong>ID Manajer</strong></td>
				  <td width="10" class="text-center">:</td>
				  <td class="field-value">{{ $karyawan->id_manajer }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
