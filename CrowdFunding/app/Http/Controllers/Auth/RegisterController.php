<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Otp_code;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Mail\RegisterOtpMail;
use Illuminate\Http\Request;
use App\Events\RegisterOtpEvent;

class RegisterController extends Controller
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
            'name' => ['string', 'required'],
            'email' => ['email', 'required', 'unique:users,email']
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        $current = Carbon::now();
        $otpExpires = $current->addMinutes(5);
        $randomOtp = Str::random(6);
        $newUser = User::where('email', request('email'))->first();
        Otp_code::create([
            'otp_code' => $randomOtp,
            'valid_until' => $otpExpires,
            'user_id' => $newUser->id,
        ]);

        $newUser['code'] = $randomOtp;
        event(new RegisterOtpEvent($newUser));
        $newUser->makeHidden(['code']);

        return response()->json([
            'response_code' => "00",
            'response_message' => 'silahkan cek email',
            'data' => $newUser
        ]);
    }
}
