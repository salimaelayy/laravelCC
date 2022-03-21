@extends('layouts.app')
@section('content')
    <div class="flex justify-center w-12/12">
        <div class="  w-12/12 rounded-lg m-8 p-5 bg-white"> <x-post :post="$post"/>  </div>
    </div>
@endsection