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
        $this->serviceGroupRepository = $serviceGroupRepository->getModel();
        $this->promotionRepository = $promotionRepository;
    }

    public function index(){

        $serviceGroups = $this->serviceGroupRepository->where('audience', 'F')->get();
        $promotions = $this->promotionRepository->getAllActivitiesPromotions();

        return view('home', compact('serviceGroups', 'promotions'));

    }
}
