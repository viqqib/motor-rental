@extends('admin.layouts.app')

@section('title', 'Edit Motorbike')

@section('content')

<div class="w-full border border-gray-200 bg-white rounded-lg shadow-md p-3">
    <a href="{{ url('admin/motor/') }}" 
       class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
        Kembali
    </a>

    @if ($errors->any())
    <div class="p-3 text-red-900 rounded-md h-full bg-red-200 border-gray-400 w-full mt-4">
        @foreach ($errors->all() as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ url('admin/motor/'.$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mt-4">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Nomor Plat</th>
                        <td class="px-4 py-2">
                            <input type="text" name="nomor_plat" id="nomor_plat" 
                                   value="{{ old('nomor_plat', $data->nomor_plat) }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Nama</th>
                        <td class="px-4 py-2">
                            <input type="text" name="tipe" id="tipe" 
                                   value="{{ old('tipe', $data->tipe) }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Merek</th>
                        <td class="px-4 py-2">
                            <select name="merek" id="merek" class="block w-full p-2 border border-gray-300 rounded-md">
                                <option value="">Pilih Merek</option>
                                <option value="Honda" {{ old('merek', $data->merek) == 'Honda' ? 'selected' : '' }}>Honda</option>
                                <option value="Suzuki" {{ old('merek', $data->merek) == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                                <option value="Yamaha" {{ old('merek', $data->merek) == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                                <option value="Kawasaki" {{ old('merek', $data->merek) == 'Kawasaki' ? 'selected' : '' }}>Kawasaki</option>
                                <option value="Ducati" {{ old('merek', $data->merek) == 'Ducati' ? 'selected' : '' }}>Ducati</option>
                                <option value="BMW" {{ old('merek', $data->merek) == 'BMW' ? 'selected' : '' }}>BMW</option>
                                <option value="Lainnya" {{ old('merek', $data->merek) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Tahun</th>
                        <td class="px-4 py-2">
                            <select name="tahun" id="tahun" class="block w-full p-2 border border-gray-300 rounded-md">
                                <option value="">Pilih Tahun</option>
                                @foreach (range(date('Y'), 1900) as $year)
                                    <option value="{{ $year }}" {{ old('tahun', $data->tahun) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Warna</th>
                        <td class="px-4 py-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="warna" value="Hitam" {{ old('warna', $data->warna) == 'Hitam' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Hitam</span>
                            </label>
                            <label class="inline-flex items-center ml-5">
                                <input type="radio" name="warna" value="Putih" {{ old('warna', $data->warna) == 'Putih' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Putih</span>
                            </label>
                            <label class="inline-flex items-center ml-5">
                                <input type="radio" name="warna" value="Merah" {{ old('warna', $data->warna) == 'Merah' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Merah</span>
                            </label>
                            <label class="inline-flex items-center ml-5">
                                <input type="radio" name="warna" value="Biru" {{ old('warna', $data->warna) == 'Biru' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Biru</span>
                            </label>
                            <label class="inline-flex items-center ml-5">
                                <input type="radio" name="warna" value="Kuning" {{ old('warna', $data->warna) == 'Kuning' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Kuning</span>
                            </label>
                            <label class="inline-flex items-center ml-5">
                                <input type="radio" name="warna" value="Hijau" {{ old('warna', $data->warna) == 'Hijau' ? 'checked' : '' }} class="form-radio text-blue-600">
                                <span class="ml-2 text-gray-700">Hijau</span>
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Status</th>
                        <td class="px-4 py-2">
                            <select name="status" id="status" class="block w-full p-2 border border-gray-300 rounded-md">
                                <option value="tersedia" {{ old('status', $data->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="tidak tersedia" {{ old('status', $data->status) == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                <option value="perawatan" {{ old('status', $data->status) == 'perawatan' ? 'selected' : '' }}>Perawatan</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50">
                        <th class="px-4 py-2 font-medium text-gray-900">Gambar</th>
                        <td class="px-4 py-2">
                            <!-- If there's an existing image, display it -->
                            @if ($data->gambar || Session::has('gambar'))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . (Session::get('gambar') ?? $data->gambar)) }}" alt="Current Image" class="w-32 h-32 object-cover rounded">
                                </div>
                            @endif
                            <input type="file" name="gambar" id="gambar" accept="image/*" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Submit
            </button>
        </div>
    </form>
</div>

@endsection
