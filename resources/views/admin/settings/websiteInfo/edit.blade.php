@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')

<div class="bg-white rounded-md p-5 px-7">
<div class="max-w-4xl">
    <form action="{{ route('admin.settings.web-info.update', $field) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <label for="value" class="block text-sm font-medium text-gray-700">
                @if ($field == 'name') Nama Website
                @elseif ($field == 'tagline') Tagline Website
                @elseif ($field == 'email') Email
                @elseif ($field == 'phone_number') Nomor Telepon
                @elseif ($field == 'address') Alamat
                @endif
            </label>
            <input type="text" name="value" id="value" value="{{ old('value', $websiteInfo->$field) }}" class="p-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            
            @error('value')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md font-semibold">Update</button>
    </form>
    
</div>
</div>

@endsection