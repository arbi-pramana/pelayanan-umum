<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table ='notifications';

    public function ruangan(){

        return $this->hasOne('App\Models\PemesananRuangan', 'id','pemesanan_ruangan_id');

    }
    public function kendaraan(){

        return $this->hasOne('App\Models\PermohonanPemakaianKendaraan', 'id','permohonan_pemakaian_kendaraan_id');

    }
    public function konsumsi(){

        return $this->hasOne('App\Models\PermohonanKonsumsi', 'id','permohonan_konsumsi_id');

    }
}
