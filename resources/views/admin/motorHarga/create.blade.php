@extends('admin.layouts.app')

@section('title', 'Motor Harga Form')

@section('content')

<div class="container">

    <a href="{{ url('admin/motorHarga/') }}" class="px-6 py-2 font-bold bg-blue-500 rounded-md text-white">Kembali</a>

    <form action="{{ url('admin/motorHarga') }}" method="POST" enctype="multipart/form-data" class="w-full mt-5 bg-white shadow-md rounded px-8 py-6">
        @csrf <!-- CSRF token for Laravel -->

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Part 1: Harga Details -->
            <div class="bg-gray-100 p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4 text-gray-700">Harga Motor</h2>
                <div class="mb-4">
                    <label for="harga_12_jam" class="block text-gray-700 font-bold mb-2">Harga 12 Jam:</label>
                    <input type="number" name="harga_12_jam" id="harga_12_jam" 
                           value="{{ Session::get('harga_12_jam') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="harga_24_jam" class="block text-gray-700 font-bold mb-2">Harga 24 Jam:</label>
                    <input type="number" name="harga_24_jam" id="harga_24_jam" 
                           value="{{ Session::get('harga_24_jam') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="harga_1_minggu" class="block text-gray-700 font-bold mb-2">Harga 1 Minggu:</label>
                    <input type="number" name="harga_1_minggu" id="harga_1_minggu" 
                           value="{{ Session::get('harga_1_minggu') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="harga_1_bulan" class="block text-gray-700 font-bold mb-2">Harga 1 Bulan:</label>
                    <input type="number" name="harga_1_bulan" id="harga_1_bulan" 
                           value="{{ Session::get('harga_1_bulan') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Part 2: Motor Selection -->
            <div class="bg-gray-100 p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4 text-gray-700">Pilih Motor</h2>
                <div class="mb-4">
                    <label for="id_motor" class="block text-gray-700 font-bold mb-2">Motor:</label>
                    <select name="id_motor" id="id_motor" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Pilih Motor</option>
                        @foreach ($motors as $motor)
                            <option value="{{ $motor->id }}" {{ Session::get('id_motor') == $motor->id ? 'selected' : '' }}>
                                {{ $motor->merek }} - {{ $motor->tipe }} ({{ $motor->tahun }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="w-full flex flex-col md:flex-row mt-6 gap-x-10">
            <div class="text-center w-1/4">
                <button type="submit" 
                        class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
            <div class="w-3/4">
                @if ($errors->any())
                <div class="p-3 text-red-900 rounded-md h-full bg-red-200 border-gray-400 w-full">
                    @foreach ($errors->all() as $item)
                        <p>{{ $item }}</p>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </form>
</div>

@endsection
