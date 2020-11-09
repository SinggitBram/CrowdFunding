<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Otp_code;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\RegisterOtpEvent;

class RegenerateOtpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            'email' => ['email', 'required']
        ]);


        $user = User::where('email' , request('email'))->first();
        $otp_code = Otp_code::where('user_id',$user->id);
        $otp_code->delete();

        $current = Carbon::now();
        $otpExpires = $current->addMinutes(5);
        $randomOtp = Str::random(6);
        Otp_code::create([
            'otp_code' => $randomOtp,
            'valid_until' => $otpExpires,
            'user_id' => $user->id,
        ]);
        $user['code'] = $randomOtp;
        event(new RegisterOtpEvent($user));
        $user->makeHidden(['code']);
        return response()->json([
            'response_code' => "00",
            'response_message' => 'silahkan cek email',
            'data' => $user
        ]);
    }
}
