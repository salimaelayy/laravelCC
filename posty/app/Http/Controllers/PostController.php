<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
     
       /* $request->user()->post()->create(
            [
                'body'=>$request->body
            ]
            
        );
        return back();*/
        /*post::create([
            'user_id'=>auth()->id(),
            'body'=>$request->body
        ]);*/
    }
    
        
    
}
