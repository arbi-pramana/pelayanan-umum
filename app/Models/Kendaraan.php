<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kendaraan extends Model
{
    // use SoftDeletes;
    protected $table ='kendaraan';
    protected $fillable =[
        'nama_kendaraan',
        'tipe_bbm',
        'no_pol',
        'status_kendaraan'
    ];
}
