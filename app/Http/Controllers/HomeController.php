<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceGroupRepository;
use App\ServiceGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $serviceGroupRepository;

    function __construct(ServiceGroupRepository $serviceGroupRepository)
    {
        $this->serviceGroupRepository = $serviceGroupRepository;
    }

    public function index(){

        $serviceGroups = $this->serviceGroupRepository->where('audience', 'F')->get();

        return view('home', compact('serviceGroups'));

    }
}
