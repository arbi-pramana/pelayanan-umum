<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Generated by LaraSpell
 *
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Thu, 21 Feb 2019 11:28:00 +0000
 */
class Setting extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "setting";

    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = [
        "key",
        "value"
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
}
