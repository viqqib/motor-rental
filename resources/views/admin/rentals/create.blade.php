@extends('admin.layouts.app')

@section('title', 'Form Penyewaan')

@section('content')

<div class="w-full border border-gray-200 bg-white rounded-lg shadow-md p-3">
    <a href="{{ url('admin/penyewaan') }}" 
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

    <form action="{{ isset($rental) ? url('admin/penyewaan/' . $rental->id) : url('admin/penyewaan') }}" method="POST">
        @csrf
        @if (isset($rental))
            @method('PUT')
        @endif
        <div class="mt-4">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                {{-- Renter Select --}}
                <tr class="border-b bg-gray-50">
                    <th class="px-4 py-2 font-medium text-gray-900">Perental</th>

                    <td class="px-4 py-2">
                        <select name="id_renter" id="id_renter" 
                                class="block w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Pilih Perental</option>
                            @foreach ($renters as $renter)
                                <option value="{{ $renter->id }}" 
                                        {{ (old('id_renter', isset($selectedRenter) ? $selectedRenter : ($rental->id_renter ?? '')) == $renter->id) ? 'selected' : '' }}>
                                    {{ $renter->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    
                    

                </tr>


                

                {{-- Motor Select --}}
                <tr class="border-b bg-gray-50">
                    <th class="px-4 py-2 font-medium text-gray-900">Motor yang dirental</th>
                    <td class="px-4 py-2">
                        <div class="space-y-2">
                            @foreach ($motors as $motor)
                                <div>
                                    <input type="radio" name="id_motor" id="motor_{{ $motor->id }}" 
                                           value="{{ $motor->id }}" 
                                           {{ (old('id_motor', isset($selectedMotor) ? $selectedMotor : ($rental->id_motor ?? '')) == $motor->id) ? 'checked' : '' }} 
                                           class="mr-2">
                                    <label for="motor_{{ $motor->id }}">
                                        {{ $motor->nomor_plat }} - {{ $motor->merek }} {{ $motor->tipe }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                
                

                    {{-- Tanggal Sewa --}}
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Tanggal Mulai</th>
                        <td class="px-4 py-2">
                            <input type="date" name="tgl_mulai" id="tgl_mulai" 
                                   value="{{ old('tgl_mulai', $rental->tgl_mulai ?? '') }}" 
                                   min="{{ date('Y-m-d') }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
    
                    {{-- Tanggal Selesai --}}
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Tanggal Selesai</th>
                        <td class="px-4 py-2">
                            <input type="date" name="tgl_selesai" id="tgl_selesai" 
                                   value="{{ old('tgl_selesai', $rental->tgl_selesai ?? '') }}" 
                                   min="{{ date('Y-m-d') }}" 
                                   class="block w-full p-2 border border-gray-300 rounded-md">
                        </td>
                    </tr>
    
                    {{-- Durasi Sewa --}}
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Durasi Sewa (Hari)</th>
                        <td class="px-4 py-2">
                            <input type="number" name="durasi_sewa" id="durasi_sewa" 
                                   value="{{ old('durasi_sewa', $rental->durasi_sewa ?? '') }}" 
                                   readonly 
                                   class="block w-full p-2 border border-gray-300 bg-gray-100 rounded-md">
                        </td>
                    </tr>

                     {{-- Status --}}
                     <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Status</th>
                        <td class="px-4 py-2">
                            <div class="flex  items-center space-x-6">
                                @foreach (['belum bayar', 'dipesan', 'dirental', 'selesai'] as $status)
                                    <div class="flex justify-center items-center">
                                        <input type="radio" name="status" id="status_{{ $status }}" 
                                               value="{{ $status }}" 
                                               {{ (old('status', $rental->status ?? '') == $status) ? 'checked' : '' }} 
                                               class="mr-2">
                                        <label for="status_{{ $status }}" class="capitalize">
                                            {{ $status }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    
    
                    {{-- Total Harga --}}
                    <tr class="border-b">
                        <th class="px-4 py-2 font-medium text-gray-900">Total Harga</th>
                        <td class="px-4 py-2">
                            <input type="text" name="total_harga" id="total_harga" 
                                   value="{{ old('total_harga', $rental->total_harga ?? '') }}" 
                                   class="block w-full p-2 border border-gray-300  rounded-md">
                        </td>
                    </tr>

                   
                </tbody>
            </table>
        </div>
    
        <div class="mt-6 text-center">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                {{ isset($rental) ? 'Update' : 'Submit' }}
            </button>
        </div>
    </form>
    
</div>

<script>
    const tglMulai = document.getElementById('tgl_mulai');
    const tglSelesai = document.getElementById('tgl_selesai');
    const durasiSewa = document.getElementById('durasi_sewa');

    function calculateDuration() {
        const startDate = new Date(tglMulai.value);
        const endDate = new Date(tglSelesai.value);

        if (startDate && endDate && startDate <= endDate) {
            const duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            durasiSewa.value = duration;
        } else {
            durasiSewa.value = '';
        }
    }

    tglMulai.addEventListener('change', calculateDuration);
    tglSelesai.addEventListener('change', calculateDuration);
</script>
@endsection
