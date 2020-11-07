<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    

    public function show(Request $request)
    {
        $user = $request->user();
        $profile = User::find($user->id);
        $data['profile'] = $profile;
        return response()->json([
            'response_code'=> '00',
            'response_message' => 'profile berhasil ditampilkan',
            'data' => $data,
        ],200);
    }

    public function update(Request $request){

        request()->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = $request->user();
        $path = $request->photo->store('/photos/users');
        $user->name = request('name');
        $user->photo = $path;
        $user->save();
        return response() ->json([
            'response_code' => '00',
            'response_message' => 'Profile berhasil diperbaharui',
            'data' => compact('user')
        ]);
    }
}
