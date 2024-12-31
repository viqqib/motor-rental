@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')


<div class="max-w-4xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Alamat Sosial Media</h2>

    <!-- Form to edit the social link -->
    <form action="{{ route('admin.settings.social-link.update', $socialLink->id) }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
    
        @csrf
        @method('PUT')

        <!-- Name field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium  text-gray-700">Nama Sosial Media</label>
            <input type="text" id="name" name="name" value="{{ old('name', $socialLink->name) }}" class="mt-1 block w-full border p-3  border-gray-200 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Identifier field -->
        <div class="mb-4">
            <label for="identifier" class="block text-sm font-medium text-gray-700">Alamat (Username / Nomor Telepon)</label>
            <input type="text" id="identifier" name="identifier" value="{{ old('identifier', $socialLink->identifier) }}" class="mt-1 block border p-3 w-full border-gray-200 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('identifier')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Link field -->
        <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
            <input type="url" id="link" name="link" value="{{ old('link', $socialLink->link) }}" class="mt-1 block border p-3 w-full border-gray-200 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('link')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Update Social Link</button>
        </div>
    </form>
</div>

@endsection