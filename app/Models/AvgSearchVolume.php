<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvgSearchVolume extends Model
{
    protected $table = "avg_search_volumes";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'kws'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'kws', 'value'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
