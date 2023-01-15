<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SuratPerintahJalan;
use Illuminate\Http\Request;

class FormSuratPerintahJalanController extends Controller
{
    
    public function submit(Request $req)
    {
        $req->validate([
            'nama_pengemudi' => 'required',
            'tujuan' => 'required',
            'jarak' => 'required',
            'pemohon' => 'required',
            'total_biaya' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali' => 'required',
            'jam_berangkat' => 'required',
            'jam_kembali' => 'required',
            'pengisian_bbm' => 'required',
            'penanggung_jawab' => 'required',
            'penanggung_jawab_pool' => 'required',

        ]);

        $suratPerintahJalan = new SuratPerintahJalan;
        $suratPerintahJalan->nama_pengemudi =$req->get('nama_pengemudi');
        $suratPerintahJalan->tujuan =$req->get('tujuan');
        $suratPerintahJalan->jarak =$req->get('jarak');
        $suratPerintahJalan->pemohon =$req->get('pemohon');
        $suratPerintahJalan->total_biaya =$req->get('total_biaya');
        $suratPerintahJalan->tanggal_berangkat =$req->get('tanggal_berangkat');
        $suratPerintahJalan->tanggal_kembali =$req->get('tanggal_kembali');
        $suratPerintahJalan->jam_berangkat =$req->get('jam_berangkat');
        $suratPerintahJalan->jam_kembali =$req->get('jam_kembali');
        $suratPerintahJalan->pengisian_bbm =$req->get('pengisian_bbm');
        $suratPerintahJalan->penanggung_jawab =$req->get('penanggung_jawab');
        $suratPerintahJalan->penanggung_jawab_pool =$req->get('penanggung_jawab_pool');
        $suratPerintahJalan->status_pj = 'Pending';
        $suratPerintahJalan->status_pj_pool = 'Pending';

        $suratPerintahJalan->save();

        return redirect()->route('list-surat-perintah-jalan');
    }
}
