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
        $today = Date('Y-m-d');
        // $ruangan = PemesananRuangan::join('ruang', 'pemesanan_ruangan.id_ruang', 'ruang.id')
        // ->where('status_pj', 'Approved')
        // ->where('tanggal', '<=', $today)
        // ->where(function($query) use($today) {
        //     $query->where('tanggal_selesai', '>=', $today)
        //         ->orWhereNull('tanggal_selesai');
        // })
        // ->select('pemesanan_ruangan.nama_acara', 'pemesanan_ruangan.jumlah_peserta',
        // 'pemesanan_ruangan.tanggal', 'pemesanan_ruangan.tanggal_selesai', 'pemesanan_ruangan.waktu_awal', 'pemesanan_ruangan.waktu_akhir', 'ruang.nama_ruang', 'ruang.foto_ruang')
        // ->get();
        $data['konsumsi'] =PermohonanKonsumsi::where('status_pj', 'Approved')
        ->where('tanggal', '<=', $today)
        ->where(function($query) use($today) {
            $query->where('tanggal_selesai', '>=', $today)
                ->orWhereNull('tanggal_selesai');
        })->get();
        $data['kendaraan'] =PermohonanPemakaianKendaraan::where('status_pj', 'Approved')
        ->where('tanggal_berangkat', '<=', $today)
        ->where(function($query) use($today) {
            $query->where('tanggal_kembali', '>=', $today)
                ->orWhereNull('tanggal_kembali');
        })->get();
        $data['ruangan'] =PemesananRuangan::where('status_pj', 'Approved')
        ->where('tanggal', '<=', $today)
        ->where(function($query) use($today) {
            $query->where('tanggal_selesai', '>=', $today)
                ->orWhereNull('tanggal_selesai');
        })->get();
        $data['spj'] =SuratPerintahJalan::where('status_pj', 'Approved')
        ->where('tanggal_berangkat', '<=', $today)
        ->where(function($query) use($today) {
            $query->where('tanggal_kembali', '>=', $today)
                ->orWhereNull('tanggal_kembali');
        })->get();

        return view('admin::dashboard.dashboard',$data);
    }
}
