@props(['post'=> $post])
<div class=" bg-blue-200 mb-5 p-2 rounded-lg">
    <a href="{{route('users.posts',$post->user)}}" class="font-bold">{{$post->user->name}}</a>
    <span class="text-gray-600 text-xs">{{$post->created_at->diffForHumans()}}</span>
    @can('Delete',$post)
        <form method="POST" action="{{route('posts.Destroy',$post)}}" class="mr-5 inline">
            @csrf
            @method('DELETE')
            <button type="submit" class=" text-sm bg-red-300 rounded-lg text-blue-700 p-2">Delete</button>
        </form>
    @endcan
    <p class="m-5 block"> {{$post->body}}</p>
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