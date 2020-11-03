<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chart3Top10 extends Model
{
    protected $table = "chart3_top10";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'kind', 'kws', 'report_time'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'kind', 'kws', 'report_time', 'volumn_search'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
