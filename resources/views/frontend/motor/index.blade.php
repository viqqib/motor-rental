@extends('frontend.layouts.app')

@section('title', 'List of Motors')

@section('content')
<div class="container mx-auto px-3 lg:px-16 py-8">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Motor Tersedia</h2>
    
    <!-- Search and Filter Section -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
        <!-- Search Bar -->
        <form action="{{ route('motor.index') }}" method="GET" class="w-full md:w-1/2 flex">
            <input type="text" name="search" placeholder="Cari motor (contoh: Yamaha, Honda, dll.)"
                   class="w-full border border-gray-300 rounded-l-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-600"
                   value="{{ request('search') }}">
            <button type="submit" class="bg-logo text-white px-4 py-2 rounded-r-md hover:bg-teal-700 transition">
                <i class="fas fa-search"></i> <!-- FontAwesome search icon -->
            </button>
        </form>

        <!-- Filter Dropdown -->
        {{-- <form action="{{ route('motor.index') }}" method="GET" class="relative w-full md:w-1/3">
            <div class="flex items-center border border-gray-300 rounded-md px-4 py-2 focus-within:ring-2 bg-white focus-within:ring-teal-600">
                <i class="fas fa-filter text-gray-500 mr-2"></i> <!-- FontAwesome filter icon -->
                <select name="filter" class="w-full bg-transparent focus:outline-none">
                    <option value="">Filter</option>
                    <option value="available" {{ request('filter') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="rented" {{ request('filter') == 'rented' ? 'selected' : '' }}>Sedang Dirental</option>
                </select>
            </div>
        </form> --}}
    </div>

    @if ($message)
    <p class="text-red-500 text-center">{{ $message }}</p>
@endif

<div class="w-full mx-auto md:px-0 h-auto flex flex-wrap md:flex-row gap-x-5 justify-center gap-y-4">
    @foreach($motors as $motor)
        <!-- Your motor card rendering here -->
    @endforeach
</div>


    <!-- Available Motors -->
    <div class="w-full mx-auto md:px-0 h-auto flex flex-wrap md:flex-row gap-x-5 justify-center gap-y-4">
        @foreach($motors as $motor)
        <div class="py-1 rounded-md px-2 md:px-3 w-[10.5rem] md:w-64 bg-white" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
            <div class="text-atas">
                <p class="text-gray-500 bike-brand text-xs md:text-base">{{ $motor->merek }}</p>
                <p class="bike-type text-sm md:text-xl -mt-1 font-bold">{{ $motor->tipe }} {{ $motor->tahun }}</p>
            </div>
            <div class="bike-img my-1 md:my-2">
                <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->tipe }}" class="w-full h-[100px] md:h-[170px] rounded-md">
            </div>

            <div class="bike-price pb-1">
                <p class="md:text-2xl text-sm font-bold mb-1 md:mb-1 mt-1">
                    @if ($motor->motorHarga && $motor->motorHarga->harga_12_jam)
                        Rp {{ number_format($motor->motorHarga->harga_12_jam, 0, ',', '.') }} 
                        <span class="text-xs">/ </span>
                        <span class="text-[0.65rem] font-semibold text-gray-500">12 Jam</span>
                    @else
                        <span class="text-[10px] font-semibold text-gray-500">Harga belum tersedia</span>
                    @endif
                </p>
                <a href="{{ route('motor.show', $motor->id) }}">
                    <button class="w-full text-white bg-logo rounded-md text-xs md:text-base py-1.5 md:py-2 font-bold duration-300 hover:bg-primary">
                        Cek Motor
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Section Title -->
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 mt-12 mb-6">Sedang Dirental</h2>

    <!-- Rented Motors -->
    <div class="w-full mx-auto md:px-0 h-auto py-6 flex flex-wrap md:flex-row gap-x-5 justify-center gap-y-4 mt-5">
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
                <a href="{{ route('motor.show', $motor->id) }}">
                    <button class="w-full text-white bg-gray-700 rounded-md text-xs md:text-base py-1.5 md:py-2 font-bold duration-300 hover:bg-primary">
                        Cek Motor
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
