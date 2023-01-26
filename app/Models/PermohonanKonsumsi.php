<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Wed, 06 Jun 2018 09:10:05 +0000
 */
class PermohonanKonsumsi extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "permohonan_konsumsi";

    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = [
        "no_permohonan_konsumsi",
        "pemohon_id",
        "tanggal",
        "tanggal_selesai",
        "jam",
        "sumber_dana",
        "kegiatan",
        "jenis_konsumsi",
        "jumlah",
        "pemohon",
        "status_pj",
        "keterangan",
        "attachment",
        "jumlah",
        "status_pelaksana",
        "alasan_reject"
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

    public function nomor(){

        return $this->hasOne('App\Models\PemesananRuangan', 'id','no_permohonan_konsumsi');

    }
   
}
