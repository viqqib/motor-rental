@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">

    <a href="{{ url('admin/motor/') }}" class="px-6 py-2 font-bold bg-blue-500 rounded-md text-white">Kembali</a>

    <form action="{{ url('admin/motor/'.$data->id) }}" method="POST" enctype="multipart/form-data" class="w-full mt-5 bg-white shadow-md rounded px-8 py-6">
        @csrf <!-- CSRF token for Laravel -->
        @method('PUT')

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Part 1: Basic Information -->
            <div class="bg-gray-100 p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4 text-gray-700">Nama Motor</h2>
                <div class="mb-4">
                    <label for="tipe" class="block text-gray-700 font-bold mb-2">Tipe:</label>
                    <input type="text" name="tipe" id="tipe" 
                           value="{{ old('tipe', $data->tipe) }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="merek" class="block text-gray-700 font-bold mb-2">Merek:</label>
                    <select name="merek" id="merek" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Pilih Merek</option>
                        <option value="Honda" {{ old('merek', $data->merek) == 'Honda' ? 'selected' : '' }}>Honda</option>
                        <option value="Suzuki" {{ old('merek', $data->merek) == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                        <option value="Yamaha" {{ old('merek', $data->merek) == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                        <option value="Kawasaki" {{ old('merek', $data->merek) == 'Kawasaki' ? 'selected' : '' }}>Kawasaki</option>
                        <option value="Ducati" {{ old('merek', $data->merek) == 'Ducati' ? 'selected' : '' }}>Ducati</option>
                        <option value="BMW" {{ old('merek', $data->merek) == 'BMW' ? 'selected' : '' }}>BMW</option>
                        <option value="Lainnya" {{ old('merek', $data->merek) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                    <!-- Year -->
                    <div class="mb-4">
                        <label for="tahun" class="block text-gray-700 font-bold mb-2">Tahun:</label>
                        <select name="tahun" id="tahun" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Pilih Tahun</option>
                            @foreach (range(date('Y'), 1900) as $year)
                                <option value="{{ $year }}" {{ old('tahun', $data->tahun) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    {{-- WARNA --}}
                    <div class="mb-4">
                        <label for="warna" class="block text-gray-700 font-bold mb-2">Warna:</label>
                        <div class="flex md:flex-row flex-wrap md:space-y-0 md:space-x-4 -0 flex-col space-y-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Hitam" {{ old('warna', $data->warna) == 'Hitam' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Hitam</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Putih" {{ old('warna', $data->warna) == 'Putih' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Putih</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Merah" {{ old('warna', $data->warna) == 'Merah' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Merah</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Biru" {{ old('warna', $data->warna) == 'Biru' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Biru</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Kuning" {{ old('warna', $data->warna) == 'Kuning' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Kuning</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Hijau" {{ old('warna', $data->warna) == 'Hijau' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Hijau</span>
                            </label>
                        </div>
                    </div>
            </div>

            <!-- Part 2 -->
            <div class="bg-gray-100 p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4 text-gray-700">Part 3: Detail</h2>


                
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                    <select name="status" id="status" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="tersedia" {{ old('status', $data->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="tidak tersedia" {{ old('status', $data->status) == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar:</label>
                    
                    <!-- If there's an existing image, display it -->
                    @if ($data->gambar || Session::has('gambar'))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . (Session::get('gambar') ?? $data->gambar)) }}" alt="Current Image" class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                
                    <input type="file" name="gambar" id="gambar" accept="image/*" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

            </div>

            <!-- Part 3: Additional Details -->
            <div class="bg-gray-100 p-4 rounded shadow">
                <!-- Add any additional details you need here -->
            </div>
        </div>

        <!-- Submit Button -->
        <div class="w-full flex flex-col md:flex-row mt-6 gap-x-10">
            <div class="text-center w-1/4">
                <button type="submit" 
                        class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
            
            <div class=" w-3/4">
                @if ($errors->any())
                <div class="p-3 text-red-900 rounded-md h-full bg-red-200 border-gray-400 w-full">
                    @foreach ($errors->all() as $item)
                        <p>{{ $item }}</p>
                    @endforeach
                </div>
                @endif
            </div>

        </div>
    </form>
</div>

@endsection
