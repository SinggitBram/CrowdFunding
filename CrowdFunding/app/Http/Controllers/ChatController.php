<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    // public function __construct()
    // {
    //     return $this->middleware('auth');
    // }

    public function all_chats()
    {
        return Chat::with('user')->orderBy('created_at', 'desc')->take(30)->get();
    }

    public function store(Request $request)
    {

        $theUser = User::where('email', $request->email)->first();

        $chat = Chat::create([
            'subject' => $request->subject,
            'user_id' => $theUser->id
        ]);
        return $chat;
    }
}
