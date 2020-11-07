<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
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
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = request(['email','password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'response_code'=> '01',
                'response_message' => 'Email atau Password salah',
            ],401);
        };

        $user = User::where('email', request('email'))->first();

        $data['token'] =$token;
        $data['user'] = $user;
        return response()->json([
            'response_code' => '00',
            'response_message' => 'user berhasil login',
            'data' => $data
        ]);
    }
}
