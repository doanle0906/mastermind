<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chart1BB extends Model
{
    protected $table = "chart1_bank_index";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'report_time'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'report_time', 'value'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function getValueAttribute($value) {
        return number_format($value, 1);
    }
}
