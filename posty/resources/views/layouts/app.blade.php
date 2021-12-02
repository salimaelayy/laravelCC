<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body class="bg-blue-100 ">
    <nav class="flex items-center p-3 bg-white  justify-between mb-6 ">
        <ul class="flex items-center">
            <li class="p-4"><a href="{{route('home')}}">home</a></li>
            <li class="p-4"> <a href="{{route('dashboard')}}">Dashboard</a></li>
            
            @if(auth()->user())
                <li class="p-4"><a href="{{route('posts')}}">Posts</a></li>
            @else
            <li class="p-4"><a href="{{route('login')}}">Posts</a></li>
            @endif
        </ul>
        <ul class="flex items-center">
            @if (auth()->user())
                <li class="p-4"> <a href="">{{auth()->user()->name}}</a></li>
                <li class="p-4">
                    <form action="{{route('logout')}}" action='post' class="p-3 inline">
                        <button  type="submit">logout</button>
                        @csrf
                    </form>
                </li>
            @else
                <li class="p-4"> <a href="{{route ('login')}}">login</a></li>
                <li class="p-4"><a href="{{route ('register')}}">register</a></li>
            @endif
              </ul>
    </nav>
    @yield('content')
    

</body>
</html>