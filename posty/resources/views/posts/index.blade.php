@extends('layouts.app')
@section('content')
    <div class="flex justify-center ">
         <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route ('posts')}}" method="POST">
                @csrf
                <div class="">
                    <label for="body" class="sr-only">body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="bg-gray-200 border-2 w-full p-4 m-2 rounded-lg @error('body') border-red-500 @enderror" placeholder="write something "></textarea>
                    @error('body')
                        <div class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button  type="submit" class="bg-blue-400 rounded-lg p-3 m-3 ">Post</button>
            </form>
            @if($posts->count())
                @foreach ($posts as $post )
                    <div class="mb-5 bg-blue-200 p-2 m-1  rounded-lg">
                        <a href="{{route('users.posts',$post->user)}}" class="font-bold">{{$post->user->name}}</a>
                        <span class="text-gray-600 text-xs">{{$post->created_at->diffForHumans()}}</span>
                        @can('Delete',$post)
                            <form method="POST" action="{{route('posts.Destroy',$post)}}" class="mr-5 inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" text-sm bg-red-300 rounded-lg text-blue-700 p-2">Delete</button>
                            </form>
                        @endcan
                        <p class="mb-5"> {{$post->body}}</p>
                    </div>
                   
                    <div>
                        @auth
                        @if(!$post->LikedBy(auth()->user()))
                            <form action="{{route('posts.likes',$post)}}" method="POST" class="mr-5 inline">
                                @csrf
                                <button type="submit" class="text-blue-400"> like</button>
                            </form>
                        @else
                            <form method="POST" action="{{route('posts.likes',$post)}}" class="mr-5 inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-400"> Unlike</button>
                            </form>
                        @endif
                        
                        @endauth
                        <span class='text-xs'>{{$post->Likes->count()}} {{Str::plural('like',$post->Likes->count())}}</span>
                        
                    </div>
                @endforeach
                    {{$posts->links()}}
            @else
                <p>there are no posts</p> 
            @endif
        </div>
    </div>
@endsection