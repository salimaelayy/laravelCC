<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        /*dd('logout');*/
        
        auth() ->logout();
         return redirect()->route('home');
    }
} 
