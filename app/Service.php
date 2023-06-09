<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{


    const PRICE_OFF = [
        60 => 0.10,
        0 => 0.05,
    ];

    /* const PRICE_OFF = 0; */

    private $append = [
        'price_number',
        'price_off'
    ];

    function getPriceNumberAttribute(){

        return $this->attributes['price'];
    }

    function getPriceAttribute(){
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    function getPriceOffAttribute() {

        $price = $this->attributes['price'];

        if(!self::PRICE_OFF){
            return 0;
        }

        $priceOff = collect(self::PRICE_OFF);

        $off = $priceOff->first(function($value, $key) use ($price){
            return $price >= $key;
        });

        return number_format($price - ($price * $off), 2, ',', '.');
    }



}
