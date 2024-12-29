@extends('admin.layouts.app')

@section('title', 'Data Motor')

@section('content')

<div class="overflow-hidden bg-white shadow-md rounded-lg p-6">
    
    @if ($errors->any())
    <div class="p-4 text-red-900 rounded-md bg-red-200 border-l-4 border-red-500 mb-4">
        @foreach ($errors->all() as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ route('admin.content.homepage.update', $heroContent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="mb-6">
            <label for="heading" class="block text-gray-700 font-semibold mb-2">Heading</label>
            <input type="text" id="heading" name="heading" value="{{ old('heading', $heroContent->heading ?? '') }}" 
                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-teal-400" required>
        </div>
    
        <div class="mb-6">
            <label for="tag" class="block text-gray-700 font-semibold mb-2">Heading 2 (Tag)</label>
            <input type="text" id="tag" name="tag" value="{{ old('tag', $heroContent->tag ?? '') }}" 
                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-teal-400" required>
        </div>
    
        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
            <textarea id="content" name="content" rows="4" 
                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-teal-400" required>{{ old('content', $heroContent->content ?? '') }}</textarea>
        </div>
    
        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" id="image" name="image" 
                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-teal-400">
        </div>
    
        @if ($heroContent && $heroContent->image)
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $heroContent->image) }}" alt="Current Hero Image" class="w-32 h-auto rounded-md">
            </div>
        @endif
    
        <div class="flex justify-end">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-300">
                Update Halaman Utama
            </button>
        </div>
    </form>

</div>

@endsection
