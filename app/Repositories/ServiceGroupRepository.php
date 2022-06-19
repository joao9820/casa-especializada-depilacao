<?php

namespace App\Repositories;

use App\ServiceGroup;

class ServiceGroupRepository extends BaseRepository {

    function __construct(ServiceGroup $model)
    {
        parent::__construct($model);
    }

    public function getFemaleServices(){
        return $this->model->where('audience', 'F')->get();
    }

    public function getMaleServices(){
        return $this->model->where('audience', 'M')->get();
    }

}
