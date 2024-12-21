<!-- resources/views/motor/index.blade.php -->

@extends('frontend.layouts.app')

@section('title', 'List of Motors')

@section('content')
    <div class="mx-auto md:pt-1 px-5 pt-1 md:px-1 lg:px-32 md:mt-5 mt-3 pb-10">
        <h2 class="text-base md:text-2xl font-semibold">Motor Tersedia</h2>

        <div class="w-full mx-auto md:px-0  h-auto py-6 flex flex-wrap md:flex-row gap-x-5 justify-center gap-y-4 mt-5">
            @foreach($motors as $motor)
                <div class="py-1 rounded-md px-2 md:px-3 w-40 md:w-64 bg-white" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                    <div class="text-atas">
                        <p class="text-gray-500 bike-brand text-xs md:text-base">{{ $motor->merek }}</p>
                        <p class="bike-type text-sm md:text-xl -mt-1 font-bold">{{ $motor->tipe }} {{ $motor->tahun }}</p>
                    </div>
                    <div class="bike-img my-1 md:my-2">
                        <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->tipe }}" class="w-full h-[100px] md:h-[170px] rounded-md">
                    </div>

                    <div class="bike-price pb-1">
                        <p class="md:text-2xl text-sm font-bold mb-1 md:mb-1 mt-1">
                            Rp. {{ $motor->motorHarga ? number_format($motor->motorHarga->harga_12_jam, 0, ',', '.') : 'Harga' }}
                            <span class="text-xs">/ </span>
                            <span class="text-[0.65rem] font-semibold text-gray-500">12 Jam</span>
                        </p>

                        {{-- <a href="{{ route('motor.show', $motor->id) }}">View Details</a> --}}

                        <a href="{{ route('motor.show', $motor->id) }}" >
                            <button class="w-full text-white  bg-logo rounded-md text-xs md:text-base py-1.5 md:py-2 font-bold duration-300   hover:bg-primary">
                                Cek Motor
                            </button>
                        </a>
                        {{-- <a href="" class="w-full bg-black">jdjjd</a> --}}

                        {{-- <a href="{{ route('motor.show', $motor->id) }}" class="w-[850px] text-xs md:text-base py-1.5 md:py-2 font-bold rounded-md duration-300 bg-logo text-white hover:bg-primary">
                            Rental Sekarang
                        </a> --}}
                    </div>
                </div>
            @endforeach
        </div>


        <h2 class="text-base md:text-2xl font-semibold">Sedanng Dirental</h2>

        <div class="w-full mx-auto md:px-0  h-auto py-6 flex flex-wrap md:flex-row gap-x-5 justify-center gap-y-4 mt-5">
            @foreach($rented_motors as $motor)
                <div class="py-1 rounded-md px-2 md:px-3 w-40 md:w-64 bg-white" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                    <div class="text-atas">
                        <p class="text-gray-500 bike-brand text-xs md:text-base">{{ $motor->merek }}</p>
                        <p class="bike-type text-sm md:text-xl -mt-1 font-bold">{{ $motor->tipe }} {{ $motor->tahun }}</p>
                    </div>
                    <div class="bike-img my-1 md:my-2">
                        <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->tipe }}" class="w-full h-[100px] md:h-[170px] rounded-md">
                    </div>

                    <div class="bike-price pb-1">
                        <p class="md:text-2xl text-sm font-bold mb-1 md:mb-1 mt-1">
                            Rp.{{ $motor->harga_jam }} <span class="text-xs">/ </span>
                            <span class="text-[0.65rem] font-semibold text-gray-500">12 Jam</span>
                        </p>

                        {{-- <a href="{{ route('motor.show', $motor->id) }}">View Details</a> --}}

                        <a href="{{ route('motor.show', $motor->id) }}" >
                            <button class="w-full text-white  bg-gray-700 rounded-md text-xs md:text-base py-1.5 md:py-2 font-bold duration-300   hover:bg-primary">
                                Cek Motor
                            </button>
                        </a>
                        {{-- <a href="" class="w-full bg-black">jdjjd</a> --}}

                        {{-- <a href="{{ route('motor.show', $motor->id) }}" class="w-[850px] text-xs md:text-base py-1.5 md:py-2 font-bold rounded-md duration-300 bg-logo text-white hover:bg-primary">
                            Rental Sekarang
                        </a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
