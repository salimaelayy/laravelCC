<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        //dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
        $request->user()->posts()->create($request->only('body'));
            return back();
     
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
