<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    function getNewPriceAttribute(){
        return number_format($this->attributes['new_price'], 2, ',', '.');
    }

    public function services() {
        return $this->belongsToMany('App\Service', 'service_promotions');
    }

}
