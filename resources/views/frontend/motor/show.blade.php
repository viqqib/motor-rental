@extends('frontend.layouts.app')

@section('title', 'Motor Details')

@section('content')
    <div class="md:px-32 px-5 mt-5 ">
        <div class="bg-white px-5 py-5 rounded-md flex  md:flex-row flex-col">
            
            <div class="bike-img">
                <img 
                    src="{{ asset('images/bike.png') }}" 
                    alt="{{ $motor->tipe }}" 
                    class="md:w-[600px] md:h-[450px] w-full h-[260px] rounded-md"
                />
            </div>


            <div class="bike-desc  mt-4 md:ml-4 md:mt-0 ">
                <h1 class="text-xl font-bold md:text-3xl">{{ $motor->merek }} {{ $motor->tipe }}</h1>
    
                <table class="mt-2 w-full text-left">
                    <tbody>
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class=" md:py-2 font-semibold">Kategori</td>
                            <td class=" md:py-2">{{ $motor->kategori }}</td>
                        </tr>
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class=" md:py-2 font-semibold">Transmisi</td>
                            <td class=" md:py-2">{{ $motor->transmisi }}</td>
                        </tr>
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class=" md:py-2 font-semibold">Kondisi</td>
                            <td class=" md:py-2">{{ $motor->kondisi }}</td>
                        </tr>
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class=" md:py-2 font-semibold">Kapasitas</td>
                            <td class=" md:py-2">{{ $motor->kapasitas }}</td>
                        </tr>
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class=" md:py-2 font-semibold">CC</td>
                            <td class=" md:py-2">{{ $motor->cc }} cc</td>
                        </tr>
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class=" md:py-2 font-semibold">Kecepatan Maksimum</td>
                            <td class=" md:py-2">{{ $motor->kecepatan }}</td>
                        </tr>
                    </tbody>
                </table>
    
                <p class="mt-2">{{ $motor->deskripsi }}</p>
    
                <h1 class="text-logo text-3xl font-bold mt-3">
                    Rp {{ number_format($motor->harga_jam, 0, ',', '.') }} <span class="text-lg text-gray-500">/ 12 Jam</span>
                </h1>
    
                <button
                    class="w-full {{ $motor->status === 'tersedia' ? 'bg-logo' : 'bg-gray-400 cursor-not-allowed' }} text-white font-bold rounded-md py-3 text-lg mt-5"
                    {{ $motor->status !== 'tersedia' ? 'disabled' : '' }}
                >
                    {{ $motor->status === 'tersedia' ? 'Rental Sekarang' : 'Tidak Tersedia' }}
                </button>
            </div>


        </div>
    </div>
    {{-- <div class="md:px-32 py-7 flex flex-col w-ful px-10 ">
    <div class="w-full bg-white flex flex-col md:flex-row md:p-10 p-5  mt-10">
        
        <!-- Bike Image -->
        <div class="bike-img">
            <img 
                src="{{ asset('images/bike.png' . $motor->image) }}" 
                alt="{{ $motor->tipe }}" 
                class="md:w-[600px] md:h-[470px] w-full h-[260px] rounded-md"
            />
        </div>

        <!-- Bike Description -->
        <div class="bike-desc md:ml-10 mt-5 md:mt-0">
            <h1 class="text-xl font-bold md:text-3xl">{{ $motor->merek }} {{ $motor->tipe }}</h1>

            <table class="mt-5 w-full text-left">
                <tbody>
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-4 md:py-2 font-semibold">Kategori</td>
                        <td class="px-4 py-2">{{ $motor->kategori }}</td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-4 py-2 font-semibold">Transmisi</td>
                        <td class="px-4 py-2">{{ $motor->transmisi }}</td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-4 py-2 font-semibold">Kondisi</td>
                        <td class="px-4 py-2">{{ $motor->kondisi }}</td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-4 py-2 font-semibold">Kapasitas</td>
                        <td class="px-4 py-2">{{ $motor->kapasitas }}</td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-4 py-2 font-semibold">CC</td>
                        <td class="px-4 py-2">{{ $motor->cc }} cc</td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-4 py-2 font-semibold">Kecepatan Maksimum</td>
                        <td class="px-4 py-2">{{ $motor->kecepatan }}</td>
                    </tr>
                </tbody>
            </table>

            <p class="mt-2">{{ $motor->deskripsi }}</p>

            <h1 class="text-logo text-3xl font-bold mt-3">
                Rp {{ number_format($motor->harga_jam, 0, ',', '.') }} <span class="text-lg text-gray-500">/ 12 Jam</span>
            </h1>

            <button
                class="w-full {{ $motor->status === 'tersedia' ? 'bg-logo' : 'bg-gray-400 cursor-not-allowed' }} text-white font-bold rounded-md py-3 text-lg mt-5"
                {{ $motor->status !== 'tersedia' ? 'disabled' : '' }}
            >
                {{ $motor->status === 'tersedia' ? 'Rental Sekarang' : 'Tidak Tersedia' }}
            </button>
        </div>
    </div>
</div> --}}
@endsection
