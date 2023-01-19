<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemesananRuangan;
use App\Models\Ruang;
use App\Models\Karyawan;
use App\User;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{

public function dashboard() {
    $nowDate = Date('Y-m-d');
    $ruangan = PemesananRuangan::join('ruang', 'pemesanan_ruangan.id_ruang', 'ruang.id')
    ->where('status_pj', 'Approved')
    ->where('tanggal', $nowDate)
    ->select('pemesanan_ruangan.nama_acara', 'pemesanan_ruangan.jumlah_peserta',
    'pemesanan_ruangan.tanggal', 'pemesanan_ruangan.waktu_awal', 'pemesanan_ruangan.waktu_akhir', 'ruang.nama_ruang', 'ruang.foto_ruang')
    ->get();
    $data['ruangan'] = $ruangan;
    return view('dashboard.dashboard', $data);
}

}