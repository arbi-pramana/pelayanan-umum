<?php

namespace App\Http\Controllers\Front;

use Auth;
use App\Models\Karyawan;
use App\Models\SumberDana;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PemesananRuangan;
use App\Http\Controllers\Controller;

class FormRuangController extends Controller
{
    
    public function submit(Request $req)
    {
        $pemohon = Karyawan::where('nama', $req->get('pemohon'))->first();

        if($req->hasFile('attachment')){
            $file= $req->file('attachment');
            $image_name = $file->getClientOriginalName();
            $file->move(public_path('pemesanan_ruangan/attachment/'),$image_name);
         
        }else{
            $image_name = null;
        }
        
        $date = explode(' - ',$req->range_date);
        
        $pemesananRuangan = new PemesananRuangan;
        $pemesananRuangan->no_pemesanan_ruangan = $req->get('no_pemesanan_ruangan');
        $pemesananRuangan->tanggal = $date[0];
        $pemesananRuangan->tanggal_selesai =  $date[1];
        $pemesananRuangan->pemohon = $req->get('pemohon');
        $pemesananRuangan->pemohon_id = $req->get('pemohon_id');
        $pemesananRuangan->nama_acara =$req->get('nama_acara');
        $pemesananRuangan->nama_pemesan =$req->get('nama_pemesan');
        $pemesananRuangan->waktu_awal =strtotime($req->get('waktu_awal'));
        $pemesananRuangan->waktu_akhir =strtotime($req->get('waktu_akhir'));
        $pemesananRuangan->jumlah_peserta =$req->get('jumlah_peserta');
        $pemesananRuangan->id_ruang = $req->get('id_ruang');
        $pemesananRuangan->attachment = $image_name;
        $pemesananRuangan->keterangan =$req->get('keterangan');
        $pemesananRuangan->design_ruangan =$req->get('design_ruangan');
        $pemesananRuangan->status_pj = 'Pending';
        $pemesananRuangan->status_supervisor = 'Pending';
        $pemesananRuangan->status_manajer = 'Pending';
        if (!empty($req->get('subruang'))) {
            $pemesananRuangan->child_ruang = implode(";", $req->get('subruang'));
        } else {
            $pemesananRuangan->child_ruang = "";
        }
        $pemesananRuangan->save();

        $notifications = new Notification;
        $notifications->pemesanan_ruangan_id = $pemesananRuangan->id;
        $notifications->status = false;
        $notifications->save();

        if ($req->get('konsumsi') == 'Ya') {
            $array_sumber_dana = SumberDana::get()->toArray();
            $id = \Auth::guard('front')->id();
            $pemohon = Karyawan::where('id', $id)->first();
            $info = PemesananRuangan::where('no_pemesanan_ruangan', $req->get('no_pemesanan_ruangan'))->first();
            $info['no_pemesanan_ruangan'] = str_replace('PR', 'PK', $req->get('no_pemesanan_ruangan'));

            $getJam = strtotime($info->waktu_awal);
            $jam = date("H", $getJam);
            if ($jam >= 12 || $jam <= 13) {
                $info['makanan'] = 'Makan Siang';
            } else {
                $info['makanan'] = 'Snack';
            }
            return view('front.baru.konsumsi.create')->with(compact('array_sumber_dana', 'pemohon', 'info'));
        } else {
            return redirect()->route('list-peminjaman-ruang');
        }
    }
}
