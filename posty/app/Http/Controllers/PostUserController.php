<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    public function index(User $user)
    {
        return view('users.posts.index',
        [ 
            'user'->$user,
        ]);
    }
}
