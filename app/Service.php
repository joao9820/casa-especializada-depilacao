<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    function getPriceAttribute(){
        return number_format($this->attributes['price'], 2, ',', '.');
    }
}
