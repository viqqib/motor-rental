@extends('admin.layouts.app')

@section('title', 'Edit Harga Motor')

@section('content')

<div class="w-full border border-gray-200 bg-white rounded-lg shadow-md p-3">
    <a href="{{ url('admin/motorHarga/') }}" 
       class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
        Kembali
    </a>

    @if ($errors->any())
    <div class="p-3 text-red-900 rounded-md h-full bg-red-200 border-gray-400 w-full mt-4">
        @foreach ($errors->all() as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ url('admin/motorHarga/'.$motorHarga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <!-- Motor Selection -->
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Pilih Motor</th>
                        <td class="px-4 py-2">
                            <input type="hidden" name="id_motor" id="id_motor" value="{{ $motorHarga->id_motor }}">
                            <input type="text" value="{{ $motorHarga->motor->merek }} - {{ $motorHarga->motor->tipe }} ({{ $motorHarga->motor->tahun }})" 
                                   class="block w-full p-2 border border-gray-300 rounded-md" disabled>
                        </td>
                    </tr>

                    <!-- Harga Motor -->
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Harga 12 Jam</th>
                        <td class="px-4 py-2">
                            <input type="number" name="harga_12_jam" id="harga_12_jam" 
                                   value="{{ $motorHarga->harga_12_jam }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Harga 24 Jam</th>
                        <td class="px-4 py-2">
                            <input type="number" name="harga_24_jam" id="harga_24_jam" 
                                   value="{{ $motorHarga->harga_24_jam }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Harga 1 Minggu</th>
                        <td class="px-4 py-2">
                            <input type="number" name="harga_1_minggu" id="harga_1_minggu" 
                                   value="{{ $motorHarga->harga_1_minggu }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Harga 1 Bulan</th>
                        <td class="px-4 py-2">
                            <input type="number" name="harga_1_bulan" id="harga_1_bulan" 
                                   value="{{ $motorHarga->harga_1_bulan }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Submit
            </button>
        </div>
    </form>
</div>

@endsection
