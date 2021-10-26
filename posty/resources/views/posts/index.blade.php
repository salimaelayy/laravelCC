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
                <button type="submit" class="bg-blue-400 rounded-lg p-3 ">Post</button>
            </form>
            @if($posts->count())
                @foreach ($posts as $post )
                    <div class="mb-5">
                        <a href="" class="font-bold">{{$post->user->name}}</a>
                        <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        <p class="mb-5"> {{$post->body}}</p>
                    </div>
                @endforeach
                <div>
                    {{$posts->links()}}
                </div>
            @else
                <p>there are no posts</p> 
            @endif
        </div>
    </div>
@endsection