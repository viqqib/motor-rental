@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mx-auto px-3 lg:px-16 py-8">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Contact Us</h2>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Contact Info Section -->
        <div class="w-full md:w-1/2">
            <div class="mb-6">
                <h3 class="text-lg md:text-xl font-semibold text-gray-700">Alamat Three J Rental</h3>
                <p class="text-gray-600 mt-2">{{ $websiteInfo->address ?? 'Garut, Indonesia' }}</p>
                <p class="text-gray-600 mt-2">No Telpon: {{ $websiteInfo->phone_number ?? '+62 123 456 789' }}</p>
                <p class="text-gray-600 mt-2">Email: {{ $websiteInfo->email ?? 'contact@example.com' }}</p>
            </div>

            <div class="mb-6">
                <h3 class="text-lg md:text-xl font-semibold text-gray-700">Follow Us</h3>
                <ul class="flex space-x-4">
                    @forelse($socialLinks as $social)
                        <li class="flex justify-center items-center gap-x-2 mt-2">
                            <i class="fab text-logo text-xl fa-{{ strtolower($social->name) }}"></i>
                            <a href="{{ $social->link }}" target="_blank" class="text-logo font-semibold hover:underline" title="{{ $social->name }}">
                                {{ ucfirst($social->identifier) }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-600">No social links available.</li>
                    @endforelse
                </ul>
            </div>

            <div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-700">Jam Operasional</h3>
                <p class="text-gray-600 mt-2">Senin - Jumat: 9:00 AM - 6:00 PM</p>
                <p class="text-gray-600 mt-2">Sabtu: 10:00 AM - 4:00 PM</p>
                <p class="text-gray-600 mt-2">Minggu: Closed</p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="w-full md:w-1/2">
            <form action="#" method="POST" class="bg-white shadow-md rounded-md p-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600" required></textarea>
                </div>

                <button type="submit" class="w-full text-white bg-logo rounded-md py-2 font-bold duration-300 hover:bg-teal-700">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
