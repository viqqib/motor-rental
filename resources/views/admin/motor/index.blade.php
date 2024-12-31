@extends('admin.layouts.app')

@section('title', 'Data Motor')

@section('content')
<div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
   
    
    <!-- Search Form -->
    <div class="mb-2 flex w-full space-x-1">
        <form action="{{ url('admin/motor') }}" method="GET" class="flex w-full items-center rounded-md border border-gray-300 overflow-hidden shadow-sm">
            <input 
                type="text" 
                name="query" 
                id="search" 
                placeholder="Cari Motor..." 
                class="flex-grow py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-400"
                value="{{ Request::get('query') }}"
            >
            <button type="submit" class="bg-teal-500 text-white px-5 py-2 hover:bg-teal-600 focus:ring-2 focus:ring-teal-300">
                <i class="fas fa-search"></i>
            </button>
        </form>
        
        {{-- Filter --}}
        <form action="{{ url('admin/motor') }}" method="GET" class=" w- flex justify-center items-center">
            <input type="hidden" name="query" value="{{ Request::get('query') }}">
            <div class="relative inline-block">
                <select
                    name="sort"
                    class="appearance-none text-gray-700 bg-white border border-gray-300 py-2 px-3 pr-10 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    onchange="this.form.submit()">
                    <option value="" {{ Request::get('sort') == '' ? 'selected' : '' }}>
                        Urutkan <!-- FontAwesome filter icon -->
                    </option>
                    <option value="asc" {{ Request::get('sort') == 'asc' ? 'selected' : '' }}>
                        A-Z <!-- FontAwesome text icon -->
                    </option>
                    <option value="desc" {{ Request::get('sort') == 'desc' ? 'selected' : '' }}>
                        Z-A <!-- FontAwesome text icon -->
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
        <form action="{{ url('admin/motor') }}" method="GET" class="flex justify-center items-center">
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
        </form>

        <div class="flex">
            <a href="{{ url('admin/motor/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium  justify-center items-center flex px-4 rounded-md">
                Tambah
            </a>
            {{-- <a href="{{ url('admin/motor/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-5 rounded-md">
                Tambah Motor
            </a> --}}
        </div>
    </div>

   
    @if($motorsWithoutPrice->isNotEmpty())
    <div class="bg-red-100 p-3 rounded-md text-red-600 mb-2">
        Terdapat {{ $motorsWithoutPrice->count() }} Motor yang harganya belum diisi. <a href="{{ route('admin.motorHarga.create') }}" class="font-bold text-red-700 underline">Isi harga motor</a>
    </div>
    @endif
    <!-- Data Table -->
    <table class="min-w-full border-collapse table-auto rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-teal-500 text-white text-sm uppercase">
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Gambar</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Merek</th>
                <th class="px-4 py-3">Tahun</th>
                <th class="px-4 py-3">Nomor Polisi</th>
                <th class="px-4 py-3">Warna</th>
                <th class="px-4 py-3">Harga/12 Jam</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($motors as $index => $motor)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                <td><img src="{{ asset('storage/' . $motor->gambar) }}" alt="" class="w-16 h-10"></td>
                <td class="px-4 py-3">{{ $motor->tipe }}</td>
                <td class="px-4 py-3">{{ $motor->merek }}</td>
                <td class="px-4 py-3">{{ $motor->tahun }}</td>
                <td class="px-4 py-3">{{ $motor->nomor_plat }}</td>
                <td class="px-4 py-3">{{ $motor->warna }}</td>
                <td class="px-4 py-3">
                    {!! $motor->motorHarga 
                        ? 'Rp' . number_format($motor->motorHarga->harga_12_jam, 0, ',', '.') . 
                          ' <a href="' . url('admin/motorHarga/'.$motor->motorHarga->id.'/edit') . '" class="ml-3 text-teal-600 underline">Edit</a>'
                        : '<a href="' . url('admin/motorHarga/create?motor_id=' . $motor->id) . '" class="text-red-600 underline">
                              Tambah Harga
                           </a>'
                    !!}
                    
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="{{ $motor->status === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ucfirst($motor->status) }}
                    </span>
                </td>
                <td class="px-4 py-3 flex gap-2 justify-center">
                    <a href="{{ url('admin/motor/'.$motor->id.'/edit') }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md text-sm">
                        Edit
                    </a>
                    <form action="{{ route('admin.motor.destroy', $motor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md text-sm"
                                onclick="return confirm('Are you sure?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center px-4 py-3 text-gray-500">
                    No motors available.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $motors->appends(request()->query())->links('pagination::tailwind') }}
    </div>

    

    <!-- Add Motor Button -->
    
</div>
@endsection
