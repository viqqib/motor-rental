@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')

<div class="">

    
    {{-- @foreach ($socialLinks as $socialLink )
        <h1>{{ $socialLink->name }}</h1>
        <i class="fa-brands fa-{{ $socialLink->name }}"></i>
        <h1>{{ $socialLink->iden }}</h1>
    @endforeach --}}

    <div class="bg-white rounded-md p-5 px-7">
        <div class="bg-white w-[600px] px-3 border border-gray-200 pt-3 rounded-md">
            <p class="text-xl font-xl font-semibold text-teal-700">Sosial Media</p>
            <hr class="bg-red-700 mt-3">
            @foreach ($socialLinks as $socialLink )
            <div class="flex bg-white w-[540px] py-3 rounded-md justify-between">
                <div class="text-lg flex items-center">
                    <span class="">{{ ucfirst($socialLink->name) }}</</span> 
                    <a class="ml-10" href="">{{ $socialLink->identifier }}</</a>
                </div>
                <a href="" class="text-blue-600">Ubah</a>
            </div>
            @endforeach
        </div>
    </div>
    
</div>

@endsection
