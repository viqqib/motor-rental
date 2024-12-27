@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')


<div class="max-w-4xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Alamat Sosial Media</h2>

    <!-- Form to edit the social link -->
    <form action="{{ route('admin.settings.social-link.store') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
        @csrf

        <!-- Name field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="" class="mt-1   p-3 block w-full border-gray-200 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            {{-- @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>

        <!-- Identifier field -->
        <div class="mb-4">
            <label for="identifier" class="block text-sm font-medium text-gray-700">Alamat (Username / Nomor Telepon)</label>
            <input type="text" id="identifier" name="identifier" value="" class="p-3 mt-1 block w-full border-gray-200 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            {{-- @error('identifier')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>

        <!-- Link field -->
        <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
            <input type="url" id="link" name="link" value="" class="mt-1 block w-full p-3 border-gray-200 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            {{-- @error('link')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>

        <!-- Submit button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Buat</button>
        </div>
    </form>
</div>

@endsection