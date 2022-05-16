<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LikePostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post,Request $request)
    {
    //dd($post->Likes()->withTrashed()->get()/*->where('user_id',$request->auth()->user()->id)->count()*/);
        if($post->LikedBy($request->user()))
        { 
            return response(null,409);
        }
        $post->likes()->create(
            [ 'user_id'=>$request->user()->id]
        );
        if(!$post->Likes()->onlyTrashed()->where('user_id',$request->user()->id)->count())
        {
            Mail::to($post->user)->send(new PostLiked(auth()->user(),$post));
        }
        return back();
    
    } 
    public function Destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
