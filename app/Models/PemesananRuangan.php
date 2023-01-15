<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Wed, 06 Jun 2018 09:10:06 +0000
 */
class PemesananRuangan extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "pemesanan_ruangan";

    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = [
        "no_pemesanan_ruangan",
        "pemohon",
        "pemohon_id",
        "tanggal",
        "tanggal_selesai",
        "nama_acara",
        "nama_pemesan",
        "waktu_awal",
        "waktu_akhir",
        "jumlah_peserta",
        "id_ruang",
        "status_pj",
        "attachment",
        "keterangan",
        "child_ruang",
        "design_ruangan"
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

    public function ruang(){

        return $this->hasOne('App\Models\Ruang', 'id','id_ruang');

    }
    public function konsumsi(){

        return $this->hasMany('App\Models\PermohonanKonsumsi', 'no_permohonan_konsumsi','id');

    }
}
