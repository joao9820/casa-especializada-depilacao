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

    public function findActivitiesPromotion($id){

        $promotion = $this->model->where([['id',  $id],['active', 1]])->first();

        if(!$promotion)
            return;

        return $promotion->load('services');
    }


}
