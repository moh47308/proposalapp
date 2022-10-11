<?php

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Jobs\sendMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\resetPasswordMailSend;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

       return view('frontend.password.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        $data = $token;
        sendMail::dispatch(Mail::to($request->email)->send(new resetPasswordMailSend($data)))->delay(now()->addMinutes(10));
        return redirect('login');
    }
}
