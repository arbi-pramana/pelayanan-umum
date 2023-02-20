<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PemesananRuangan;
use App\Models\PermohonanKonsumsi;
use App\Models\SuratPerintahJalan;
use App\Http\Controllers\Controller;
use App\Models\PermohonanPemakaianKendaraan;

class DashboardController extends Controller
{

    /**
     * Show page dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pageDashboard()
    {
        $events = [];
        $ruangan = PemesananRuangan::where('status_pj','Approved')
                    ->where('status_pelaksana','Belum Terlaksana')
                    ->join('ruang','ruang.id','pemesanan_ruangan.id_ruang')
                    ->get();

        foreach($ruangan as $item){
            $events[] = [
                            'title' => $item->nama_ruang.' - '.$item->nama_acara,
                            'start' => $item->tanggal.'T'.date('H:i',$item->waktu_awal),
                            'end' => $item->tanggal_selesai.'T'.date('H:i',$item->waktu_akhir),
                            'color' =>sprintf("#%06x",rand(0,16777215)),
                            'allDay'=>false
                        ];
        }
        // dd($events);
        $kendaraan = SuratPerintahJalan::where('status_perjalanan','Belum Sampai')
        ->join('permohonan_pemakaian_kendaraan','permohonan_pemakaian_kendaraan.id','surat_perintah_jalan.id_permohonan_pemakaian_kendaraan')
        ->get();

        // dd($kendaraan);
        foreach($kendaraan as $item){
            $events[] = [
                            'title' => $item->tujuan.' '.$item->keperluan,
                            'start' => $item->tanggal_berangkat.'T'.$item->jam_berangkat.'',
                            'end' => $item->tanggal_kembali.'T'.$item->jam_kembali,
                            'color' =>sprintf("#%06x",rand(0,16777215))
                        ];
        }
        // dd($events);
        return view('admin::dashboard.dashboard',compact('events'));
    }
}
