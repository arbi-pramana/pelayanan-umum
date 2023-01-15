<?php

namespace App\Http\Controllers\Front;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermohonanPemakaianKendaraan;

class FormPermohonanKendaraanController extends Controller
{
    
    public function submit(Request $req)
    {
        $permohonan = new PermohonanPemakaianKendaraan;
        $this->save($req, $permohonan);

        return redirect()
            ->route('list-permohonan-kendaraan')
            ->with('info', "Data permohonan pemakaian kendaraan telah disimpan.");
    }

    public function update(Request $req, $id)
    {
        $permohonan = PermohonanPemakaianKendaraan::findOrFail($id);

        $this->save($req, $permohonan);

        return redirect()
            ->route('list-permohonan-kendaraan')
            ->with('info', "Data permohonan pemakaian kendaraan telah disimpan.");
    }

    public function destroy(Request $req, $id)
    {
        $permohonan = PermohonanPemakaianKendaraan::findOrFail($id);
        $permohonan->delete();

        return redirect()
            ->route('list-permohonan-kendaraan')
            ->with('info', "Data permohonan pemakaian kendaraan telah dihapus.");
    }

    protected function save(Request $req, PermohonanPemakaianKendaraan $permohonan)
    {
        $req->validate([
            'pemohon' => 'required',
            'tujuan' => 'required',
            // 'latlng' => 'required',
            'keperluan' => 'required',
            'penanggung_jawab' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali' => 'required',
            'jam_berangkat' => 'required',
            'jam_kembali' => 'required',
        ]);

        $permohonan->pemohon =$req->get('pemohon');
        $permohonan->pemohon_id =$req->get('pemohon_id');
        $permohonan->latlng =$req->get('latlng');
        $permohonan->tujuan =$req->get('tujuan');
        $permohonan->keperluan =$req->get('keperluan');
        $permohonan->penanggung_jawab =$req->get('penanggung_jawab');
        $permohonan->tanggal_berangkat =$req->get('tanggal_berangkat');
        $permohonan->tanggal_kembali =$req->get('tanggal_kembali');
        $permohonan->jam_berangkat =$req->get('jam_berangkat');
        $permohonan->jam_kembali =$req->get('jam_kembali');
        $permohonan->status_pj = 'Pending';
        $permohonan->keterangan = $req->get('keterangan');
        $permohonan->save();
        
        $notifications = new Notification;
        $notifications->permohonan_pemakaian_kendaraan_id = $permohonan->id;
        $notifications->status = false;
        $notifications->save();
        

     
    }

    protected function guard()
    {
        return auth()->guard('front');
    }
}
