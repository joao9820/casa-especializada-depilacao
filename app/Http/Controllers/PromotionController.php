<?php

namespace App\Http\Controllers;
use App\Repositories\ServiceGroupRepository;
use App\Repositories\PromotionRepository;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    private $serviceGroupRepository, $promotionRepository;

    function __construct(ServiceGroupRepository $serviceGroupRepository, PromotionRepository $promotionRepository)
    {
        $this->serviceGroupRepository = $serviceGroupRepository->getModel();
        $this->promotionRepository = $promotionRepository;
    }

    public function show($id){

        $serviceGroup = $this->promotionRepository->findActivitiesPromotion($id);

        if(!$serviceGroup){
            return redirect('/');
        }

        $serviceGroup->isPromotion = true;

        $serviceGroup->old_price = number_format($serviceGroup->services->sum('price_number'), 2, ',', '.');

        return view('serviceInfo', compact('serviceGroup'));

    }
}
