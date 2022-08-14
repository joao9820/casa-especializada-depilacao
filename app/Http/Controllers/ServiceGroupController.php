<?php

namespace App\Http\Controllers;

use App\Repositories\PromotionRepository;
use App\Repositories\ServiceGroupRepository;
use Illuminate\Http\Request;

class ServiceGroupController extends Controller
{

    private $serviceGroupRepository, $promotionRepository;

    function __construct(ServiceGroupRepository $serviceGroupRepository, PromotionRepository $promotionRepository)
    {
        $this->serviceGroupRepository = $serviceGroupRepository->getModel();
        $this->promotionRepository = $promotionRepository;
    }

    public function index()
    {
        $serviceGroups = $this->serviceGroupRepository->with(['services' => function($query){
            return $query->orderBy('name');
        }])->get();

        $promotions = $this->promotionRepository->getAllActivitiesPromotions();

        if($promotions->isNotEmpty()){
            $promotions->each(function($promo) {
                $promo->old_price = $promo->services->sum('price_number');
            });
        }

        return view('services', compact('serviceGroups', 'promotions'));
    }

    public function show($id){

        $serviceGroup = $this->serviceGroupRepository->find($id);

        if(!$serviceGroup){
            return redirect('/');
        }

        /* $serviceGroup->name .= $serviceGroup->audience == 'F' ? ' Fem.' : ' Masc.'; */

        $serviceGroup->load(['services' => function($query){
            return $query->orderBy('name');
        }]);

        //dd($serviceGroup);

        //$serviceGroup->services = $serviceGroup->services->sortBy('name');

        return view('serviceInfo', compact('serviceGroup'));

    }
}
