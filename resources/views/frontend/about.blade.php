@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mx-auto px-3 lg:px-16 py-8 ">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">{{ $websiteInfo->name ?? 'About Us' }}</h2>

    <!-- Tagline -->
    <section class="mb-6">
        <p class="text-lg italic text-teal-600 text-center">
            "{{ $websiteInfo->tagline ?? 'Your trusted motorbike rental service in Garut' }}"
        </p>
    </section>

    <!-- Company Overview -->
    <section class="mb-12">
        <h3 class="text-lg md:text-xl font-semibold text-gray-700 mb-4">Siapa Kami?</h3>
        <p class="text-gray-600">
            {{ $websiteInfo->description ?? 'We are a passionate team dedicated to providing the best motorbike rental service in Garut.' }}
        </p>
    </section>

    <!-- Contact Information -->
    <section class="mb-12">
        <h3 class="text-lg md:text-xl font-semibold text-gray-700 mb-4">Kontak</h3>
        <ul class="text-gray-600 space-y-2">
            <li><strong>Email:</strong> {{ $websiteInfo->email ?? 'info@example.com' }}</li>
            <li><strong>No. Telpon:</strong> {{ $websiteInfo->phone_number ?? '+62 812 3456 7890' }}</li>
            <li><strong>Alamat:</strong> {{ $websiteInfo->address ?? 'Garut, Indonesia' }}</li>
        </ul>
    </section>

    <!-- Mission -->
    <section>
        <h3 class="text-lg md:text-xl font-semibold text-gray-700 mb-4">Our Mission</h3>
        <p class="text-gray-600">
            We aim to provide convenient and reliable motorbike rentals, ensuring our customers have the freedom to explore Garut's scenic destinations with ease and comfort.
        </p>
    </section>
</div>
@endsection
