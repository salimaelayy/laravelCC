<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function store(Post $post,request $request)
    {
        if($post->LikedBy($request->user()))
        { 
            return response(null,409);
        }
       $post->likes()->create(
        [
            'user_id'=>$request->user()->id,
        ]
        );
        return back();
    
    } 
}
