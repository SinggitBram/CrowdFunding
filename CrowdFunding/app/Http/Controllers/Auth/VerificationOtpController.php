<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Otp_code;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationOtpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $otp_code = Otp_code::where('otp_code',request('otp'))->first();

        if(!$otp_code){
            return response()->json([
                'response_code'=> '01',
                'response_message' => 'OTP Code tidak ditemukan',
            ],200);
        }

        $current = Carbon::now();
        if($current > $otp_code->valid_until){
            return response()->json([
                'response_code'=> '01',
                'response_message' => 'kode OTP sudah tidak berlaku, silahkan generate ulang',
            ],200);
        }

        $user = User::find($otp_code->user_id);
        $user->email_verified_at = Carbon::now();
        $user->save();

        $otp_code->delete();
        $data['user'] = $user;

        return response()->json([
            'response_code'=> '00',
            'response_message' => 'berhasil diverifikasi',
            'data' => $data,
        ],200);

    }

}
