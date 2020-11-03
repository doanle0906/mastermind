<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class Bank extends Model
{
    protected $table = "banks";

    /**
     * Indicates model primary keys.
     */
    protected $primaryKey = 'id';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'bank_name', 'type', 'image'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    protected $perPage = 10;

    public function getImageAttribute($value) {
        if (!empty($value)) {
            return URL::to(Config::get("constants.PATH_FILE_LOGO_BANK") . $value);
        }
        
        return null;
    }
}
