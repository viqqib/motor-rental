@extends('admin.layouts.app')

@section('title', 'Create Motorbike')

@section('content')

<div class="w-full border border-gray-200 bg-white rounded-lg shadow-md p-3">
    <a href="{{ url('admin/motor/') }}" 
       class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
        Kembali
    </a>

    @if ($errors->any())
    <div class="p-3 text-red-900 rounded-md h-full bg-red-200 border-gray-400 w-full">
        @foreach ($errors->all() as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ url('admin/motor') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="w-full text-sm text-left text-gray-700 border-collapse">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 font-medium text-gray-900">Nomor Plat</th>
                    <td class="px-4 py-2">
                        <input type="text" name="nomor_plat" id="nomor_plat" 
                               value="{{ old('nomor_plat') }}" 
                               class="block w-full p-2 border border-gray-300 rounded-md">
                    </td>
                </tr>
                <tr class="border-b bg-gray-50">
                    <th class="px-4 py-2 font-medium text-gray-900">Tipe</th>
                    <td class="px-4 py-2">
                        <input type="text" name="tipe" id="tipe" 
                               value="{{ old('tipe') }}" 
                               class="block w-full p-2 border border-gray-300 rounded-md">
                    </td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 font-medium text-gray-900">Merek</th>
                    <td class="px-4 py-2">
                        <select name="merek" id="merek" class="block w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Pilih Merek</option>
                            <option value="Honda" {{ old('merek') == 'Honda' ? 'selected' : '' }}>Honda</option>
                            <option value="Suzuki" {{ old('merek') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                            <option value="Yamaha" {{ old('merek') == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                            <option value="Kawasaki" {{ old('merek') == 'Kawasaki' ? 'selected' : '' }}>Kawasaki</option>
                            <option value="Ducati" {{ old('merek') == 'Ducati' ? 'selected' : '' }}>Ducati</option>
                            <option value="BMW" {{ old('merek') == 'BMW' ? 'selected' : '' }}>BMW</option>
                            <option value="Lainnya" {{ old('merek') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b bg-gray-50">
                    <th class="px-4 py-2 font-medium text-gray-900">Tahun</th>
                    <td class="px-4 py-2">
                        <select name="tahun" id="tahun" class="block w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Pilih Tahun</option>
                            @foreach (range(date('Y'), 1900) as $year)
                                <option value="{{ $year }}" {{ old('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 font-medium text-gray-900">Warna</th>
                    <td class="px-4 py-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="warna" value="Hitam" {{ old('warna') == 'Hitam' ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2 text-gray-700">Hitam</span>
                        </label>
                        <label class="inline-flex items-center ml-5 ">
                            <input type="radio" name="warna" value="Putih" {{ old('warna') == 'Putih' ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2 text-gray-700">Putih</span>
                        </label>
                        <label class="inline-flex items-center ml-5">
                            <input type="radio" name="warna" value="Merah" {{ old('warna') == 'Merah' ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2 text-gray-700">Merah</span>
                        </label>
                        <label class="inline-flex items-center ml-5">
                            <input type="radio" name="warna" value="Biru" {{ old('warna') == 'Biru' ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2 text-gray-700">Biru</span>
                        </label>
                        <label class="inline-flex items-center ml-5">
                            <input type="radio" name="warna" value="Kuning" {{ old('warna') == 'Kuning' ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2 text-gray-700">Kuning</span>
                        </label>
                        <label class="inline-flex items-center ml-5">
                            <input type="radio" name="warna" value="Hijau" {{ old('warna') == 'Hijau' ? 'checked' : '' }} class="form-radio text-blue-600">
                            <span class="ml-2 text-gray-700">Hijau</span>
                        </label>
                    </td>
                </tr>
                <tr class="border-b bg-gray-50">
                    <th class="px-4 py-2 font-medium text-gray-900">Status</th>
                    <td class="px-4 py-2">
                        <select name="status" id="status" class="block w-full p-2 border border-gray-300 rounded-md">
                            <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="tidak tersedia" {{ old('status') == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                            <option value="tidak tersedia" {{ old('status') == 'perawatan' ? 'selected' : '' }}>Perawatan</option>
                        </select>
                    </td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 font-medium text-gray-900">Upload Gambar</th>
                    <td class="px-4 py-2">
                        <input type="file" name="gambar" id="gambar" class="block w-full p-2 border border-gray-300 rounded-md">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end px-4 py-3">
            <button type="submit" 
                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                Submit
            </button>
        </div>
    </form>
</div>


@endsection
