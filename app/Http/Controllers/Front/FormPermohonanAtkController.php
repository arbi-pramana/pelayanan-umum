<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PermohonanAtk;
use Illuminate\Http\Request;

class FormPermohonanAtkController extends Controller
{
    
    public function submit(Request $req)
    {
        // dd($req);
        $permohonanAtk = new PermohonanAtk;
        $permohonanAtk->jumlah = $req->get('jumlah');
        $permohonanAtk->nama_barang = $req->get('nama_barang');
        $permohonanAtk->pemohon =$req->get('pemohon');
        $permohonanAtk->bagian =$req->get('bagian');
        $permohonanAtk->keterangan =$req->get('keterangan');
        $permohonanAtk->status_pj ='Pending';
        $permohonanAtk->save();

        return redirect()->route('list-permohonan-atk');
    }
}
