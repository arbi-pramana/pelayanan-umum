@extends('front.baru.master')
@section('content')
<div class="gap"></div>
<div class="container">
    <div class="row row-wrap">
        <div class="col-md-12">
            <h4>Formulir Permohonan Konsumsi</h4>    
            @if(isset($info))
            <form action="{{ route('permohonankonsumsi.submit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>No Pemesanan Ruangan <span style="color:red;">*</span></label>
                        <input name="no_permohonan_konsumsi" type="hidden" placeholder="Tanggal Acara" required
                             value="{{$info->id}}" />
                        <input class="form-control" type="text" placeholder="Tanggal Acara" required
                             value="{{$info->no_pemesanan_ruangan}}" readonly/>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Tanggal <span style="color:red;">*</span> </label>
                        <input class="form-control" name="tanggal" type="date" placeholder="Tanggal Acara" required
                             value="{{$info->tanggal}}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Tanggal Selesai <span style="color:red;">*</span> </label>
                        <input class="form-control" name="tanggal_selesai" type="date" placeholder="Tanggal Acara" required
                             value="{{$info->tanggal_selesai}}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Jumlah Konsumsi <span style="color:red;">*</span></label>
                        <input class="form-control" name="jumlah" placeholder="Jumlah" type="number"
                            required  />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sumber Dana <span style="color:red;">*</span></label>
                        <input class="form-control" name="sumber_dana"  placeholder="Sumber Dana"
                        required  />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Nama Acara <span style="color:red;">*</span> </label>
                        <input type="text" name="kegiatan" class="form-control" placeholder="Masukkan Nama Acara"
                             value="{{$info->nama_acara}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Jumlah Peserta <span style="color:red;">*</span> </label>
                        <input type="text" name="jumlah_peserta" class="form-control" placeholder="Masukkan Jumlah Peserta"
                             value="{{$info->jumlah_peserta}}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ruang <span style="color:red;">*</span></label>
                        <input type="text" name="ruang" class="form-control" placeholder="Masukkan Nama Ruang" value="{{$info->ruang['nama_ruang']}}" required readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Pemohon <span style="color:red;">*</span></label>
                        <input type="hidden" name="pemohon_id" value="{{ $pemohon['id'] }}">
                        <input type="text" name="pemohon" class="form-control" placeholder="Masukkan Nama Ruang" value="{{ $pemohon['nama'] }}"
                            readonly>
                            
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Attachment <span style="color:red;">*</span></label>
                        <input class="form-control" accept=".xls,.xlsx,.pdf" name="attachment" type="file" required/>
                        {{-- @if($errors->has('attachment'))
                        <div class="error text-danger">{{ $errors->first('attachment') }}</div>
                        @else --}}
                        <small id="" class="form-text text-danger">File attachment maksimal sebesar 2MB</small>
                        {{-- @endif --}}
                    </div>
                    <div class="form-group col-md-3">
                        <label>Jenis Konsumsi <span style="color:red;">*</span></label>
                            <select name="jenis_konsumsi" class="form-control" required>
                                <option>Snack Pagi + Makan Siang + Snack Sore + Makan Malam</option>
                                <option>Snack Pagi + Makan Siang</option>
                                <option>Snack Sore + Makan Malam</option>
                                <option>Snack Pagi</option>
                                <option>Snack Sore</option>
                                <option>Makan Siang</option>
                                <option>Makan Malam</option>
                                <option>Kupon</option>
                            </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                    </div>
                </div>
                <div class="text-right">
                    <input class="btn btn-primary" type="submit" value="Kirim Permintaan" />
                </div>
            </form>
            @else
            <form action="{{ route('permohonankonsumsi.submit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-3">
                        @php
                        $prs = App\Models\PemesananRuangan::whereHas('konsumsi', function( $query ){
                         $query->where('permohonan_konsumsi.status_pj', 'Rejected');
                        })
                        ->whereDoesntHave('konsumsi',function($query){
                            $query->where('permohonan_konsumsi.status_pj','!=','Rejected');
                        })
                        ->orWhereDoesntHave('konsumsi')
                        ->where('pemesanan_ruangan.pemohon_id',\Auth::guard('front')->user()->id)
                        ->get();
                        @endphp
                        <label>No Pemesanan Ruangan</label>
                        <select name="no_permohonan_konsumsi" class="form-control" onchange="changeFunc(value);"
                            required>
                            <option value="" disabled selected>pilih satu</option>
                            <option value="0">Tanpa Ruangan</option>
                            @foreach($prs as $pr)
                            @if(old('no_permohonan_konsumsi') == $pr->id )
                            <option selected value="{{$pr->id}}">{{$pr->no_pemesanan_ruangan}}</option>
                            @else
                            <option value="{{$pr->id}}">{{$pr->no_pemesanan_ruangan}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Tanggal <span style="color:red;">*</span></label>
                        <input class="form-control" name="tanggal" type="date" placeholder="Tanggal Acara" required value="{{old('tanggal')}}"
                             />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Tanggal Selesai<span style="color:red;">*</span></label>
                        <input class="form-control" name="tanggal_selesai" type="date" placeholder="Tanggal Selesai" required value="{{old('tanggal_selesai')}}"
                             />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Jumlah Konsumsi <span style="color:red;">*</span></label>
                        <input class="form-control" name="jumlah" placeholder="Jumlah" type="number"
                            required value="{{old('jumlah')}}"  />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sumber Dana <span style="color:red;">*</span></label>
                        <input class="form-control" name="sumber_dana"  placeholder="Sumber Dana"
                        required value="{{old('sumber_dana')}}"  />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Nama Acara <span style="color:red;">*</span></label>
                        <input type="text" name="kegiatan" class="form-control" placeholder="Masukkan Nama Acara" required value="{{old('kegiatan')}}"
                            >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Jumlah Peserta <span style="color:red;">*</span></label>
                        <input type="text" name="jumlah_peserta" class="form-control" placeholder="Masukkan Jumlah Peserta" required value="{{old('jumlah_peserta')}}"
                            >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ruang</label>
                        <input type="text" name="ruang" class="form-control" placeholder="Masukkan Nama Ruang" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Pemohon</label>
                        <input name="pemohon_id" type="hidden" value="{{ $pemohon['id'] }}"/>
                        <input type="text" name="pemohon" class="form-control" placeholder="Masukkan Nama Ruang" value="{{ $pemohon['nama'] }}" readonly
                            >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Attachment <span style="color:red;">*</span></label>
                        <input class="form-control" accept=".xls,.xlsx,.pdf" name="attachment" type="file" required/>
                        @if($errors->has('attachment'))
                        <div class="error text-danger" >{{ $errors->first('attachment') }}</div>
                        @else
                        <small id="" class="form-text text-danger">File attachment maksimal sebesar 2MB</small>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label>Jenis Konsumsi <span style="color:red;">*</span></label>
                        <select name="jenis_konsumsi" class="form-control" required>
                            <option selected disabled>Pilih Jenis Konsumsi</option>
                            <option>Snack Pagi + Makan Siang + Snack Sore + Makan Malam</option>
                            <option>Snack Pagi + Makan Siang</option>
                            <option>Snack Sore + Makan Malam</option>
                            <option>Snack Pagi</option>
                            <option>Snack Sore</option>
                            <option>Makan Siang</option>
                            <option>Makan Malam</option>
                            <option>Kupon</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" value="{{old('keterangan')}}">
                    </div>
                </div>
                <div class="text-right">
                    <input class="btn btn-primary" type="submit" value="Kirim Permintaan" />
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function changeFunc(value) {
        $.ajax({
            url: "{{url('api/permohonankonsumsi/')}}?id=" + value,
           
            success: function (result) {

                console.log(result);
                $("[name='kegiatan']").val(result.nama_acara);
                $("[name='tanggal']").val(result.tanggal);
                $("[name='tanggal_selesai']").val(result.tanggal_selesai);
                $("[name='jam']").val(result.waktu_awal);
                $("[name='jumlah_peserta']").val(result.jumlah_peserta);
                $("[name='ruang']").val(result.nama_ruang);
                $("[name='jenis_konsumsi']").val(result.makanan);
            }
        });
    }
</script>
@endsection