<nav>
    <div class="w-full bg-white shadow-md py-5 md:py-6 px-5 md:px-32 flex justify-between items-center">
        <!-- Logo -->
        <div class="logo">
            <span class="font-bold text-base md:text-3xl text-logo">{{ $websiteInfo->name }}</span>
        </div>

        <!-- Desktop Navigation -->
        <div class="md:block hidden">
            <ul class="nav flex gap-10 font-semibold">
                @foreach ($headerLinks as $item)
                    <li>
                        <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Hamburger Icon for Mobile -->
        <div class="md:hidden flex items-center">
            <button id="hamburger-icon" class="text-logo">
                <i class="fas fa-bars text-2xl" id="hamburger-icon-inner"></i> <!-- Initial Hamburger Icon -->
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-nav" class="md:hidden hidden bg-white shadow-md w-full py-5 px-5 flex flex-col items-start">
        {{-- <div class="flex justify-end w-full">
            <button id="close-icon" class="text-logo hidden"> <!-- Initially Hidden -->
                <i class="fas fa-times text-2xl"></i> <!-- Close Icon -->
            </button>
        </div> --}}
        <ul class="flex flex-col gap-5 font-semibold">
            @foreach ($headerLinks as $item)
                <li>
                    <a href="{{ $item['link'] }}" class="text-sm">{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>

<script>
    // Select DOM elements
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const hamburgerIconInner = document.getElementById('hamburger-icon-inner');
    const mobileNav = document.getElementById('mobile-nav');
    const closeIcon = document.getElementById('close-icon');

    // Function to toggle the navigation and icons
    function toggleMenu() {
        mobileNav.classList.toggle('hidden'); // Toggle the mobile menu visibility
        hamburgerIconInner.classList.toggle('hidden'); // Toggle the hamburger icon
        closeIcon.classList.toggle('hidden'); // Toggle the close icon
    }

    // Add event listener to hamburger icon
    hamburgerIcon.addEventListener('click', toggleMenu);

    // Add event listener to close icon
    closeIcon.addEventListener('click', toggleMenu);
</script>
