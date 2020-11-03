<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportBank extends Model
{
    protected $table = "report_banks";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'report_time', 'type_bank', 'type_value'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'time', 'value', 'type_bank', 'type_value'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
