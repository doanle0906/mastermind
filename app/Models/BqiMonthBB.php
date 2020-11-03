<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BqiMonthBB extends Model
{
    protected $table = "bqi_month_bb";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'type_value', 'report_time'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'type_value', 'report_time', 'value'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
