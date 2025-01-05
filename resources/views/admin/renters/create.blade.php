@extends('admin.layouts.app')

@section('title', 'Form Penyewa')

@section('content')

<div class="w-full border border-gray-200 bg-white rounded-lg shadow-md p-3">
    <a href="{{ url('admin/renters') }}" 
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

    <form action="{{ isset($renter) ? url('admin/renters/' . $renter->id) : url('admin/renters') }}" method="POST">
        @csrf
        @if (isset($renter))
            @method('PUT')
        @endif
        <div class="mt-4">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <!-- Name -->
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Nama</th>
                        <td class="px-4 py-2">
                            <input type="text" name="name" id="name" 
                                   value="{{ old('name', $renter->name ?? '') }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>

                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Email</th>
                        <td class="px-4 py-2">
                            <input type="text" name="email" id="email" 
                                   value="{{ old('email', $renter->email ?? '') }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>

                    <!-- Address -->
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Alamat</th>
                        <td class="px-4 py-2">
                            <textarea name="address" id="address" 
                                      class="block w-full p-2 border border-gray-300 rounded-md">{{ old('address', $renter->address ?? '') }}</textarea>
                        </td>
                    </tr>

                    <!-- Phone Number -->
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Nomor HP</th>
                        <td class="px-4 py-2">
                            <input type="text" name="no_telp" id="no_hp" 
                                   value="{{ old('no_telp', $renter->no_telp ?? '') }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>

                    <!-- Identity Number -->
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">NIK</th>
                        <td class="px-4 py-2">
                            <input type="text" name="no_identitas" id="no_identitas" 
                                   value="{{ old('no_identitas', $renter->no_identitas ?? '') }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                {{ isset($renter) ? 'Update' : 'Submit' }}
            </button>
        </div>
    </form>
</div>

@endsection
