<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceGroupRepository;
use App\ServiceGroup;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceGroupRepository;

    function __construct(ServiceGroupRepository $serviceGroupRepository)
    {
        $this->serviceGroupRepository = $serviceGroupRepository->getModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceGroups = $this->serviceGroupRepository->all();

        return view('services', compact('serviceGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
