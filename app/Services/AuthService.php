<?php

namespace App\Services;


use Carbon\Carbon;
use App\Services\H;
use App\Models\User;
use App\Events\GenerateCodeToLogin;
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Http\Requests\Auth\GenerateCodeRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthService
{
    public static function login(LoginRequest $request) //: PersonalAccessTokenResult
    {
        $mobile = H::toMobile($request->mobile);

        /** @var User $user */
        $user = User::where(['mobile' => $mobile, 'code' => $request->code])->first();

        if (!$user) {
            throw new ModelNotFoundException('User not found');
        }

        $tokenResponse = $user->createToken('Personal token');
        $token = $tokenResponse->token;
        $expirationDays = env('AUTH_TOKEN_EXPIRATION_DAYS', 30);
        $token->expires_at = Carbon::now()->addDays($expirationDays);
        $token->save();

        return $tokenResponse;
    }

    public static function generateCode($mobile)
    {
        $mobile = H::toMobile($mobile);
        $code = random_int(1000, 9999);
        $expirationTime = now()->addMinutes(env('LOGIN_CODE_EXPIRATION_DURATION_IN_MINUTES', 5));

        if ($user = User::where('mobile', $mobile)->first()) {
            $user->code = $code;
            $user->code_expiration = $expirationTime;
            $user->save();
        } else {
            $user = User::create([
                'mobile' => $mobile,
                'code' => $code,
                'code_expiration' => $expirationTime,

            ]);
        }

        event(new GenerateCodeToLogin($user));

        return $user;
    }



    public static function loginMobile($mobile, $code)
    {
        /** @var User $user */
        $user = User::where('mobile', H::toMobile($mobile))->first();
        if($user)
        {
            if($user->code === $code){
                if($user->code_expiration  >=  Carbon::now() ){
                    Auth::login($user);
                }else{

                }
                //error code tim out
            }else{

            }
        }else{

        }
    }

}
