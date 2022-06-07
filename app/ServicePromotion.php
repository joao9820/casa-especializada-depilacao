<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePromotion extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'promotion_id', 'service_id'
    ];

    protected $table = "service_promotions";
}
