<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BqiProductTB extends Model
{
    protected $table = "bqi_products_tb";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = ['type_product', 'product', 'report_time'];

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_product', 'product', 'report_time', 'value'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
