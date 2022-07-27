<?php

namespace App\Http\Controllers;

use App\Repositories\PromotionRepository;
use App\Repositories\ServiceGroupRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $serviceGroupRepository, $promotionRepository;

    function __construct(ServiceGroupRepository $serviceGroupRepository, PromotionRepository $promotionRepository)
    {
        $this->serviceGroupRepository = $serviceGroupRepository;
        $this->promotionRepository = $promotionRepository;
    }

    public function index(){

        $serviceGroupsFemale = $this->serviceGroupRepository->getFemaleServices();
        $serviceGroupsMale = $this->serviceGroupRepository->getMaleServices();

        $promotions = $this->promotionRepository->getAllActivitiesPromotions();

        /* dd($promotions); */

        $promotions->each(function($promo) {
            $promo->old_price = $promo->services->sum('price_number');
        });

        //dd($promotions);

        return view('home', compact('serviceGroupsFemale', 'serviceGroupsMale', 'promotions'));

    }
}
