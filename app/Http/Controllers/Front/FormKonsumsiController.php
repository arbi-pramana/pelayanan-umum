<?php

namespace App\Http\Controllers\Front;

use App\Models\Karyawan;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PermohonanKonsumsi;
use App\Http\Controllers\Controller;

class FormKonsumsiController extends Controller
{
    
    public function submit(Request $req)
    {
        $pemohon = Karyawan::where('nama', $req->get('pemohon'))->first();
        // dd($pemohon);
        $permohonanKonsumsi = new PermohonanKonsumsi;
        $permohonanKonsumsi->no_permohonan_konsumsi = str_replace("PR", "PK", $req->get('no_permohonan_konsumsi'));
        $permohonanKonsumsi->tanggal = $req->get('tanggal');
        $permohonanKonsumsi->tanggal_selesai = $req->get('tanggal_selesai');
        $permohonanKonsumsi->jumlah =$req->get('jumlah');
        $permohonanKonsumsi->sumber_dana =$req->get('sumber_dana');
        $permohonanKonsumsi->kegiatan =$req->get('kegiatan');
        $permohonanKonsumsi->jenis_konsumsi =$req->get('jenis_konsumsi');
        $permohonanKonsumsi->jumlah_peserta =$req->get('jumlah_peserta');
        $permohonanKonsumsi->pemohon =$req->get('pemohon');
        $permohonanKonsumsi->pemohon_id =$req->get('pemohon_id');
        $permohonanKonsumsi->status_pj ='Pending';
        $permohonanKonsumsi->status_supervisor = 'Pending';
        $permohonanKonsumsi->status_manajer = 'Pending';
        $permohonanKonsumsi->keterangan =$req->get('keterangan');
        $permohonanKonsumsi->save();

        $notifications = new Notification;
        $notifications->permohonan_konsumsi_id = $permohonanKonsumsi->id;
        $notifications->status = false;
        $notifications->save();
        
        return redirect()->route('list-permohonan-konsumsi');
    }
}
