@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    @include('frontend.home_hero')
    @include('frontend.home_motor')

    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold">Welcome to Three J Rental Motor!</h1>
        <p class="font-serif">Explore our motorbike rental services and enjoy your trip.</p>
    </div>
@endsection
