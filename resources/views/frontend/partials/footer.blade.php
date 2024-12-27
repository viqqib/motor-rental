<div class="text-white bg-footer px-4 md:px-32 max-w-full hero py-5">
    <div class="top flex w-full justify-between items-center">
        <div class="logo text-lg md:text-3xl font-semibold">Tentang Kami</div>
        <div class="link md:text-base text-sm flex gap-5">
            <a href="#">Blog</a>
            <a href="#">Blog</a>
            <a href="#">Blog</a>
            <a href="#">Blog</a>
        </div>
    </div>

    <div class="center flex w-full justify-between mt-4">
        <div>
            <p class="md:w-72 w-52 leading-5 text-xs md:text-base">Rental motor murah Yogyakarta Rental motor tanpa</p>
            <div class="location md:flex gap-x-2 mt-7 justify-center items-center hidden">
                <i class="fa fa-map-marker text-white hover:text-red-800 text-xl"></i>
                <p class="md:text-base text-xs">Jl. Ringin raya 122 Mancasan Lor Dero Condongcatur Depok Sleman</p>
            </div>
        </div>

        <div class="sosmed gap-x-2 flex text-2xl">
            {{-- <a href="{{ $facebook->link }}">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="{{ $facebook->link }}">
                <i class="fab fa-instagram"></i>
            </a> --}}
            @foreach ($socialLinks as $socialLink)
            @if ($socialLink->link) <!-- Check if there is a valid link -->
                <a href="{{ $socialLink->link }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-{{ strtolower($socialLink->name) }}"></i>
                </a>
            @endif
        @endforeach
        
        </div>
    </div>

    <div class="line w-full border-t-2 my-4"></div>
    <p class="self-center md:text-base">2024 Copyright Fiqqidev</p>
</div>
