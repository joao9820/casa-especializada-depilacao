<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    private $append = [
        'price_number'
    ];

    function getPriceNumberAttribute(){
        return $this->attributes['price'];
    }

    function getPriceAttribute(){
        return number_format($this->attributes['price'], 2, ',', '.');
    }



}
