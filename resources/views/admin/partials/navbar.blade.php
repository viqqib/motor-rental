<nav>
    <div class=" bg-white shadow-md py-2 md:py-4 px-5 items-center md:pl-10 md:pr-14 flex justify-between">
        <div class="logo">
            <span class="font-bold text-base md:text-xl text-primary">
                {{ Request::is('admin') ? 'Dashboard' : '' }}
                {{ Request::is('admin/motor*') ? 'Data Motor' : '' }}
                {{ Request::is('admin/content*') ? 'Edit Konten' : '' }}
            </span>
        </div>


        <div class="">
            <div class="flex gap-x-5 items-center">
                @if(Auth::check())
                <div class="username flex flex-col items-end">
                        <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                        <span class="text-xs">Admin</span>
                    </div>
                @else
                    <div class="username flex flex-col items-end">
                        <p class="text-sm font-semibold">Guest</p>
                        <span class="text-xs">Visitor</span>
                    </div>
                @endif
            

                <div class="relative group">
                    <!-- Dropdown Trigger -->
                    <button class="group relative">
                        <img src="{{ asset('images/dashboard/admin_thumb.png') }}"  class="profile-pic rounded-full w-10 h-10 bg-white border border-gray-300" alt="">
                    </button>
    

                    <!-- Dropdown Menu -->
                    <div class="absolute top-full right-0 mt-2 rounded-md w-40 shadow-md bg-white border border-gray-200 opacity-0 group-focus-within:opacity-100 invisible group-focus-within:visible transform scale-y-0 group-focus-within:scale-y-100 origin-top duration-200">
                        <a href="/admin/session/logout" class="block px-3 py-2 text-sm text-gray-700 hover:bg-teal-500 hover:text-white rounded-t-md">
                            Logout
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
