@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white rounded-md p-4">
    <p class="text-xl mb-1 font-semibold text-teal-700">Jumlah motor yang disewa</p>

    <div class="flex gap-x-3 mb-4">
        <div class="bg-teal-600 py-2 w-[170px] px-4 rounded-sm text-white">
            <p class="font-semibold">Hari Ini</p>
            <hr class="my-1">
            <div>
                <p class="text-7xl font-bold">{{ $rentedToday }}</p>
                <p>Unit</p>
            </div>
        </div>

        <div class="bg-blue-500 py-2 w-[170px] px-4 rounded-sm text-white">
            <p class="font-semibold">Minggu Ini</p>
            <hr class="my-1">
            <div>
                <p class="text-7xl font-bold">{{ $rentedThisWeek }}</p>
                <p>Unit</p>
            </div>
        </div>

        <div class="bg-red-400 py-2 w-[170px] px-4 rounded-sm text-white">
            <p class="font-semibold">Bulan Ini</p>
            <hr class="my-1">
            <div>
                <p class="text-7xl font-bold">{{ $rentedThisMonth }}</p>
                <p>Unit</p>
            </div>
        </div>

       
    </div>

    <!-- Motor Sedang Dirental -->
    <p class="text-xl mb-1 font-semibold text-teal-600">Motor dalam penyewaan</p>
        <div>
            <table class="w-full text-left ">
                <thead class="bg-teal-500 text-white rounded-t-lg">
                    <tr>
                        <th class="px-4 py-3 font-medium">Unit</th>
                        <th class="px-4 py-3 font-medium">Penyewa</th>
                        <th class="px-4 py-3 font-medium">Durasi Sewa</th>
                        <th class="px-4 py-3 font-medium">Berakhir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($rentedMotors as $motor)
                        <tr class="hover:bg-gray-200 bg-gray-100">
                            <td class="px-4 py-3 font-semibold text-gray-700">{{ $motor->motor->nomor_plat }} <span class="font-normal"> {{ $motor->motor->merek }} {{ $motor->motor->tipe }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $motor->renter->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $motor->durasi_sewa }} Hari</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ \Carbon\Carbon::parse($motor->tgl_selesai)->translatedFormat('j F Y') }}
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <p class="text-xl mb-1 font-semibold text-teal-600 mt-5">Motor yang telah dibooking</p>
        <div>
            <table class="w-full text-left ">
                <thead class="bg-teal-500 text-white rounded-t-lg">
                    <tr>
                        <th class="px-4 py-3 font-medium">Unit</th>
                        <th class="px-4 py-3 font-medium">Penyewa</th>
                        <th class="px-4 py-3 font-medium">Durasi Sewa</th>
                        <th class="px-4 py-3 font-medium">Mulai</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($bookedMotors as $motor)
                        <tr class="hover:bg-gray-200 bg-gray-100">
                            <td class="px-4 py-3 font-semibold text-gray-700">{{ $motor->motor->nomor_plat }} <span class="font-normal"> {{ $motor->motor->merek }} {{ $motor->motor->tipe }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $motor->renter->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $motor->durasi_sewa }} Hari</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ \Carbon\Carbon::parse($motor->tgl_mulai)->translatedFormat('j F Y') }}
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    
    <!-- Motor dalam perawatan -->
    {{-- <div class="py-2 px-5 rounded-md mb-4 shadow-md border">
        <p class="font-semibold text-red-400">Motor dalam Perawatan</p>
        <hr class="my-2">
        <ul class="list-disc">
            @if ($maintenancedMotors->isEmpty())
                <li class="text-gray-600">Tidak ada motor dalam perawatan</li>
            @else
                @foreach ($maintenancedMotors as $motor)
                    <li class="flex items-center gap-x-2 py-1">
                        <span class="rounded-md text-gray-600 font-bold">{{ $motor->nomor_plat }}</span>
                        <p>{{ $motor->merek }} {{ $motor->tipe }}</p>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <!-- Motor yang tersedia -->
    <div class="py-2 px-5 rounded-md shadow-md border">
        <p class="font-semibold text-teal-700">Motor yang Tersedia</p>
        <hr class="my-2">
        <ul class="list-disc">
            @foreach ($availableMotors as $motor)
                <li class="flex items-center gap-x-2 py-1">
                    <span class="rounded-md text-gray-600 font-bold">{{ $motor->nomor_plat }}</span>
                    <p>{{ $motor->merek }} {{ $motor->tipe }}</p>
                </li>
            @endforeach
        </ul>
    </div> --}}
</div>
@endsection
