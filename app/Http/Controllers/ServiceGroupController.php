<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceGroupRepository;
use Illuminate\Http\Request;

class ServiceGroupController extends Controller
{

    private $serviceGroupRepository;

    function __construct(ServiceGroupRepository $serviceGroupRepository)
    {
        $this->serviceGroupRepository = $serviceGroupRepository;
    }

    public function index()
    {
        $serviceGroups = $this->serviceGroupRepository->all();

        return view('services', compact('serviceGroups'));
    }
}
