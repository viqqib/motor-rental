<div class="mx-auto relative w-full" style="height: 700px;">
    <div
        class="md:h-[500px] h-[650px] relative pb-10"
        style="
            background-image: url('{{ asset('images/jepretualang-stN5xuXLde4-unsplash.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
        "
    >
        {{-- Overlay --}}
        <div class="absolute inset-0" style="background-color: rgba(46, 48, 0, 0.6);"></div>

        {{-- Content --}}
        <div
            style="position: relative; z-index: 1;"
            class="flex md:flex-row flex-col h-full justify-between md:pt-1 px-10 pt-10 md:px-32"
        >
            <div class="md:h-full flex flex-col justify-center">
                <div class="text-white md:w-[600px]">
                    <h2 class="font-serif text-xl md:text-3xl">Rental Motor Murah Yogyakarta</h2>
                    <p class="font-bold text-[2.4rem] md:text-7xl text-white leading-none">
                        Rental Motor<br />Tanpa Ribet
                    </p>
                    <p class="mt-4 md:text-base text-xs">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. A ad itaque similique assumenda fugiat quis saepe. Dolorum labore debitis odio in pariatur, soluta voluptates, doloribus culpa quia temporibus modi vero?
                    </p>

                    <div>
                        <div class="mt-5 md:flex md:gap-5">
                            <div class="bg-[rgba(18,18,18,0.8)] text-xs md:text-base px-3 md:px-5 py-2 w-auto inline-flex items-center gap-2 rounded-md border">
                                <div class="w-[6px] h-[6px] bg-green-500 rounded-full"></div>{{ $availableCount }} Motor Tersedia
                            </div>
                            <button class="bg-[#FF9000] md:mr-0 mr-10 text-xs md:text-base font-bold px-3 md:px-5 py-2 rounded-md border md:mt-0 mt-3">
                                Cek & Rental Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute md:-right-[10px] md:top-0 top-[350px] -z-10 flex-nowrap flex">
                <img src="{{ asset('images/hero.png') }}" width="900" alt="motor" class="md:min-w-[500px] mt-10 overflow-hidden flex flex-nowrap flex-shrink-0" />
            </div>
        </div>
    </div>
</div>
