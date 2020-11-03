<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvgSearch extends Model
{
    protected $table = "avg_searchs";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'type_search', 'type_data'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'type_search', 'value', 'type_data'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
