<?php

namespace App\Repositories;

use App\Promotion;

class PromotionRepository extends BaseRepository {

    function __construct(Promotion $model)
    {
        parent::__construct($model);
    }

    public function getAllActivitiesPromotions(){
        return $this->model->with('services')->where('active', 1)->get();
    }


}
