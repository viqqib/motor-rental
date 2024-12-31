@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    @include('frontend.home_hero')
    @include('frontend.home_motor')
    <div class="bg-white p-5">
        @include('frontend.home_rental')
    </div>
    <div class="p-5 mt-5">
        @include('frontend.home_whyus')
    </div>

    

    
 
    
@endsection
