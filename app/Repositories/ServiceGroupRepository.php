<?php

namespace App\Repositories;

use App\ServiceGroup;

class ServiceGroupRepository extends BaseRepository {

    function __construct(ServiceGroup $model)
    {
        parent::__construct($model);
    }


}
