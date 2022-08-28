<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ContactStore;
use Exception;

class SendEmailController extends Controller
{


    public function store(Request $request){

       $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'msg' => 'required|string',
        ]);

        try{

            Mail::send(new ContactStore($request->input('name'), $request->input('email'),
            $request->input('subject'), $request->input('msg'), $request->input('phone')));

            $request->session()->flash('msg', ['status' => 'success', 'title' => 'Mensagem enviada com sucesso!',
            'desc' => 'Obrigado pelo contato, responderemos assim que possível.']);

        }catch(\Exception $e){

            //dd($e);

            $request->session()->flash('msg', ['status' => 'danger', 'title' => 'Mensagem não enviada!', 'desc' => 'Houve um erro interno, tente novamente mais tarde.']);

        }

        return redirect('contato');

    }
}
