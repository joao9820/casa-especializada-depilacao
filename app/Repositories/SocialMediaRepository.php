<?php

namespace App\Repositories;

use App\SocialMedia;

class SocialMediaRepository {

    protected $model;

    function __construct(SocialMedia $model)
    {
        $this->model = $model;
    }

    /** Retorna uma instância da model setada pelo repository para utilização dos métodos de Model e Builder*/
    public function getModel() {
        return $this->model;
    }
}
