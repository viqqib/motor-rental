<nav class="fixed right-0 w-full top-0 -z-0">
    <div class="bg-white shadow-sm py-3 md:py-4 px-5 md:px-10 flex justify-between items-center">
        <!-- Logo and Page Title -->
        <div class="logo">
            <span class="font-bold text-lg md:text-xl text-teal-600 ml-[19rem]">

                {{ Request::is('admin') ? 'Dashboard' : '' }}
                {{ Request::is('admin/motor*') ? 'Data Motor' : '' }}
                {{ Request::is('admin/content*') ? 'Edit Konten' : '' }}
                {{ Request::is('admin/settings*') ? 'Pengaturan Website' : '' }}
            </span>
        </div>

        <!-- User Info and Dropdown -->
        <div class="flex items-center gap-x-5">
            @if(Auth::check())
            <div class="username flex flex-col items-end">
                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                <span class="text-xs text-gray-500">Admin</span>
            </div>
            @else
            <div class="username flex flex-col items-end">
                <p class="text-sm font-semibold text-gray-800">Guest</p>
                <span class="text-xs text-gray-500">Visitor</span>
            </div>
            @endif

            <!-- Profile Picture and Dropdown -->
            <div class="relative group">
                <button class="focus:outline-none">
                    <img src="{{ asset('images/dashboard/admin_thumb.png') }}" class="profile-pic rounded-full w-10 h-10 border border-gray-300">
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute top-full right-0 mt-2 rounded-md w-40 shadow-md bg-white border border-gray-200 opacity-0 group-hover:opacity-100 invisible group-hover:visible transform scale-y-0 group-hover:scale-y-100 origin-top duration-200">
                    <a href="/admin/session/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-500 hover:text-white rounded-md">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Dropdown menu transition */
    .group:hover .group-hover\:opacity-100 {
        opacity: 1;
    }
    .group:hover .group-hover\:visible {
        visibility: visible;
    }
    .group:hover .group-hover\:scale-y-100 {
        transform: scaleY(1);
    }

    .group:hover .group-hover\:scale-y-100 {
        transform: scaleY(1);
    }

    .group .group-hover\:opacity-0 {
        opacity: 0;
    }

    .group .group-hover\:invisible {
        visibility: hidden;
    }
</style>
