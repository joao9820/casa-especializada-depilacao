<?php

namespace App\Http\Controllers;

use App\Repositories\SocialMediaRepository;
use Illuminate\Http\Request;

class MeetUsController extends Controller
{

    private $socialMediaRepository;

    function __construct(SocialMediaRepository $socialMediaRepository)
    {
        $this->socialMediaRepository = $socialMediaRepository->getModel();
    }

    public function index(){

        $socialMedia = $this->socialMediaRepository->all();

        return view('meetUs', compact('socialMedia'));

    }
}
