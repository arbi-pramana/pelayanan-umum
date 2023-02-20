<?php

namespace App\Http\Controllers\Front;

use Auth;
use App\User;
use Carbon\Carbon;
use App\Models\Ruang;
use App\Models\Barang;
use App\Models\Driver;
use App\Models\Karyawan;
use App\Models\SumberDana;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PermohonanAtk;
use App\Models\PemesananRuangan;
use App\Models\PermohonanKonsumsi;
use App\Models\SuratPerintahJalan;
use App\Http\Controllers\Controller;
use App\Models\PermohonanPemakaianKendaraan;

class FrontController extends Controller
{

    protected $permohonanKonsumsi;
    protected $pemesananRuangan;
    protected $permohonanAtk;
    protected $permohonanPemakaianKendaraan;
    protected $suratPerintahJalan;

    public function __construct(
        PermohonanKonsumsi $permohonanKonsumsi,
        PemesananRuangan $pemesananRuangan,
        PermohonanAtk $permohonanAtk,
        PermohonanPemakaianKendaraan $permohonanPemakaianKendaraan,
        SuratPerintahJalan $suratPerintahJalan
    ) {
        $this->permohonanKonsumsi = $permohonanKonsumsi;
        $this->pemesananRuangan = $pemesananRuangan;
        $this->permohonanAtk = $permohonanAtk;
        $this->permohonanPemakaianKendaraan = $permohonanPemakaianKendaraan;
        $this->suratPerintahJalan = $suratPerintahJalan;
    }

    public function submitRuangan(Request $req)
    {
        $date = explode(' - ', $req->range_date);

        // Convert waktu_awal and waktu_akhir to integer format
        $waktu_awal = intval(str_replace(':', '', $req->waktu_awal));
        $waktu_akhir = intval(str_replace(':', '', $req->waktu_akhir));
    
        // Convert dates to database format
        $tanggal_awal = date("Y-m-d", strtotime($date[0]));
        $tanggal_akhir = date("Y-m-d", strtotime($date[1]));
    
        $ruangNotReady = $this->pemesananRuangan
            ->where('tanggal_selesai', '>=', $tanggal_awal)
            ->where('tanggal', '<=', $tanggal_akhir)
            ->where('status_pj', '!=', 'Rejected')
            ->get()
            ->map(function($q) use ($waktu_awal, $waktu_akhir) {
                // Convert waktu_awal and waktu_akhir to integer format
                $time_awal = intval(date("Hi", $q->waktu_awal));
                $time_akhir = intval(date("Hi", $q->waktu_akhir));
                if($time_awal <= $waktu_akhir && $waktu_akhir <= $time_akhir){
                    return $q;
                } else if($time_awal <= $waktu_awal && $waktu_awal <= $time_akhir){
                    return $q;
                } else if($time_akhir <= $waktu_awal && $waktu_akhir <= $time_akhir){
                    return $q;
                }
            })
            ->pluck('id_ruang')
            ->toArray();
    
        $ruangs = Ruang::where('kapasitas', '>=', $req->jumlah_peserta)->get();    
    
        // Exclude booked rooms from the available rooms
        if(!empty($ruangNotReady)){
            $ruangs = $ruangs->whereNotIn('id', $ruangNotReady);
        }
    
        $data['pemesanan_ruangan'] = $this->pemesananRuangan->get();
        $data['date'] = $req->range_date;
        $data['waktu_awal'] = $req->waktu_awal;
        $data['waktu_akhir'] = $req->waktu_akhir;
        $data['jumlah_peserta'] = $req->jumlah_peserta;
        $data['ruangs'] = $ruangs;
    
        return view('front.baru.ruangan.daftar_ruangan', $data);
}


    public function pageDashboard(Request $req)
    {
        $data['pemohon'] = $this->guard()->user();
        return view('front.baru.dashboard', $data);
    }

    
    public function pageHome(Request $req)
    {
        $data['pemohon'] = $this->guard()->user();
        return view('front.baru.ruangan.form_cari', $data);
    }
    public function layoutDesign(Request $req)
    {
        $data['pemohon'] = $this->guard()->user();
        return view('front.baru.layout', $data);
    }

    public function pageSPjalan(Request $req)
    {
        $data['pemohon'] = $this->guard()->user();
        return view('front.pages.spjalan', $data);
    }

    public function pagePermohonanKonsumsi(Request $req)
    {
        $data['array_sumber_dana'] = SumberDana::get()->toArray();
        $data['pemohon'] = $this->guard()->user();
        // return view('front.pages.permohonankonsumsi')->with(compact('array_sumber_dana', 'pemohon'));
        return view('front.baru.konsumsi.create', $data);
    }

    public function pagePemesananRuangan(Request $req)
    {
        if (empty($_GET)) {
            abort('404');
        }
        $id_ruang = $req->id_ruang;
        $data['ruang'] = Ruang::where('id',$id_ruang)->first();
        $data['pemohon'] = $this->guard()->user();
        return view('front.baru.ruangan.detail_ruangan', $data);
    }

    public function pagePermohonanAtk(Request $req)
    {
        $data['array_pj_atk'] = Karyawan::where('role', 'manajer')->get()->toArray();
        $data['array_barang'] = Barang::get()->toArray();
        $data['pemohon'] = $this->guard()->user();

        return view('front.baru.atk.create', $data);
    }

    public function pagePermohonanKendaraan(Request $req)
    {
        $array_pj_kendaraan = Karyawan::where('role', 'manajer')->get()->toArray();
        $pemohon = $this->guard()->user();
        $driver = Driver::where('status_driver','Ready')->get();

        return view('front.baru.kendaraan.create')->with(compact('array_pj_kendaraan', 'pemohon','driver'));
    }

    public function pageEditPermohonanKendaraan(Request $req, $id)
    {
        $permohonan = PermohonanPemakaianKendaraan::findOrFail($id);
        $array_pj_kendaraan = Karyawan::where('role', 'manajer')->get()->toArray();
        $pemohon = $this->guard()->user();

        return view('front.baru.kendaraan.edit', [
            'array_pj_kendaraan' => $array_pj_kendaraan,
            'pemohon' => $pemohon,
            'permohonan' => $permohonan,
        ]);
    }

    public function pageSuratPerintahJalan(Request $req)
    {
        $array_pj_sp = Karyawan::where('role', 'manajer')->get()->toArray();
        $pemohon = $this->guard()->user();
        $pj_pool = Karyawan::where('role', 'penanggung jawab pool')->get()->toArray();
        $array_pengemudi = Karyawan::where('role', 'Pengemudi')->get()->toArray();

        // phpcs:ignore
        return view('front.pages.suratperintahjalan')->with(compact('array_pj_sp', 'pj_pool', 'array_pengemudi', 'pemohon'));
    }

    public function pageLogin(Request $req)
    {
        $data['users'] = Karyawan::orderBy('nama','asc')->get();
        return view('front.pages.login',$data);
    }

    public function pageListPeminjamanRuang(Request $request)
    {
        $role = $this->guard()->user()->role;

        $user = $this->guard()->user();
        $pemohon = $this->guard()->user();
        $query = $this->pemesananRuangan->query();
        $query->where('pemohon_id', '=', $pemohon->id)
        ->get();

        $data['title'] = 'List Pemesanan Ruangan';
        $data['pagination'] = $query->latest()->get();
        return view('front.baru.profile.listpeminjamanruang', $data);
    }

    public function pageListPermohonanKonsumsi(Request $request)
    {
        $user = $this->guard()->user();
        $role = $this->guard()->user()->role;
        $pemohon = $this->guard()->user();

        $query = $this->permohonanKonsumsi->query();
        $query->select([
                    "permohonan_konsumsi.id",
                    "permohonan_konsumsi.no_permohonan_konsumsi",
                    "permohonan_konsumsi.tanggal",
                    "permohonan_konsumsi.tanggal_selesai",
                    "permohonan_konsumsi.jam",
                    // "sumber_dana.nama_sumber_dana",
                    "permohonan_konsumsi.kegiatan",
                    "permohonan_konsumsi.jenis_konsumsi",
                    "permohonan_konsumsi.jumlah_peserta",
                    "permohonan_konsumsi.pemohon",
                    "permohonan_konsumsi.jumlah",
                    "permohonan_konsumsi.sumber_dana",
                    "permohonan_konsumsi.status_supervisor",
                    "permohonan_konsumsi.status_manajer",
                    "permohonan_konsumsi.status_pj",
                    "permohonan_konsumsi.keterangan",
                    "permohonan_konsumsi.attachment",
                    "permohonan_konsumsi.alasan_reject",
                    "permohonan_konsumsi.created_at",
                    "permohonan_konsumsi.updated_at"
            ])
            ->where('permohonan_konsumsi.pemohon_id', '=', $pemohon->id);

        $data['title'] = 'List Permohonan Konsumsi';
        $data['pagination'] = $query->latest()->get();
        return view('front.baru.profile.listpermohonankonsumsi', $data);
    }

    public function pageListPermohonanAtk(Request $request)
    {
        $role = $this->guard()->user()->role;
        $user = $this->guard()->user();
        $pemohon = $this->guard()->user();
        $limit = (int) $request->get('limit') ?: 10;
        $keyword = $request->get('keyword');

        if ($role=='Manajer') {
            $query = $this->permohonanAtk->query();
            $query->select([
                "permohonan_atk.id",
                "permohonan_atk.jumlah",
                "barang.nama_barang",
                "permohonan_atk.nama_barang",
                "permohonan_atk.jumlah_diberikan",
                "permohonan_atk.keterangan",
                "permohonan_atk.pemohon",
                "permohonan_atk.bagian",
                "permohonan_atk.status_pj"
            ])
            ->join('barang', 'permohonan_atk.nama_barang', '=', 'barang.id')
            ->where('permohonan_atk.penanggung_jawab', '=', $user->id);
        } elseif ($role=='Supervisor') {
            $query = $this->permohonanAtk->query();
            $query->select([
                "permohonan_atk.id",
                "permohonan_atk.jumlah",
                "barang.nama_barang",
                "permohonan_atk.nama_barang",
                "permohonan_atk.jumlah_diberikan",
                "permohonan_atk.keterangan",
                "permohonan_atk.pemohon",
                "permohonan_atk.bagian",
                "permohonan_atk.status_pj"
            ])
            ->join('barang', 'permohonan_atk.nama_barang', '=', 'barang.id')
            ->where('permohonan_atk.penanggung_jawab', '=', $user->id);
        } else {
            $query = $this->permohonanAtk->query();
            $query->select([
                "permohonan_atk.id",
                "permohonan_atk.jumlah",
                "barang.nama_barang",
                "permohonan_atk.nama_barang",
                "permohonan_atk.jumlah_diberikan",
                "permohonan_atk.keterangan",
                "permohonan_atk.pemohon",
                "permohonan_atk.bagian",
                "permohonan_atk.status_pj"
            ])
            ->join('barang', 'permohonan_atk.nama_barang', '=', 'barang.id')
            ->where('permohonan_atk.pemohon', '=', $pemohon->nama);
    
        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nama_barang', 'like', "%{$keyword}%");
                $query->orWhere('keterangan', 'like', "%{$keyword}%");
                $query->orWhere('pemohon', 'like', "%{$keyword}%");
                $query->orWhere('bagian', 'like', "%{$keyword}%");
                $query->orWhere('status_pj', 'like', "%{$keyword}%");
            });
        }
    }
        $data['title'] = 'List Permohonan ATK';
        $data['pagination'] = $query->paginate($limit);
        return view('front.baru.profile.listpermohonanatk', $data);
    }

    public function pageListPermohonanKendaraan(Request $request)
    {
        $role = $this->guard()->user()->role;

        $user = $this->guard()->user();
        $pemohon = $this->guard()->user();
        $query = $this->permohonanPemakaianKendaraan->query()
                ->where('pemohon_id', $pemohon->id);

        $data['title'] = 'List Permohonan Pemakaian Kendaraan';
        $data['pagination'] = $query->latest()->get();
        return view('front.baru.profile.listpermohonankendaraan', $data);
    }

    public function pageListSuratPerintahJalan(Request $request)
    {
        $role = $this->guard()->user()->role;

        $user = $this->guard()->user();
        $pemohon = $this->guard()->user();
        $limit = (int) $request->get('limit') ?: 10;
        $keyword = $request->get('keyword');

        // // if ($role == "Manajer") {
        // //     $query = $this->suratPerintahJalan->query();
        // //     $query->select([
        // //         "surat_perintah_jalan.id",
        // //         "karyawan.nama as nama_pengemudi_x",
        // //         "surat_perintah_jalan.nama_pengemudi",
        // //         "surat_perintah_jalan.tujuan",
        // //         "surat_perintah_jalan.jarak",
        // //         "surat_perintah_jalan.total_biaya",
        // //         "surat_perintah_jalan.tanggal_berangkat",
        // //         "surat_perintah_jalan.tanggal_kembali",
        // //         "surat_perintah_jalan.jam_berangkat",
        // //         "surat_perintah_jalan.jam_kembali",
        // //         "surat_perintah_jalan.pengisian_bbm",
        // //         "penanggung_jawab.nama as penanggung_jawab",
        // //         "surat_perintah_jalan.status_pj",
        // //         "penanggung_jawab_pool.nama as penanggung_jawab_pool",
        // //         "surat_perintah_jalan.status_pj_pool"
        // //     ])
        // //     ->join('karyawan', 'surat_perintah_jalan.nama_pengemudi', '=', 'karyawan.id')
        // //     ->join('karyawan as penanggung_jawab', 'surat_perintah_jalan.penanggung_jawab', '=', 'penanggung_jawab.id')
        // //     ->join('karyawan as penanggung_jawab_pool', 'surat_perintah_jalan.penanggung_jawab_pool', '=', 'penanggung_jawab_pool.id')
        // //     ->where('surat_perintah_jalan.penanggung_jawab', '=', $user->id);
        // // } elseif ($role == "Penanggung Jawab Pool") {
        //     $query = $this->suratPerintahJalan->query();
        //     $query->select([
        //         "surat_perintah_jalan.id",
        //         "karyawan.nama as nama_pengemudi_x",
        //         "surat_perintah_jalan.nama_pengemudi",
        //         "surat_perintah_jalan.tujuan",
        //         "surat_perintah_jalan.jarak",
        //         "surat_perintah_jalan.total_biaya",
        //         "surat_perintah_jalan.tanggal_berangkat",
        //         "surat_perintah_jalan.tanggal_kembali",
        //         "surat_perintah_jalan.jam_berangkat",
        //         "surat_perintah_jalan.jam_kembali",
        //         "surat_perintah_jalan.pengisian_bbm",
        //         "penanggung_jawab.nama as penanggung_jawab",
        //         "surat_perintah_jalan.status_pj",
        //         "penanggung_jawab_pool.nama as penanggung_jawab_pool",
        //         "surat_perintah_jalan.status_pj_pool"
        //     ])
        //     ->join('karyawan', 'surat_perintah_jalan.nama_pengemudi', '=', 'karyawan.id')
        //     ->join('karyawan as penanggung_jawab', 'surat_perintah_jalan.penanggung_jawab', '=', 'penanggung_jawab.id')
        //     ->join('karyawan as penanggung_jawab_pool', 'surat_perintah_jalan.penanggung_jawab_pool', '=', 'penanggung_jawab_pool.nama')
        //     ->where('penanggung_jawab_pool', '=', $user->id);
        // } else {
            $query = $this->suratPerintahJalan->query();
      
            $query->join('permohonan_pemakaian_kendaraan','surat_perintah_jalan.id_permohonan_pemakaian_kendaraan','=','permohonan_pemakaian_kendaraan.id')
            ->where('permohonan_pemakaian_kendaraan.pemohon', '=', $pemohon->nama)
            ->select('surat_perintah_jalan.*')
            ->get();
        // }

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('nama_pengemudi', 'like', "%{$keyword}%");
                $query->orWhere('tujuan', 'like', "%{$keyword}%");
                $query->orWhere('jarak', 'like', "%{$keyword}%");
                $query->orWhere('total_biaya', 'like', "%{$keyword}%");
                $query->orWhere('tanggal_berangkat', 'like', "%{$keyword}%");
                $query->orWhere('tanggal_kembali', 'like', "%{$keyword}%");
                $query->orWhere('jam_berangkat', 'like', "%{$keyword}%");
                $query->orWhere('jam_kembali', 'like', "%{$keyword}%");
                $query->orWhere('penanggung_jawab', 'like', "%{$keyword}%");
                $query->orWhere('status_pj', 'like', "%{$keyword}%");
                $query->orWhere('penanggung_jawab_pool', 'like', "%{$keyword}%");
                $query->orWhere('status_pj_pool', 'like', "%{$keyword}%");
            });
        }

        $data['title'] = 'List Surat Perintah Jalan';
        $data['pagination'] = $query->latest()->paginate($limit);
        return view('front.baru.profile.listsuratperintahjalan', $data);
    }


    
    public function approveSupervisorKonsumsi($id)
    {
        // \DB::beginTransaction();
        \DB::table('permohonan_konsumsi')
            ->where('id', '=', $id)
            ->update(['status_supervisor' => 'Approved']);

        return redirect('/listpermohonankonsumsi');
    }

    public function approveManagerKonsumsi($id)
    {
        // \DB::beginTransaction();
        \DB::table('permohonan_konsumsi')
            ->where('id', '=', $id)
            ->update(['status_manajer' => 'Approved']);

        return redirect('/listpermohonankonsumsi');
    }

    public function deletelistKonsumsi(Request $request, $id)
    {
        $permohonanKonsumsi = $this->permohonanKonsumsi->where('id',$id)->first();

        // Delete data
        $notification = Notification::where('permohonan_konsumsi_id',$id)->first();
        if($notification){
            $notification->delete();
        }
        $deleted = $permohonanKonsumsi->delete();
        if (!$deleted) {

          
            $message = 'Something went wrong when delete Permohonan Konsumsi';
            return redirect()->back()->with('danger', $message);
        }

        $message = 'Permohonan Konsumsi has been deleted!';
        return redirect('/listpermohonankonsumsi')->with('info', $message);
    }

    protected function findOrFailKonsumsi($id)
    {
        $permohonanKonsumsi = $this->permohonanKonsumsi->find($id);
        if (!$permohonanKonsumsi) {
            return abort(404, 'Permohonan Konsumsi not found');
        }

        return $permohonanKonsumsi;
    }

    protected function findOrFailRuang($id)
    {
        $pemesananRuangan = $this->pemesananRuangan->find($id);
        if (!$pemesananRuangan) {
            return abort(404, 'Pemesanan Ruangan not found');
        }

        return $pemesananRuangan;
    }

    public function approveSupervisorRuang($id)
    {
        PemesananRuangan::where('id', '=', $id)
                          ->update(['status_supervisor' => 'Approved']);

        return redirect('/listpeminjamanruang');
    }

    public function rejectSupervisorRuang($id)
    {
        PemesananRuangan::where('id', '=', $id)
                          ->update(['status_supervisor' => 'Rejected']);

        return redirect('/listpeminjamanruang');
    }

    public function approveManagerRuang($id)
    {
        PemesananRuangan::where('id', '=', $id)
                          ->update(['status_manajer' => 'Approved']);

        return redirect('/listpeminjamanruang');
    }

    public function rejectManagerRuang($id)
    {
        PemesananRuangan::where('id', '=', $id)
                          ->update(['status_manajer' => 'Rejected']);

        return redirect('/listpeminjamanruang');
    }

    public function deletelistRuang(Request $request, $id)
    {
        $pemesananRuangan = $this->findOrFailRuang($id);

        // Delete data
        $notification = Notification::where('pemesanan_ruangan_id',$id)->first();
        if($notification){
            $notification->delete();
        }
        $deleted = $pemesananRuangan->delete();
        if (!$deleted) {

           
            $message = 'Something went wrong when delete Pemesanan Ruangan';
            return back()->with('danger', $message);
        }

        $message = 'Pemesanan Ruangan has been deleted!';
        return redirect('/listpeminjamanruang')->with('info', $message);
    }

    protected function findOrFailAtk($id)
    {
        $permohonanAtk = $this->permohonanAtk->find($id);
        if (!$permohonanAtk) {
            return abort(404, 'Permohonan ATK not found');
        }

        return $permohonanAtk;
    }

    public function approveManagerAtk($id)
    {
        $jumlah = \DB::table('permohonan_atk')->value('jumlah');
        $quantity = (int)$jumlah;

        \DB::table('permohonan_atk')
            ->where('id', '=', $id)
            ->update(['jumlah_diberikan' => $quantity,'status_pj' => 'Approved']);

        return redirect('/listpermohonanatk');
    }

    public function deletelistAtk(Request $request, $id)
    {
        $permohonanAtk = $this->findOrFailAtk($id);

        // Delete data
        $deleted = $permohonanAtk->delete();
        if (!$deleted) {
            $message = 'Something went wrong when delete Permohonan ATK';
            return back()->with('danger', $message);
        }

        $message = 'Permohonan ATK has been deleted!';
        return redirect('/listpermohonanatk')->with('info', $message);
    }

    protected function findOrFailKendaraan($id)
    {
        $permohonanPemakaianKendaraan = $this->permohonanPemakaianKendaraan->find($id);
        if (!$permohonanPemakaianKendaraan) {
            return abort(404, 'Permohonan Pemakaian Kendaraan not found');
        }

        return $permohonanPemakaianKendaraan;
    }

    public function approveManagerKendaraan($id)
    {
        \DB::table('permohonan_pemakaian_kendaraan')
           ->where('id', '=', $id)
           ->update(['status_pj' => 'Approved']);

        return redirect('/listpermohonankendaraan');
    }

    public function deletelistKendaraan(Request $request, $id)
    {
        $permohonankendaraan = $this->findOrFailKendaraan($id);

        $notification = Notification::where('permohonan_pemakaian_kendaraan_id',$id)->first();
        if($notification){
            $notification->delete();
        }
        // Delete data
        $deleted = $permohonankendaraan->delete();
        if (!$deleted) {

            $message = 'Something went wrong when delete Permohonan Kendaraan';
            return back()->with('danger', $message);
        }

        $message = 'Permohonan Kendaraan has been deleted!';
        return redirect('/listpermohonankendaraan')->with('info', $message);
    }

    protected function findOrFailSuratPerintahJalan($id)
    {
        $suratPerintahJalan = $this->suratPerintahJalan->find($id);
        if (!$suratPerintahJalan) {
            return abort(404, 'Surat Perintah Jalan not found');
        }

        return $suratPerintahJalan;
    }

    public function approveManagerSuratPerintahJalan($id)
    {
        \DB::table('surat_perintah_jalan')
           ->where('id', '=', $id)
           ->update(['status_pj' => 'Approved']);

        return redirect('/listsuratperintahjalan');
    }

    public function approvePenanggungJawabPool($id)
    {
        \DB::table('surat_perintah_jalan')
           ->where('id', '=', $id)
           ->update(['status_pj_pool' => 'Approved']);

        return redirect('/listsuratperintahjalan');
    }

    public function deletelistSuratPerintahJalan(Request $request, $id)
    {
        $suratPerintahJalan = $this->findOrFailSuratPerintahJalan($id);

        // Delete data
        $deleted = $suratPerintahJalan->delete();
        if (!$deleted) {
            $message = 'Something went wrong when delete Surat Perintah Jalan';
            return back()->with('danger', $message);
        }

        $message = 'Surat Perintah has been deleted!';
        return redirect('/listsuratperintahjalan')->with('info', $message);
    }

    public function getDriver($date,$waktu_awal,$waktu_akhir){

        $date = explode(' - ',$date);

        $driverNotReady = $this->permohonanPemakaianKendaraan
            ->whereBetween('tanggal_kembali',[$date[0],$date[1]])
            ->where('driver_id','!=','1')
            ->where('status_pj','!=','Rejected')
            ->get()
            ->map(function($q) use ($waktu_awal,$waktu_akhir){
                // $q->time_awal = (int)date("Hi",$q->waktu_awal);
                // $q->time_akhir = (int)date("Hi",$q->waktu_akhir);
                if($q->jam_berangkat <= $waktu_akhir && $waktu_akhir <= $q->jam_kembali){
                    return $q;
                } else if($q->jam_berangkat <= $waktu_awal && $waktu_awal <= $q->jam_kembali){
                    return $q;
                }else if($q->jam_kembali <= $waktu_awal && $waktu_akhir <= $q->jam_kembali){
                    return $q;
                }
            })
            ->pluck('driver_id')
            ->toArray();

        $drivers = Driver::get();    
        //update data ruangs 
        if(!empty($driverNotReady)){
            $drivers = $drivers
            ->whereNotIn('id',$driverNotReady);
        }

        $data['drivers'] = $drivers;

        return $data;
    }

    protected function guard()
    {
        return auth()->guard('front');
    }

}
