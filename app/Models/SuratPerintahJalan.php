<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Thu, 19 Jul 2018 11:00:32 +0000
 */
class SuratPerintahJalan extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "surat_perintah_jalan";

    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'id_permohonan_pemakaian_kendaraan',
        'nama_pengemudi',
        'tujuan',
        'jarak',
        'bbm_1',
        'bbm_2',
        'total_biaya',
        'total_biaya_2',
        'tanggal_berangkat',
        'tanggal_kembali',
        'jam_berangkat',
        'jam_kembali',
        'pengisian_bbm',
        'penanggung_jawab',
        'status_pj',
        'penanggung_jawab_pool',
        'status_pj_pool',
        'kendaraan_id',
        'driver_id',
        'biaya_toll',
        'status_perjalanan'
    ];
    
    /**
     * The primary key for the model
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        "deleted_at"
    ];

    public function driver(){

        return $this->hasOne('App\Models\Driver', 'id','driver_id');

    }
    public function permohonankendaraan(){

        return $this->hasOne('App\Models\PermohonanPemakaianKendaraan', 'id','id_permohonan_pemakaian_kendaraan');

    }
    public function kendaraan(){

        return $this->hasOne('App\Models\Kendaraan', 'id','kendaraan_id');

    }
}
