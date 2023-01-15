<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayoutRuang extends Model
{
    protected $table = 'layout_ruang';

    protected $fillable =[
        'nama_layout_ruang',
        'foto'
    ];
}
