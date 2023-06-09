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

    public function show($slug){

        $serviceGroup = $this->serviceGroupRepository->where('slug', $slug)->first();

        /* Valor e porcentagem de desconto */
        $off = collect([
            60 => 0.05,
            61 => 0.1
        ]);

        ;

        if(!$serviceGroup){
            //return redirect('/');
            //Necessário para parar de indexar urls desatualizadas no google search
            abort(404);
        }

        /* $serviceGroup->name .= $serviceGroup->audience == 'F' ? ' Fem.' : ' Masc.'; */

        $serviceGroup->load(['services' => function($query){
            return $query->orderBy('name');
        }]);

        if($serviceGroup->services->isNotEmpty() && $off){
            $serviceGroup->services->map(function($serv) use ($off){

                $price = $serv->price_number;

                //dd($price);

                $price_off = $off->first(function($value, $key) use ($price){
                    return $price <= $key;
                });

                $serv->price_off =  $price - ($price * $price_off);

            });
        }

        //dd($serviceGroup->services);
        //dd($serviceGroup);

        //$serviceGroup->services = $serviceGroup->services->sortBy('name');

        return view('serviceInfo', compact('serviceGroup'));

    }
}
