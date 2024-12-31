@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')


    <div class="bg-white flex p-4 rounded-md gap-x-5 gap-y-10 flex-col md:flex-row">
       
        <div class=" py-2 px-5 rounded-md border border-gray-300 ">
            <p class="text-xl font-semibold text-green-600">Motor Sedang Dirental</p>
            <hr class="my-2">
            <ul>
                @foreach ($rentedMotors as $motor )
                <li class="flex my-1 text-left items-center gap-x-2 py-1">
                    <span class="rounded-md text-gray-600 font-bold">{{ $motor->nomor_plat }}</span>
                    <p class="">                    
                        {{ $motor->merek }} {{ $motor->tipe }}</p>
                </li>
                @endforeach
            </ul>
        </div>

        <div class=" py-2 px-5 rounded-md border border-gray-300">
            <p class="text-xl font-semibold text-red-400">Motor dalam perawatan</p>
            <hr class="my-2">
            <ul>
                @if ($maintenancedMotors->isEmpty())
                <h1>Tidak ada motor dalam perawatan</h1>
            @else
                @foreach ($maintenancedMotors as $motor)
                    <li class="flex my-1 text-left items-center gap-x-2 py-1">
                        <span class="rounded-md text-gray-600 font-bold">{{ $motor->nomor_plat }}</span>
                        <p class="">                    
                            {{ $motor->merek }} {{ $motor->tipe }}
                        </p>
                    </li>
                @endforeach
            @endif
            </ul>
        </div>

        <div class=" py-2 px-5 rounded-md border border-gray-300">
            <p class="text-xl font-semibold text-red-400">Motor yang tersedia</p>
            <hr class="my-2">
            <ul>
                @foreach ($availableMotors as $motor )
                <li class="flex my-1 text-left items-center gap-x-2 py-1">
                    <span class="rounded-md text-gray-600 font-bold">{{ $motor->nomor_plat }}</span>
                    <p class="">                    
                        {{ $motor->merek }} {{ $motor->tipe }}</p>
                </li>
                @endforeach
            </ul>
        </div>

    </div>

    
    {{-- <a href="/admin/motor" class="bg-teal-800 text-white py-2 px-5 rounded-md font-bold">Ke Motor</a>
    <a href="/admin/motorHarga" class="bg-teal-800 text-white py-2 px-5 rounded-md font-bold">Ke Harga</a> --}}

  
    
@endsection
