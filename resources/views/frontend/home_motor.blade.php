<!-- resources/views/home_motor.blade.php -->

<div class="mx-auto md:pt-1 px-5 pt-1 md:px-1 lg:px-24 pb-10">
    <div class="flex w-full flex-col items-center justify-center">
        <p class="text-logo font-bold md:text-base text-xs">MOTOR TERBAIK</p>
        <h2 class="font-semibold md:text-4xl text-xl">Tersedia Untuk Disewa</h2>
    </div>

    <div class="w-full mx-auto md:px-0 lg:px-44 h-auto py-6 flex flex-wrap md:flex-row gap-x-5 justify-center gap-y-4 mt-5">
        <!-- Loop through the motors -->

        <div class="inline-flex flex-wrap md:gap-x-8 gap-x-3 w-96 md:w-full justify-center gap-y-4">
            @foreach($motors as $motor)
            <div class="py-1 rounded-md px-2 md:px-3 w-40 md:w-64 bg-white" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                <div class="text-atas">
                    <p class="text-gray-500 bike-brand text-xs md:text-base">{{ $motor->merek }}</p>
                    <p class="bike-type text-sm md:text-xl -mt-1 font-bold">{{ $motor->tipe }}</p>
                </div>
                <div class="bike-img my-1 md:my-2">
                    <img src="{{ asset('storage/' . $motor->gambar) }}" alt="Motor Image" class="w-full h-[100px] md:h-[170px] rounded-md">
                </div>

            

                <div class="bike-price pb-1">
                    <p class="md:text-2xl text-sm font-bold mb-1 md:mb-1 mt-1">
                        @if ($motor->motorHarga && $motor->motorHarga->harga_12_jam)
                            Rp.{{ $motor->motorHarga->harga_12_jam }} <span class="text-xs">/ </span>
                            <span class="text-[0.65rem] font-semibold text-gray-500">12 Jam</span>
                        @else
                            <span class="text-sm font-semibold text-gray-500">Harga belum tersedia</span>
                        @endif
                    </p>


                   

                    <a href="{{ route('motor.show', $motor->id) }}">
                        <button class="w-full text-xs md:text-base py-1.5 md:py-2 font-bold rounded-md duration-300 bg-logo text-white hover:bg-primary">
                            Cek & Rental Sekarang
                        </button>
                    </a>

                </div>
            </div>
            @endforeach
        </div>
       

        <a class="border-logo hover:bg-logo hover:text-white duration-200 font-bold rounded-md py-2 text-logo border-2 px-10 bg-bgone mt-5" href="/motor">
            Cek Semua Motor
        </a>
    </div>
</div>
