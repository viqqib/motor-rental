<nav>
    <div class="w-full bg-white shadow-md py-5 md:py-6 px-5 md:px-32 flex justify-between">
        <div class="logo">
            <span class="font-bold text-base md:text-3xl text-logo">Three J Rental Motor</span>
        </div>

        <div class="md:block hidden">
            <ul class="nav flex gap-10 font-semibold">
                @foreach ($headerLinks as $item)
                    <li>
                        <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
