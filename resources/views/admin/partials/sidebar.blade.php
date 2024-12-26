<div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-teal-900">
    <div class="text-white text-xl">
        <div class="p-4 mt-1 flex items-center">
            <h1 class="font-bold">Three J Rental</h1>
        </div>

        <div class="h-[1px] bg-gray-300 my-2 w-full"></div>
        
        <!-- Beranda Link -->
        <a href="{{ url('/admin') }}">
            <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-800 text-white {{ Request::is('admin') ? 'active' : '' }}">
                <div class="flex justify-center items-center h-6 w-6">
                    <i class="fa-solid fa-home text-base"></i>
                </div>
                <h1 class="ml-4 text-[1rem]">Beranda</h1>
            </div>
        </a>

        <!-- Motor Link -->
        <a href="{{ url('/admin/motor') }}">
            <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-800 text-white {{ Request::is('admin/motor') ? 'active' : '' }}">
                <div class="flex justify-center items-center h-6 w-6">
                    <i class="fa-solid fa-motorcycle text-base"></i>
                </div>
                <h1 class="ml-4 text-[1rem]">Motor</h1>
            </div>
        </a>

        <!-- Harga Motor Link -->
        <a href="{{ url('/admin/motorHarga') }}">
            <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-800 text-white {{ Request::is('admin/motorHarga') ? 'active' : '' }}">
                <div class="flex justify-center items-center h-6 w-6">
                    <i class="fa-solid fa-money-bill-wave text-base"></i>
                </div>
                <h1 class="ml-4 text-[1rem]">Harga Motor</h1>
            </div>
        </a>

        <div class="h-[1px] bg-gray-300 w-full my-2"></div>

        <a href="{{ url('/admin/homepageContent') }}">
            <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-800 text-white {{ Request::is('admin/homepageContent') ? 'active' : '' }}">
                <div class="flex justify-center items-center h-6 w-6">
                    <i class="fa-solid fa-money-bill-wave text-base"></i>
                </div>
                <h1 class="ml-4 text-[1rem]">Konten</h1>
            </div>
        </a>



    </div>
</div>

<style>
    .active {
        background-color: teal;
    }
</style>
