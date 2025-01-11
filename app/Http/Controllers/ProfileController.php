<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ProfileController extends Controller
{
    public function index()
    {
        return view('chat.chat');
    }

    public function edit()
    {
        $users = User::with("messages")->where('id', '!=', auth()->id())->get();

        return view(
            'home',
            [
                'users' => $users
            ]
        );
    }
}
