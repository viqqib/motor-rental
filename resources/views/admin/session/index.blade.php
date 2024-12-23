@extends('admin.layouts.app')

@section('title', 'Login Page')

@section('content')

@if ($errors->any())
    <div class="mb-4">
        <ul class="text-red-500 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-sm bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Login</h2>
        <form action="/admin/session/login" method="POST" class="space-y-4">
            @csrf
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       >
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       >
            </div>

            <!-- Remember Me Checkbox -->
            {{-- <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" 
                       class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-gray-700 text-sm">Remember Me</label>
            </div> --}}

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
