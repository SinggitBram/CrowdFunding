<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
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
            'email' => ['email', 'required'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'min:6']
        ]);

        $user = User::where('email', request('email'))->first();
        if(request('password') != request('password_confirmation')){
            return response()->json([
                'response_code'=> '01',
                'response_message' => 'Password dan password confirmation tidak sama, mohon coba lagi',
            ],200);
        }elseif($user->email_verified_at != null && (request('password') == request('password_confirmation'))){
            $user->update(['password' => bcrypt(request('password'))]);
            $data['user'] = $user;
            return response()->json([
                'response_code'=> '00',
                'response_message' => 'password berhasil diubah',
                'data' => $data,
            ],200);
        }
    }
}
