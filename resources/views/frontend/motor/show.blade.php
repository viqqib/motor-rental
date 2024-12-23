@extends('frontend.layouts.app')

@section('title', 'Motor Details')

@section('content')
    <div class="md:px-32 px-5 mt-5 ">
        <div class="bg-white px-5 py-5 rounded-md flex md:flex-row flex-col">
            <div class="bike-img">
                <img 
                    src="{{ asset('storage/' . $motor->gambar) }}"
                    alt="{{ $motor->tipe }}" 
                    class="md:w-[600px] md:h-[450px] w-full h-[260px] rounded-md"
                />
            </div>

            <div class="bike-desc mt-4 md:ml-4 md:mt-0">
                <h1 class="text-xl font-bold md:text-3xl">{{ $motor->merek }} {{ $motor->tipe }}</h1>

                <table class="mt-2 w-full text-left">
                    <tbody>
                        <!-- Motor details here -->
                    </tbody>
                </table>

                <p class="mt-2">{{ $motor->deskripsi }}</p>

                <h1 class="text-logo text-3xl font-bold mt-3">
                    Rp. 
                    @if ($motor->motorHarga)
                        {{ number_format($motor->motorHarga->harga_12_jam, 0, ',', '.') }}
                    @else
                        Harga Belum Tersedia
                    @endif
                </h1>
                
                <div class="mb-4">
                    <label for="rental-duration" class="block text-gray-700 font-bold mb-2">Pilih Durasi Sewa:</label>
                    <select name="rental-duration" id="rental-duration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @if ($motor->motorHarga)
                            <option value="harga_12_jam" data-price="{{ $motor->motorHarga->harga_12_jam }}" {{ old('rental-duration') == 'harga_12_jam' ? 'selected' : '' }}>
                                12 Jam
                            </option>
                            <option value="harga_24_jam" data-price="{{ $motor->motorHarga->harga_24_jam }}" {{ old('rental-duration') == 'harga_24_jam' ? 'selected' : '' }}>
                                24 Jam
                            </option>
                            <option value="harga_1_minggu" data-price="{{ $motor->motorHarga->harga_1_minggu }}" {{ old('rental-duration') == 'harga_1_minggu' ? 'selected' : '' }}>
                                1 Mingguan
                            </option>
                            <option value="harga_1_bulan" data-price="{{ $motor->motorHarga->harga_1_bulan }}" {{ old('rental-duration') == 'harga_1_bulan' ? 'selected' : '' }}>
                                1 Bulanan
                            </option>
                        @else
                            <!-- If harga is null, show a prompt to add price -->
                            <option disabled selected>Harga Belum Tersedia <a href="{{ url('admin/motorHarga') }}"></a></option>
                        @endif
                    </select>
                </div>

                <!-- Dynamic input for 24 Jam, 1 Minggu, and 1 Bulan -->
                <div id="days-input" class="mb-4 hidden">
                    <label for="rental-days" class="block text-gray-700 font-bold mb-2">Pilih Jumlah Hari (1-7):</label>
                    <input type="number" id="rental-days" name="rental-days" min="1" max="7" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div id="weeks-input" class="mb-4 hidden">
                    <label for="rental-weeks" class="block text-gray-700 font-bold mb-2">Pilih Jumlah Minggu (1-4):</label>
                    <input type="number" id="rental-weeks" name="rental-weeks" min="1" max="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div id="months-input" class="mb-4 hidden">
                    <label for="rental-months" class="block text-gray-700 font-bold mb-2">Pilih Jumlah Bulan (1-3):</label>
                    <input type="number" id="rental-months" name="rental-months" min="1" max="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <p>Harga: 
                    @if ($motor->motorHarga && $motor->motorHarga->harga_12_jam)
                        Rp <span id="price-display">{{ number_format($motor->motorHarga->harga_12_jam, 0, ',', '.') }}</span>
                    @else
                        Harga Tidak Tersedia
                    @endif
                </p>

                <a href="#" id="rental-now" target="_blank">
                    <button class="w-full {{ $motor->status === 'tersedia' ? 'bg-logo' : 'bg-gray-400 cursor-not-allowed' }} text-white font-bold rounded-md py-3 text-lg mt-5"
                        {{ $motor->status !== 'tersedia' ? 'disabled' : '' }}>
                        {{ $motor->status === 'tersedia' ? 'Rental Sekarang' : 'Tidak Tersedia' }}
                    </button>
                </a>

            </div>
        </div>
    </div>

    <script>
    document.getElementById('rental-now').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default behavior

    // Fetch the selected duration and price dynamically
    var selectedDuration = document.getElementById('rental-duration').value;
    var motorName = "{{ $motor->merek }} {{ $motor->tipe }}";  // Motor name from PHP
    var totalPrice = document.getElementById('price-display').textContent.replace(/\./g, ''); // Remove periods for calculation

    // Map duration values to readable labels
    var rentalDurationValue = '';
    var rentalType = ''
    if (selectedDuration === 'harga_12_jam') {
        rentalDurationValue = "12 jam";
        rentalType = "setengah harian"
    } else if (selectedDuration === 'harga_24_jam') {
        rentalDurationValue = document.getElementById('rental-days').value + " hari";
        rentalType = "harian"
    } else if (selectedDuration === 'harga_1_minggu') {
        rentalDurationValue = document.getElementById('rental-weeks').value + " minggu";
         rentalType = "mingguan"
    } else if (selectedDuration === 'harga_1_bulan') {
        rentalDurationValue = document.getElementById('rental-months').value + " bulan";
         rentalType = "bulanan"
    }

    // Ensure price is formatted correctly
    totalPrice = new Intl.NumberFormat('id-ID').format(parseInt(totalPrice));

    // Construct the WhatsApp message dynamically
    var message = `Halo Three J Rental, Saya mau sewa ${rentalType} ${motorName} durasi ${rentalDurationValue} dengan harga Rp. ${totalPrice}`;

// Update the WhatsApp link dynamically
        var whatsappUrl = `https://wa.me/+6289627728613?text=${encodeURIComponent(message)}`;

        // Open the WhatsApp link
        window.open(whatsappUrl, '_blank');

    // Open the WhatsApp link
    window.open(whatsappUrl, '_blank');
});



        
        document.getElementById('rental-duration').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var selectedPrice = selectedOption.getAttribute('data-price');
            var rentalDuration = selectedOption.value;
            
            // Hide all dynamic inputs
            document.getElementById('days-input').classList.add('hidden');
            document.getElementById('weeks-input').classList.add('hidden');
            document.getElementById('months-input').classList.add('hidden');
            document.getElementById('rental-days').value = '';
            document.getElementById('rental-weeks').value = '';
            document.getElementById('rental-months').value = '';

            // Show the relevant input field based on the selected duration
            if (rentalDuration === 'harga_24_jam') {
                document.getElementById('days-input').classList.remove('hidden');
            } else if (rentalDuration === 'harga_1_minggu') {
                document.getElementById('weeks-input').classList.remove('hidden');
            } else if (rentalDuration === 'harga_1_bulan') {
                document.getElementById('months-input').classList.remove('hidden');
            }

            // Update the price display
            if (selectedPrice) {
                document.getElementById('price-display').textContent = new Intl.NumberFormat('id-ID', { style: 'decimal' }).format(selectedPrice);
            }
        });

        // Update price based on selected days for 24 Jam
        document.getElementById('rental-days').addEventListener('input', function() {
            var selectedDuration = document.getElementById('rental-duration').value;
            var rentalDays = this.value;

            if (selectedDuration === 'harga_24_jam' && rentalDays >= 1 && rentalDays <= 7) {
                var pricePerDay = parseInt(document.querySelector('option[value="harga_24_jam"]').getAttribute('data-price'));
                var totalPrice = pricePerDay * rentalDays;
                
                // Update the price display based on selected days
                document.getElementById('price-display').textContent = new Intl.NumberFormat('id-ID', { style: 'decimal' }).format(totalPrice);
            }
        });

        // Update price based on selected weeks for 1 Minggu
        document.getElementById('rental-weeks').addEventListener('input', function() {
            var selectedDuration = document.getElementById('rental-duration').value;
            var rentalWeeks = this.value;

            if (selectedDuration === 'harga_1_minggu' && rentalWeeks >= 1 && rentalWeeks <= 4) {
                var pricePerWeek = parseInt(document.querySelector('option[value="harga_1_minggu"]').getAttribute('data-price'));
                var totalPrice = pricePerWeek * rentalWeeks;
                
                // Update the price display based on selected weeks
                document.getElementById('price-display').textContent = new Intl.NumberFormat('id-ID', { style: 'decimal' }).format(totalPrice);
            }
        });

        // Update price based on selected months for 1 Bulan
        document.getElementById('rental-months').addEventListener('input', function() {
            var selectedDuration = document.getElementById('rental-duration').value;
            var rentalMonths = this.value;

            if (selectedDuration === 'harga_1_bulan' && rentalMonths >= 1 && rentalMonths <= 3) {
                var pricePerMonth = parseInt(document.querySelector('option[value="harga_1_bulan"]').getAttribute('data-price'));
                var totalPrice = pricePerMonth * rentalMonths;
                
                // Update the price display based on selected months
                document.getElementById('price-display').textContent = new Intl.NumberFormat('id-ID', { style: 'decimal' }).format(totalPrice);
            }
        });
    </script>
@endsection
