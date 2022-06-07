<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function services() {
        return $this->belongsToMany('App\Service', 'service_promotions');
    }
}
