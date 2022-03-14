@extends('layouts.app')
@section('content')
    <div class="flex flex-row w-full   ">
        <div class="m-2 text-2xl capitalize font-medium mb-1 rounded-lg">
            <h1>{{$user->name}}</h1>
            <p class="text-sm text-blue-400">Posted {{$posts->count()}} {{Str::plural('post',$posts->count())}} and received {{ $user->ReceivedLikes()->count()}} Likes</p>
        </div>
        <div class="w-10/1 bg-white p-6 justify-center rounded-lg">
            @if($posts->count())
                @foreach ($posts as $post )
                    <x-post :post="$post"/>  
                @endforeach
                    {{$posts->links()}}
            @else
                <p>{{$user->name}} does not have any posts</p> 
            @endif
        
        </div>
    </div>
@endsection