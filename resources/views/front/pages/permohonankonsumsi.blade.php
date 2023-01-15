@extends('front.layout.master-content')
@section('content')     
<div id="colorlib-subscribe" style="background-image: url({{ asset('vendor/home/images/room-1.jpg') }});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
            <h2>Form Permohonan Konsumsi</h2>
         </div>
      </div>
   </div>
</div>
<div id="colorlib-reservation">
   <div class="tab-content">
      @if(isset($info))
      <form action="{{ route('permohonankonsumsi.submit') }}" method="POST" class="colorlib-form">
         {!! csrf_field() !!}
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="no_pemesanan_ruangan">No. Permohonan Ruangan</label>
                  <div class="form-field">
                     <input name="no_permohonan_konsumsi" class="form-control" readonly="" value="{{$info->no_pemesanan_ruangan}}">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <div class="form-field">
                     <i class="icon icon-calendar2"></i>
                     <input type="text" name="tanggal" class="form-control" placeholder="Tanggal Acara" value="{{$info->tanggal}}" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="date">Waktu Pengantaran</label>
                  <div class="form-field">
                     <i class="icon icon-calendar2"></i>
                     <input type="time" name="jam" id="waktu" class="form-control time" placeholder="Waktu Acara" value="{{$info->waktu_awal}}" readonly="">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="sumber_dana">Sumber Dana</label>
                  <div class="form-field">
                     <select class="form-control" id="sumber_dana" name="sumber_dana">
                        @foreach($array_sumber_dana as $dana)
                        <option value="{{ $dana['id'] }}" style="color:#000;">
                           {{ $dana["nama_sumber_dana"] }}
                        </option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="nama_acara">Nama Kegiatan</label>
                  <div class="form-field">
                     <input type="text" name="kegiatan"  class="form-control" placeholder="Masukkan Nama Acara" value="{{$info->nama_acara}}" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="jenis_konsumsi">Jenis Konsumsi</label>
                  <div class="form-field">
                     <input class="form-control" id="jenis_konsumsi" name="jenis_konsumsi" value="{{$info->makanan}}">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="jumlah_peserta">Jumlah Peserta</label>
                  <div class="form-field">
                     <input type="text" name="jumlah_peserta"  class="form-control" placeholder="Masukkan Jumlah Peserta" value="{{$info->jumlah_peserta}}" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="ruang">Ruang</label>
                  <div class="form-field">
                     <input type="text" name="ruang" class="form-control" placeholder="Masukkan Nama Ruang" value="{{$info->id_ruang}}" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="pemohon">Pemohon</label>
                  <div class="form-field">
                     <input type="text" name="pemohon"  class="form-control" placeholder="Masukkan Nama Ruang" value="{{ $pemohon['nama'] }}" readonly="">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-10">
               <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <div class="form-field">
                     <input type="text" name="keterangan"  class="form-control" placeholder="Masukkan Keterangan">
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-block">
            </div>
         </div>
      </form>
      @else
      <form action="{{ route('permohonankonsumsi.submit') }}" method="POST" class="colorlib-form">
         {!! csrf_field() !!}
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="no_pemesanan_ruangan">No. Permohonan Konsumsi</label>
                  <div class="form-field">
                     @php
                     $prs = App\Models\PemesananRuangan::get();
                     @endphp
                     <select name="no_permohonan_konsumsi" class="form-control" onchange="changeFunc(value);">
                        @foreach($prs as $pr)
                        <option value="{{$pr->id}}"style="color:#000;">{{$pr->no_pemesanan_ruangan}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <div class="form-field">
                     <i class="icon icon-calendar2"></i>
                     <input type="text" name="tanggal" class="form-control" placeholder="Tanggal Acara" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="date">Waktu Pengantaran</label>
                  <div class="form-field">
                     <i class="icon icon-calendar2"></i>
                     <input type="time" name="jam" id="waktu" class="form-control time" placeholder="Waktu Acara" readonly="">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="sumber_dana">Sumber Dana</label>
                  <div class="form-field">
                     <select  class="form-control" id="sumber_dana" name="sumber_dana">
                        @foreach($array_sumber_dana as $dana)
                        <option value="{{ $dana['id'] }}"style="color:#000;">
                           {{ $dana["nama_sumber_dana"] }}
                        </option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="nama_acara">Nama Kegiatan</label>
                  <div class="form-field">
                     <input type="text" name="kegiatan" class="form-control" placeholder="Masukkan Nama Acara" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="jenis_konsumsi">Jenis Konsumsi</label>
                  <div class="form-field">
                     <select name="jenis_konsumsi" class="form-control">
                        <option style="color: black" value="snack">Snack</option>
                        <option style="color: black" value="makan siang">Makan Siang</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="jumlah_peserta">Jumlah Peserta</label>
                  <div class="form-field">
                     <input type="text" name="jumlah_peserta" class="form-control" placeholder="Masukkan Jumlah Peserta" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="ruang">Ruang</label>
                  <div class="form-field">
                     <input type="text" name="ruang"  class="form-control" placeholder="Masukkan Nama Ruang" readonly="">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="pemohon">Pemohon</label>
                  <div class="form-field">
                     <input type="text" name="pemohon"  class="form-control" placeholder="Masukkan Nama Ruang" value="{{ $pemohon['nama'] }}" readonly="">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-10">
               <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <div class="form-field">
                     <input type="text" name="keterangan"  class="form-control" placeholder="Masukkan Keterangan">
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-block">
            </div>
         </div>
      </form>
      @endif  
   </div>
</div>
<script>
   function changeFunc(value){
     $.ajax({
       url: "{{url('api/permohonankonsumsi/')}}?id="+value,
       
       success: function(result){
         console.log(result);
         $("[name='kegiatan']").val(result.nama_acara);
         $("[name='tanggal']").val(result.tanggal);
         $("[name='jam']").val(result.waktu_awal);
         $("[name='jumlah_peserta']").val(result.jumlah_peserta);
         $("[name='ruang']").val(result.nama_ruang);
         $("[name='jenis_konsumsi']").val(result.makanan);
       }
     });
   }
</script>
@stop