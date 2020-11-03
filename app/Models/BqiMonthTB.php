<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BqiMonthTB extends Model
{
    protected $table = "bqi_month_bb";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'type_value', 'kws', 'report_time'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'type_value', 'kws', 'value', 'report_time'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
