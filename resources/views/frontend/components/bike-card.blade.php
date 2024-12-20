@props(['motor'])

<div class="py-1 rounded-md px-2 md:px-3 w-40 md:w-64 bg-white" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
    <div class="text-atas">
        <p class="text-gray-500 bike-brand text-xs md:text-base">{{ $motor['merek'] }}</p>
        <p class="bike-type text-sm md:text-xl -mt-1 font-bold">{{ $motor['tipe'] }}</p>
    </div>
    <div class="bike-img my-1 md:my-2">
        <!-- Image will go here later -->
    </div>

    <div class="bike-price pb-1">
        <p class="md:text-2xl text-sm font-bold mb-1 md:mb-1 mt-1">
            Rp.{{ $motor['harga'] }} <span class="text-xs">/ </span>
            <span class="text-[0.65rem] font-semibold text-gray-500">12 Jam</span>
        </p>

        <button
            class="w-full text-xs md:text-base py-1.5 md:py-2 font-bold rounded-md duration-300 bg-logo text-white hover:bg-primary"
        >
            Rental Sekarang
        </button>
    </div>
</div>