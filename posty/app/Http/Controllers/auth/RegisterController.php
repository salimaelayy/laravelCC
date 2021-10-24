<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //dd($request->only('email','password'));
        //validating user
        $this->validate($request,
        [
             'name'=>'required|max:25',
             'password'=>'required',
             'email'=>'required|email|max:25',
             'username'=>'required|max:25',
        ]);
        //storing user
        User::create(
        [
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        //signing in the user
        Auth()->attempt($request->only('email','password'));
        //redirecting the user
        return redirect()->route('dashboard');
        
    }
    
}
