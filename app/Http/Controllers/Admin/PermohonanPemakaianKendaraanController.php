<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Notification;
use Illuminate\Http\Request;
use LaraSpells\FormModel\FormModel;
use App\Http\Controllers\Controller;
use App\Models\PermohonanPemakaianKendaraan;
/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Thu, 19 Jul 2018 11:01:00 +0000
 */
class PermohonanPemakaianKendaraanController extends Controller
{

    /**
     * Permohonan pemakaian kendaraan model
     *
     * @var App\Models\PermohonanPemakaianKendaraan
     */
    protected $permohonanPemakaianKendaraan;
    protected $karyawan;

    /**
     * Constructor
     *
     * @param  App\Models\PermohonanPemakaianKendaraan $permohonanPemakaianKendaraan
     * @return void
     */
    public function __construct(PermohonanPemakaianKendaraan $permohonanPemakaianKendaraan, Karyawan $karyawan)
    {
        $this->permohonanPemakaianKendaraan = $permohonanPemakaianKendaraan;
        $this->karyawan = $karyawan;
    }

    /**
     * Display list permohonan_pemakaian_kendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function pageList(Request $request)
    {
        $limit = (int) $request->get('limit') ?: 10;
        $keyword = $request->get('keyword');

        $query = $this->permohonanPemakaianKendaraan->query();
        $query->select([
            "id",
            "pemohon",
            "tujuan",
            "keperluan",
            "hari",
            "tanggal_berangkat",
            "tanggal_kembali",
            "jam_berangkat",
            "jam_kembali",
            "penanggung_jawab",
            "status_pj",
        ]);

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('pemohon', 'like', "%{$keyword}%");
                $query->orWhere('tujuan', 'like', "%{$keyword}%");
                $query->orWhere('keperluan', 'like', "%{$keyword}%");
                $query->orWhere('hari', 'like', "%{$keyword}%");
                $query->orWhere('tanggal_berangkat', 'like', "%{$keyword}%");
                $query->orWhere('tanggal_kembali', 'like', "%{$keyword}%");
                $query->orWhere('jam_berangkat', 'like', "%{$keyword}%");
                $query->orWhere('jam_kembali', 'like', "%{$keyword}%");
                $query->orWhere('penanggung_jawab', 'like', "%{$keyword}%");
            });
        }

        $data['title'] = 'List Permohonan Pemakaian Kendaraan';
        $data['pagination'] = $query->paginate($limit);

        return view('admin::permohonan_pemakaian_kendaraan.page-list', $data);
    }

    /**
     * Show detail permohonanPemakaianKendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function pageDetail(Request $request, $id)
    {
        $permohonanPemakaianKendaraan = $this->findOrFail($id);

        $notif = Notification::where('permohonan_pemakaian_kendaraan_id',$permohonanPemakaianKendaraan->id)->first();
        $notif->status = true;
        $notif->save();

        $data['title'] = 'Detail Permohonan Pemakaian Kendaraan';
        $data['permohonanPemakaianKendaraan'] = $permohonanPemakaianKendaraan;

        return view('admin::permohonan_pemakaian_kendaraan.page-detail', $data);
    }

    /**
     * Display form create permohonanPemakaianKendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function formCreate(Request $request)
    {
        $data['title'] = 'Form Create Permohonan Pemakaian Kendaraan';
        // phpcs:ignore
        $data['form'] = $this->form(new PermohonanPemakaianKendaraan)->withAction(route('admin::permohonan-pemakaian-kendaraan.post-create'));

        return view('admin::permohonan_pemakaian_kendaraan.form-create', $data);
    }

    /**
     * Insert new permohonanPemakaianKendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $this->form(new PermohonanPemakaianKendaraan)->submit($request);

        $message = 'Permohonan Pemakaian Kendaraan has been created!';
        return redirect()->route('admin::permohonan-pemakaian-kendaraan.page-list')->with('info', $message);
    }

    /**
     * Display form edit permohonanPemakaianKendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function formEdit(Request $request, $id)
    {
        $permohonanPemakaianKendaraan = $this->findOrFail($id);

        $data['title'] = 'Form Edit Permohonan Pemakaian Kendaraan';
        // phpcs:ignore
        $data['form'] = $this->form($permohonanPemakaianKendaraan)->withAction(route('admin::permohonan-pemakaian-kendaraan.post-edit', [$id]));

        return view('admin::permohonan_pemakaian_kendaraan.form-edit', $data);
    }

    /**
     * Update specified permohonanPemakaianKendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $permohonanPemakaianKendaraan = $this->findOrFail($id);
        $permohonanPemakaianKendaraan->pemohon = $request->pemohon;
        $permohonanPemakaianKendaraan->latlng = $request->latlng;
        $permohonanPemakaianKendaraan->status_pj = $request->status_pj;
        $permohonanPemakaianKendaraan->keterangan = $request->keterangan;
        $permohonanPemakaianKendaraan->tujuan = $request->tujuan;
        $permohonanPemakaianKendaraan->keperluan = $request->keperluan;
        $permohonanPemakaianKendaraan->hari = $request->hari;
        $permohonanPemakaianKendaraan->tanggal_berangkat = $request->tanggal_berangkat;
        $permohonanPemakaianKendaraan->tanggal_kembali = $request->tanggal_kembali;
        $permohonanPemakaianKendaraan->jam_berangkat = $request->jam_berangkat;
        $permohonanPemakaianKendaraan->jam_kembali = $request->jam_kembali;
        $permohonanPemakaianKendaraan->penanggung_jawab = $request->penanggung_jawab;
        $permohonanPemakaianKendaraan->save();
        $message = 'Permohonan Pemakaian Kendaraan has been updated!';
        return redirect()->route('admin::permohonan-pemakaian-kendaraan.page-list')->with('info', $message);
    }

    /**
     * Delete specified permohonanPemakaianKendaraan
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $permohonanPemakaianKendaraan = $this->findOrFail($id);

        // Delete data
        $deleted = $permohonanPemakaianKendaraan->delete();
        if (!$deleted) {
            $message = 'Something went wrong when delete Permohonan Pemakaian Kendaraan';
            return back()->with('danger', $message);
        }
        $notif = Notification::where('permohonan_pemakaian_kendaraan_id',$id)->first();
        if(!empty($notif)){
            $notif->delete();
        }

        $message = 'Permohonan Pemakaian Kendaraan has been deleted!';
        return redirect()->route('admin::permohonan-pemakaian-kendaraan.page-list')->with('info', $message);
    }

    /**
     * Find permohonanPemakaianKendaraan by 'id' or display 404 if not exists
     *
     * @return Illuminate\Http\Response
     */
    protected function findOrFail($id)
    {
        $permohonanPemakaianKendaraan = $this->permohonanPemakaianKendaraan->find($id);
        if (!$permohonanPemakaianKendaraan) {
            return abort(404, 'Permohonan Pemakaian Kendaraan not found');
        }

        return $permohonanPemakaianKendaraan;
    }
    public function approve($id)
    {
        \DB::table('permohonan_pemakaian_kendaraan')
            ->where('id', '=', $id)
            ->update(['status_pj' => 'Approved']);

        $notif = Notification::where('permohonan_pemakaian_kendaraan_id',$id)->first();
        $notif->status = true;
        $notif->save();
    
        return redirect('admin/permohonan-pemakaian-kendaraan');
    }

    public function reject($id)
    {
        \DB::table('permohonan_pemakaian_kendaraan')
            ->where('id', '=', $id)
            ->update(['status_pj' => 'Rejected']);

        return redirect('admin/permohonan-pemakaian-kendaraan');
    }

    /**
     * Setup FormModel
     *
     * @param  App\Models\PermohonanPemakaianKendaraan $permohonanPemakaianKendaraan
     * @return LaraSpells\FormModel\FormModel
     */
    protected function form(PermohonanPemakaianKendaraan $permohonanPemakaianKendaraan)
    {
        return FormModel::make($permohonanPemakaianKendaraan, [
            'pemohon' => [
                'input' => "text",
                'label' => "Pemohon",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            'tujuan' => [
                'input' => "text",
                'label' => "Tujuan",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            'latlng' => [
                'input' => "map",
                'label' => "Tujuan",
                'maxlength' => "255",
                'rules' => [
                    // "required",
                    "max:255"
                ]
            ],
            'keperluan' => [
                'input' => "text",
                'label' => "Keperluan",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            // 'hari' => [
            //     'input' => "text",
            //     'label' => "Hari",
            //     'maxlength' => "10",
            //     'rules' => [
            //         "required",
            //         "max:10"
            //     ]
            // ],
            'tanggal_berangkat' => [
                'input' => "datepicker",
                'label' => "Tanggal Berangkat",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            'tanggal_kembali' => [
                'input' => "datepicker",
                'label' => "Tanggal Kembali",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            'jam_berangkat' => [
                'input' => "timepicker",
                'label' => "Jam Berangkat",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            'jam_kembali' => [
                'input' => "timepicker",
                'label' => "Jam Kembali",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            // 'penanggung_jawab' => [
            //     'input' => "select",
            //     'label' => "Penanggung Jawab",
            //     'options'=> $this->getPenanggungJawab(),
            //     'rules' => [
            //         "required"
            //     ]
            // ],
            'status_pj' => [
                'input' => "select",
                'label' => "Status Permohonan",
                'options' => [
                    [
                        'label' => 'Pending',
                        'value' => 'Pending'
                    ],
                    [
                        'label' => 'Approved',
                        'value' => 'Approved'
                    ],
                    [
                        'label' => 'Rejected',
                        'value' => 'Rejected'
                    ],
                ],
                'rules' => [
                    "required",
                ]
            ],
        ])->withViewData([
            // phpcs:ignore
            'before_button_save' => '<a class="btn btn-default" href="'.route('admin::permohonan-pemakaian-kendaraan.page-list').'"><i class="fa fa-chevron-left"></i> Cancel</a>&nbsp;',
        ]);
    }

        /**
     * Get Penanggung Jawab
     *
     * @return array
     */
    protected function getPenanggungJawab()
    {
        return $this->karyawan
            ->select(['id as value', 'nama as label'])
            ->where('role', 'manajer')
            ->get()
            ->toArray();
    }
}
