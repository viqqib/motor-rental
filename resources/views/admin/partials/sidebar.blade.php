<div class="lg:hidden p-4 bg-teal-600 text-white">
    <!-- Hamburger Button -->
    <button id="toggleSidebar" class="focus:outline-none">
        <i class="fa-solid fa-bars text-xl"></i>
    </button>
</div>

<div class="sidebar fixed top-0 bottom-0 left-0 lg:translate-x-0 -translate-x-full lg:left-0 p-4 w-[300px] overflow-y-auto bg-white shadow-md z-10 transition-transform" id="sidebar">
    <div class="text-gray-800">
        <!-- Sidebar Header -->
        <div class="p-1 mt-1 flex items-center justify-center">
            <h1 class="font-bold text-2xl text-teal-600">Three J Rental</h1>
        </div>

        <div class="h-[1px] bg-gray-300 my-4 w-full"></div>

        <!-- Links -->
        <a href="{{ url('/admin') }}" class="sidebar-link {{ Request::is('admin') ? 'active' : '' }}">
            <div class="flex items-center">
                <i class="fa-solid fa-home text-teal-600 text-lg"></i>
                <h1 class="ml-4">Beranda</h1>
            </div>
        </a>

        <a href="{{ url('/admin/motor') }}" class="sidebar-link {{ Request::is('admin/motor') ? 'active' : '' }}">
            <div class="flex items-center">
                <i class="fa-solid fa-motorcycle text-teal-600 text-lg"></i>
                <h1 class="ml-4">Motor</h1>
            </div>
        </a>

        <a href="{{ url('/admin/motorHarga') }}" class="sidebar-link {{ Request::is('admin/motorHarga') ? 'active' : '' }}">
            <div class="flex items-center">
                <i class="fa-solid fa-money-bill-wave text-teal-600 text-lg"></i>
                <h1 class="ml-4">Harga Motor</h1>
            </div>
        </a>

        <div class="h-[1px] bg-gray-300 my-4 w-full"></div>

        <!-- Dropdown Link -->
        <div class="sidebar-link cursor-pointer {{ Request::is('admin/content*') ? 'active' : '' }}" onclick="dropdown()">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fa-solid fa-folder text-teal-600 text-lg"></i>
                    <h1 class="ml-4">Konten</h1>
                </div>
                <i class="fa-solid fa-chevron-down transition-transform" id="arrow"></i>
            </div>
        </div>

        <div id="submenu" class="hidden mt-2 pl-8">
            <a href="{{ url('/admin/content/homepage') }}" class="block py-2 px-4 rounded-lg hover:bg-teal-50 text-gray-600">
                Halaman Utama
            </a>
        </div>

        <a href="{{ url('/admin/settings') }}" class="sidebar-link {{ Request::is('admin/settings') ? 'active' : '' }}">
            <div class="flex items-center">
                <i class="fa-solid fa-gear text-teal-600 text-lg"></i>
                <h1 class="ml-4">Pengaturan</h1>
            </div>
        </a>
    </div>
</div>

<script>
    // Toggle sidebar on small screens
    document.getElementById('toggleSidebar').addEventListener('click', () => {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });

    // Dropdown menu functionality
    function dropdown() {
        document.querySelector('#submenu').classList.toggle('hidden');
        document.querySelector('#arrow').classList.toggle('rotate-180');
    }
</script>

<style>
    .sidebar-link {
        display: block;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 0.5rem;
        text-decoration: none;
        color: #374151; /* Gray-800 */
        font-weight: 500;
        transition: background-color 0.2s, color 0.2s;
    }
    .sidebar-link:hover {
        background-color: #f0fdfa; /* Teal-50 */
    }
    .sidebar-link.active {
        background-color: #14b8a6; /* Teal-500 */
        color: white;
    }
    .sidebar-link.active i {
        color: white;
    }
    #arrow {
        transition: transform 0.2s;
    }
    #arrow.rotate-180 {
        transform: rotate(180deg);
    }
</style>
