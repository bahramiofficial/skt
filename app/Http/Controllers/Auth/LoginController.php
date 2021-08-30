<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GenerateCodeRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\H;
use App\Services\Sms;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;

class LoginController extends Controller
{
    public function sendSmsCode(GenerateCodeRequest $request)
    {
        $mobile = AuthService::generateCode($request->mobile)->mobile;
        return View('auth.login', compact('mobile'));
    }

    
    public function loginMobile(Request $request)
    {
        AuthService::loginMobile($request->mobile, $request->code);
        if (Auth::check())
            return redirect(RouteServiceProvider::HOME);
        else
            return View('auth.login');
        // error not valid code

    }


    public function generateCode($mobile)
    {
        $user = User::firstOrCreate(['mobile' => $mobile]);
        // $user->update
    }
}
