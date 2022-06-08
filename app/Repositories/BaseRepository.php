<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class BaseRepository {

    protected $model;

    function __construct(Model $model)
    {
        $this->model = $model;
    }

    /** Retorna uma instância da model setada pelo repository para utilização dos métodos de Model e Builder*/
    public function getModel() {
        return $this->model;
    }
}
