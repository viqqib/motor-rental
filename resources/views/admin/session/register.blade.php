@extends('admin.layouts.app')

@section('title', 'Register Page')

@section('content')

<div class="mt-28 flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-sm bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Register</h2>
        
        <form action="/admin/session/create" method="POST" class="space-y-4">
            @csrf
            <!-- Name Input -->
            <div>
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama:</label>
                <input type="text" name="name" id="name" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       value="{{ Session::get('name') }}">
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       value="{{ Session::get('email') }}">
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Password Confirmation Input -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Register
                </button>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="text-red-500 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
