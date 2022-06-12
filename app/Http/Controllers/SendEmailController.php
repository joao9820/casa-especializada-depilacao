<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SendEmailController extends Controller
{
    public function store(Request $request){


        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'text' => 'required|string',
        ]);

        //if($validation->fails())


    }
}
