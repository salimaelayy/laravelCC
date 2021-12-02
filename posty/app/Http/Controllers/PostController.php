<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(20);
        $posts = Post::latest()->with(['user','likes'])->paginate(20);
        return view('posts.index',[
            'posts'=>$posts
        ]);
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
    public function Destroy(Post $post)
    {
        $this->authorize('Delete', $post);
        $post->delete();
        return back();
    }

    
        
    
}
