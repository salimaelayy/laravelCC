@extends('layouts.app')
@section('content')
    <div class="flex justify-center ">
         <div class="w-12/12 bg-white p-6 flex justify-center rounded-lg">
        <form action="{{route ('register')}}" method="post">
            @csrf
            <div class="mb-4 bg">
                <label for="name" class="sr-only">Name</label>
                <input type="text" id="name" class="bg-grey-300 border-2 w-full p-4 rounded-lg @error('name')border-red-300 @enderror " value="{{old('name')}}" name="name" placeholder="Enter Name Here">
                @error('name')
                    <div class="text-sm text-red-500 mt-2">
                        {{$message}}
                    </div>
                @enderror  
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">UserName</label>
                <input type="text" id="username" class="bg-grey-300 border-2 w-full p-4 rounded-lg @error('username')border-red-300 @enderror" name="username" value="{{old('username')}}" placeholder="Enter UserName Here">
                @error('username')
                <div class="text-sm text-red-500 mt-2">
                    {{$message}}
                </div>
            @enderror  
            </div>
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
                <label for="password-confirmation" class="sr-only">Verify Password</label>
                <input type="password" class="bg-grey-300 border-2 w-full p-4 rounded-lg" id="password-confirmation" name="password-confirmation" value="" placeholder="Verify Password ">
            </div>
            <div class="mb-4">
                <input type="submit" name="Submit" class="bg-blue-500 border-2 w-full p-4 rounded-lg" name="submit" value="submit"  >
            </div>
        </form>
        </div>
    </div>
@endsection