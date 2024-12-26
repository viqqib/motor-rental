@extends('admin.layouts.app')

@section('title', 'Data Motor')

@section('content')

<div class="">
    {{-- "{{ route('admin.homepageContent.edit') }}" --}}
    <form action="{{ route('admin.homepageContent.update', $heroContent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="heading" class="block text-gray-700 font-bold mb-2">Heading</label>
            <input type="text" id="heading" name="heading" value="{{ old('heading', $heroContent->heading ?? '') }}" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="mb-4">
            <label for="tag" class="block text-gray-700 font-bold mb-2">Heading 2 (Tag)</label>
            <input type="text" id="tag" name="tag" value="{{ old('tag', $heroContent->tag ?? '') }}" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
    
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea id="content" name="content" rows="4" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('content', $heroContent->content ?? '') }}</textarea>
        </div>
    
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" id="image" name="image" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    
        @if ($heroContent && $heroContent->image)
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $heroContent->image) }}" alt="Current Hero Image" class="w-32 h-auto rounded-md">
            </div>
        @endif
    
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Halaman Utama
            </button>
        </div>
    </form>
   
</div>

@endsection