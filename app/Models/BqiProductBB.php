<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BqiProductBB extends Model
{
    protected $table = "bqi_products_bb";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['bank_id', 'type_product'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'type_product', 'value'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
