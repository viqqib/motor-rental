@extends('admin.layouts.app')

@section('title', 'Data Motor')

@section('content')
<div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
   
    
    <!-- Search Form -->
    <div class="mb-2 flex w-full space-x-1">
        <form action="{{ url('admin/penyewaan') }}" method="GET" class="flex w-full items-center rounded-md border border-gray-300 overflow-hidden shadow-sm">
            <input 
                type="text" 
                name="query" 
                id="search" 
                placeholder="Cari Penyewa..." 
                class="flex-grow py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-400"
                value="{{ Request::get('query') }}"
            >
            <button type="submit" class="bg-teal-500 text-white px-5 py-2 hover:bg-teal-600 focus:ring-2 focus:ring-teal-300">
                <i class="fas fa-search"></i>
            </button>
        </form>
        
        {{-- Filter --}}
        <form action="{{ url('admin/penyewaan') }}" method="GET" class=" w- flex justify-center items-center">
            <input type="hidden" name="query" value="{{ Request::get('query') }}">
            <div class="relative inline-block">
                <select
                    name="sort"
                    class="appearance-none text-gray-700 bg-white border border-gray-300 py-2 px-3 pr-10 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    onchange="this.form.submit()">
                    <option value="" {{ Request::get('sort') == '' ? 'selected' : '' }}>
                        Urutkan <!-- FontAwesome filter icon -->
                    </option>
                    <option value="newest" {{ Request::get('sort') == 'newest' ? 'selected' : '' }}>
                        Terbaru <!-- FontAwesome calendar icon -->
                    </option>
                    <option value="oldest" {{ Request::get('sort') == 'oldest' ? 'selected' : '' }}>
                     Terlama <!-- FontAwesome calendar icon -->
                    </option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-500"></i> <!-- FontAwesome chevron icon -->
                </div>
            </div>
            
        </form>
        {{-- Status Filter --}}
        {{-- <form action="{{ url('admin/motor') }}" method="GET" class="flex justify-center items-center">
            <input type="hidden" name="query" value="{{ Request::get('query') }}">
            <select 
                name="status" 
                class="appearance-none text-gray-700 bg-white border border-gray-300 py-2 px-3  rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                onchange="this.form.submit()">
                <option value="" {{ Request::get('status') == '' ? 'selected' : '' }}>Ketersediaan</option>
                <option value="tersedia" {{ Request::get('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="tidak tersedia" {{ Request::get('status') == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                <option value="perawatan" {{ Request::get('status') == 'perawatan' ? 'selected' : '' }}>Perawatan</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-500"></i> <!-- FontAwesome chevron icon -->
            </div>
        </form> --}}

        <div class="flex">
            <a href="{{ url('admin/penyewaan/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium  justify-center items-center flex px-4 rounded-md">
                Tambah
            </a>
          
        </div>
    </div>

   
    {{-- @if($motorsWithoutPrice->isNotEmpty())
    <div class="bg-red-100 p-3 rounded-md text-red-600 mb-2">
        Terdapat {{ $motorsWithoutPrice->count() }} Motor yang harganya belum diisi. <a href="{{ route('admin.motorHarga.create') }}" class="font-bold text-red-700 underline">Isi harga motor</a>
    </div>
    @endif --}}
    <!-- Data Table -->
    <table class="min-w-full border-collapse table-auto rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-teal-500 text-white text-sm uppercase">
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Perental</th>
                <th class="px-4 py-3">Motor</th>
                <th class="px-4 py-3">Durasi</th>
                <th class="px-4 py-3">Mulai</th>
                <th class="px-4 py-3">Selesai</th>
                <th class="px-4 py-3">Total</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($rentals as $index => $rental)
            <tr class="hover:bg-gray-100 transition text-center">
                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                <td class="px-4 py-3">
                    <p>{{ $rental->renter->name }}</p>
                    <span class="text-xs text-gray-500">{{ $rental->renter->no_identitas }}</span>
                </td>
                <td class="px-4 py-3">
                    <p>{{ $rental->motor->merek }} {{ $rental->motor->tipe }}</p>
                    <span class="text-xs text-gray-500">{{ $rental->motor->nomor_plat }}</span>
                    </td>
                <td class="px-4 py-3">{{ $rental->durasi_sewa }} Hari</td>
                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($rental->tgl_mulai)->format('d/m/Y') }}</td>
                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($rental->tgl_selesai)->format('d/m/Y') }}</td>
                <td class="px-4 py-3">{{ $rental->total_harga }}</td>
                <td class="px-4 py-3">
                    {{ $rental->status }}
                    <div>
                        <form action="{{ route('admin.penyewaan.toggleStatus', $rental->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <!-- Hidden field to pass the id_motor -->
                            <input type="hidden" name="id_motor" value="{{ $rental->id_motor }}">
                
                            <button 
                                type="submit" 
                                class="bg-teal-600 font-semibold px-3 text-sm py-1 text-white rounded-md
                                    {{ $rental->status == 'dirental' ? 'bg-teal-600' : 'hidden' }}
                            ">Selesaikan</button>
                        </form>
                    </div>
                </td>
                
                

                {{-- <form action="{{ route('admin.renters.toggleStatus', $renter->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button 
                        type="submit" 
                        class="py-1 px-3 rounded-md text-sm 
                               {{ $renter->status == 'aktif' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                        {{ $renter->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                    </button>
                </form> --}}

                <td class="px-4 py-3 ">
                    <div class="flex justify-center items-center gap-x-3">
                        <a href="{{ route('admin.penyewaan.edit', $rental->id) }}" 
                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md text-sm">
                             Edit
                         </a>                     
                        <form action="{{ route('admin.penyewaan.destroy', $rental->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md text-sm"
                                    onclick="return confirm('Are you sure?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
                
              


            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center px-4 py-3 text-gray-500">
                    Tidak ada penyewaan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- <div class="mt-4">
        {{ $rentals->appends(request()->query())->links('pagination::tailwind') }}
    </div> --}}

    

    <!-- Add Motor Button -->
    
</div>
@endsection
