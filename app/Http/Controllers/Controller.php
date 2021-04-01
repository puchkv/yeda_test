<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Jobs\SendEmail;
use App\Mail\Email;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        return view('index');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), User::$rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email
        ]);

        //Отправка мейла админу, оттправленное сообщение записывается в лог
        SendEmail::dispatch($user->email);

        return redirect()->back()->with('response', 'User has been added!');
    }
}
