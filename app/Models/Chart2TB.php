<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chart2TB extends Model
{
    protected $table = "chart2_tb";

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
        'bank_id', 'value_bqi', 'value_care', 'value_compared_to_1', 'value_compared_to_3', 'report_time'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the phone record associated with the user.
     */
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }
}
