@extends('admin::layout.master')

@section('content')
<div class="block-header">
    <h2>List Permohonan Atk</h2>
</div>
@include('admin::partials.alert-messages')
<div class="card card-grid">
	<div class="header">
		<div class="row">
			<div class="col-md-9 no-margin">
				<a class="btn btn-success" href="{{ route('admin::permohonan-atk.form-create') }}">Create</a>
			</div>
			<div class="col-md-3 no-margin">
				<form method="GET">
					<div class="form-group" style="margin:0px">
						<div class="input-group" style="margin:0px">
							<div class="form-line">
								<input name="keyword" class="form-control" placeholder="Search something ..." value="{{ request('keyword') }}"/>
							</div>
							<div class="input-group-btn">
								<button class="btn btn-info">Search</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="body">
		@if($pagination->items())
		<div class="table-responsive">
		  <table id="table-permohonan_atk" class="table table-bordered table-striped table-hover">
		    <thead>
		      <tr>
		        <th width="20" class="text-center column-number">No</th>
		        <th class='column-jumlah'>Jumlah</th>
		        <th class='column-nama_barang'>Nama Barang</th>
		        <th class='column-jumlah_diberikan'>Jumlah Diberikan</th>
		        <th class='column-keterangan'>Keterangan</th>
		        <th class='column-pemohon'>Pemohon</th>
		        <th class='column-bagian'>Bagian</th>
		        <th class='column-penanggung_jawab'>Status Penanggung Jawab</th>
		        <th class="text-center column-action">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @if(!$pagination->count())
		      <tr>
		        <td colspan="9" class="text-center">
		          Records empty.
		        </td>
		      </tr>
		      @endif
		      @foreach($pagination->items() as $i => $permohonanAtk)
		      <tr>
		        <td class="text-center column-number">{{ $pagination->firstItem() + $i }}</td>
		        <td class='column-jumlah'>{{ $permohonanAtk->jumlah }}</td>
				@php
                $barang = App\Models\Barang::where('id',$permohonanAtk->nama_barang)->first();
                @endphp
                <td>{{ $barang->nama_barang }}</td>
                <td class='column-jumlah_diberikan'>{{ $permohonanAtk->jumlah_diberikan }}</td>
		        <td class='column-keterangan'>{{ $permohonanAtk->keterangan }}</td>
		        <td class='column-pemohon'>{{ $permohonanAtk->pemohon }}</td>
		        <td class='column-bagian'>{{ $permohonanAtk->bagian }}</td>
		        <td class='column-penanggung_jawab'>{{ $permohonanAtk->status_pj }}</td>
		        <td width="200" class="text-center column-action">
		          <a class="btn btn-sm btn-edit btn-primary" href="{{ route('admin::permohonan-atk.form-edit', [$permohonanAtk->getKey()]) }}">Edit</a>
		          <a class="btn btn-sm btn-delete btn-danger" href="{{ route('admin::permohonan-atk.delete', [$permohonanAtk->getKey()]) }}">Delete</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
		{!! $pagination->links() !!}
		@else
		<div class="well well-sm">
			Permohonan Atk empty
		</div>
		@endif
	</div>
</div>
@stop
