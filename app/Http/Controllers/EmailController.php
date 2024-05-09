<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class EmailController extends Controller
{
    public function sendEmails()
    {
        ini_set('max_execution_time', 600);
        $users = User::where('mail_addr', '!=', null)->get();                
        foreach ($users as $user) {            
            Mail::send('email', ['user' => $user], function ($message) use ($user) {
                $message->to($user->mail_addr, $user->memb___id)
                        ->subject('UnderMu SPRINT 2 Apertura 23/03 a las 17hs ARGENTINA');
            });
        }

        return "Correos electrónicos enviados correctamente";
    }
}