<div class="text-white bg-footer px-6 md:px-32 py-8 max-w-full">
    <!-- Top Section -->
    <div class="flex flex-col md:flex-row justify-between gap-10">
        <!-- About Us -->
        <div class="about flex-1">
            <h2 class="text-2xl md:text-3xl font-semibold mb-4">Tentang Kami</h2>
            <p class="text-sm md:text-base leading-relaxed">
                {{ $websiteInfo->description }}
            </p>
        </div>

        <!-- Contact Information -->
        <div class="contact flex-1">
            <h2 class="text-2xl md:text-3xl font-semibold mb-4">Hubungi Kami</h2>
            <ul class="text-sm md:text-base space-y-2">
                <li class="flex items-center gap-2">
                    <i class="fa fa-phone text-white"></i>
                    <span>{{ $websiteInfo->phone_number }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fa fa-envelope text-white"></i>
                    <span>{{ $websiteInfo->email }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fa fa-map-marker text-white"></i>
                    <span>{{ $websiteInfo->address }}</span>
                </li>
               
            
            </ul>
            
        </div>

        <!-- Quick Links -->
        <div class="links flex-1">
            <h2 class="text-2xl md:text-3xl font-semibold mb-4">Quick Links</h2>
            <ul class="flex flex-col gap-2">
                <li><a href="#" class="hover:underline text-sm md:text-base">Blog</a></li>
                <li><a href="#" class="hover:underline text-sm md:text-base">FAQ</a></li>
                <li><a href="#" class="hover:underline text-sm md:text-base">Privacy Policy</a></li>
                <li><a href="#" class="hover:underline text-sm md:text-base">Terms of Service</a></li>
            </ul>
        </div>
    </div>

    <!-- Social Media Section -->
    <div class="social-media flex justify-center md:justify-center gap-x-4 mt-8 text-2xl">
        @foreach ($socialLinks as $socialLink)
        @if ($socialLink->link) <!-- Check if there is a valid link -->
            <a href="{{$socialLink->link}}" target="_blank" rel="noopener noreferrer" class="hover:text-orange-500">
                <i class="fab fa-{{ strtolower($socialLink->name) }}"></i>
            </a>
        @endif
        @endforeach
    </div>
    <!-- Divider -->
    <div class="line w-full border-t-2 border-white my-6"></div>

    <!-- Bottom Section -->
    <div class="bottom text-center">
        <p class="text-sm md:text-base">2024 Copyright Fiqqidev. All Rights Reserved.</p>
    </div>
</div>
