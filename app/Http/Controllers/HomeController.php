<?php

namespace App\Http\Controllers;

use App\ServiceGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $serviceGroups = ServiceGroup::all();

        return view('home', compact('serviceGroups'));

    }
}
