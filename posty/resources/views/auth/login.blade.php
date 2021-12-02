@extends('layouts.app')
@section('content')
    <div class="flex justify-center w-12/12">
         <div class="w-12/12 bg-white p-6 flex justify-center rounded-lg">
        <form action="{{route ('login')}}" method="post">
                @if (session('status'))
                    <div class="w-120 bg-red-400 m-3 text-white text-center p-2 flex  rounded-lg">
                        {{ session('status') }}
                    </div> 
                @endif  
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>    
            <input type="text" id="email"class="bg-grey-100 border-2 w-full p-4 rounded-lg @error('email')border-red-300 @enderror" name="email" value="{{old('email')}}" placeholder="Enter Email Here">
            @error('email')
            <div class="text-sm text-red-500 mt-2">
                {{$message}}
            </div>
            @enderror 
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" class="bg-grey-300 border-2 w-full p-4 rounded-lg @error('password')border-red-300 @enderror" name="password" value="" placeholder="choose Password ">
                @error('password')
                <div class="text-sm text-red-500 mt-2">
                    {{$message}}
                </div>
            @enderror  
           
            </div>
            <div class="mb-4">
                <div class="flex items-center p-1">
                    <input class="m-1" id="remember" type="checkbox" name="remember">
                    <label for="rememberme">Remember Me</label> 
                </div>
            </div>
            <div class="mb-4">
                <input type="submit" name="Submit" class="bg-blue-500 border-2 w-full p-4 rounded-lg" name="submit" value="Login"  >
            </div>
        </form>
        
        </div>
    </div>
@endsection