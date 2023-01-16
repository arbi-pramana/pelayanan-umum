<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\PemesananRuangan;
use App\Models\PermohonanKonsumsi;
use App\Models\PermohonanAtk;
use App\Models\PermohonanPemakaianKendaraan;

class ProfileController extends Controller
{
    public function index()
    {
        $id_karyawan = auth()->guard('front')->id();
        $data['user'] = Karyawan::where('id', auth()->guard('front')->id())->first();
        $pemesananRuangan = PemesananRuangan::where('pemohon_id', $data['user']->id)
        ->orWhere('supervisor',$id_karyawan)
        ->orWhere('manajer',$id_karyawan)
        ->count();

        $data['permohonanKonsumsi'] = PermohonanKonsumsi::where('pemohon_id', $data['user']->id)
        ->orWhere('supervisor',$id_karyawan)
        ->orWhere('manajer',$id_karyawan)
        ->count();
        $data['permohonanAtk'] = PermohonanAtk::where('pemohon', $data['user']->nama)->count();
        $data['permohonanPemakaianKendaraan'] = PermohonanPemakaianKendaraan::where('pemohon_id', $data['user']->id)
        ->orWhere('penanggung_jawab',$id_karyawan)
        ->count();
        
        $data['pemesananRuangan'] = $pemesananRuangan;
        
        return view('front.baru.profile.index', $data);
    }

    public function setting()
    {
        return view('front.baru.profile.setting');
    }

    public function updateInfo(Request $request)
    {
        $karyawan = Karyawan::where('no_induk', $request->no_induk)
                    ->update([
                            'nama' => $request->nama,
                            'jabatan' => $request->jabatan,
                            'sub_bidang' => $request->sub_bidang,
                            'pendidikan' => $request->pendidikan,
                            'nama_tanpa_gelar' => $request->nama_tanpa_gelar,
                            'bidang' => $request->bidang,
                            'grade' => $request->grade,
                            'universitas' => $request->universitas
                            ]);
        return back()->with('msg', 'Profil Berhasil Diubah !');
    }

    public function updatePass(Request $request)
    {
        if($request->password_baru == $request->ulang_password_baru){
            $karyawan = Karyawan::where('no_induk', $request->no_induk)
                        ->update(['password' => bcrypt($request->password_baru)]);
            return back()->with('msg', 'Password Berhasil Diubah !');
        } else {
            return back()->with('msg', 'Password Tidak Cocok !');
        }
    }
}
