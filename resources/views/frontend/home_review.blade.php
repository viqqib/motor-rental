<div class="mx-auto px-5 pt-1 pb-10 mt-6 text-primary">
    <!-- Header Section -->
    <div class="flex w-full flex-col items-center justify-center">
        <p class="text-logo font-bold md:text-base text-xs">Ulasan Pelanggan</p>
        <h2 class="font-semibold md:text-4xl text-xl text-center">Apa Kata Pelanggan Kami</h2>
    </div>

    <!-- Reviews Section -->
    <div class="w-full mx-auto lg:px-44 py-10 flex flex-col md:flex-row md:flex-wrap justify-center items-center gap-4 mt-2 md:mt-5">
        @forelse ($reviews as $review)
            <div class="flex flex-col items-center w-[20rem] border border-gray-200 shadow-md rounded-lg p-6">
                <div class="rounded-full bg-orange-500 p-4 mb-4">
                    <i class="fas fa-user text-4xl text-white"></i>
                </div>
                <h3 class="font-bold text-lg">{{ ucwords($review->name) }}</h3>
                <p class="text-sm  text-gray-500 mb-4">{{ $review->motor->merek }} {{ $review->motor->tipe }}</p>
                <p class="text-sm italic text-gray-500 mb-4">"{{ $review->review }}"</p>
                <!-- Placeholder for star rating if needed -->
            </div>
        @empty
            <p class="text-center">Belum ada ulasan dari pelanggan.</p>
        @endforelse
    </div>

    <!-- Review Submission Form -->
    <div class="mt-10 mx-auto w-full lg:px-44">
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-lg mb-4 text-center">Tambahkan Ulasan Anda</h3>
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('submit.review') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-600">Nama</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                        placeholder="Nama Anda" 
                        >
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                        placeholder="Email Anda" 
                        >
                </div>

                <div>
                    <label for="id_motor" class="block text-sm font-semibold text-gray-600">Motor yang dirental</label>
                    <select 
                        name="id_motor" 
                        id="id_motor" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                        >
                        <option value="">Pilih Motor yang Dirental</option>
                        @foreach ($motorsAll as $motor)
                            <option value="{{ $motor->id }}">{{ $motor->merek }} - {{ $motor->tipe }} ({{ $motor->tahun }})</option>
                        @endforeach
                    </select>
                </div>
                <!-- Review Input -->
                <div>
                    <label for="review" class="block text-sm font-semibold text-gray-600">Ulasan</label>
                    <textarea 
                        id="review" 
                        name="review" 
                        rows="4" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none" 
                        placeholder="Tulis ulasan Anda di sini..." 
                        ></textarea>
                </div>

                @if ($errors->has('review'))
                <div class="text-sm text-red-500 mt-2">
                    {{ $errors->first('review') }}
                </div>
                @endif

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button 
                        type="submit" 
                        class="bg-orange-500 text-white font-semibold py-2 px-6 rounded-md shadow-md hover:bg-orange-600 transition">
                        Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
