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
        </div>
    </div>
@endsection