@extends('admin.layouts.app')

@section('title', 'List Motor Harga')

@section('content')

<div class="">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-3 text-xl font-semibold">
            <a href="{{ url('admin') }}" class="text-gray-500 hover:text-gray-700">&larr;</a>
            <h1>Daftar Harga Motor</h1>
        </div>
        <a href="{{ url('admin/motorHarga/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md">Tambah Harga</a>
    </div>

    {{-- Search Form --}}
    <div class="mb-4">
        <form action="{{ url('admin/motorHarga') }}" method="GET" class="flex items-center border rounded-lg overflow-hidden shadow-sm">
            <input 
                type="text" 
                name="query" 
                id="search" 
                placeholder="Search..." 
                class="flex-grow py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-300"
                value="{{ Request::get('query') }}"
            >
            <button type="submit" class="bg-teal-500 text-white px-4 py-2 hover:bg-teal-600 focus:outline-none">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <table class="min-w-full border-collapse border border-gray-300 shadow-sm rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-teal-500 text-white text-sm">
                <th class="px-4 py-2 border border-gray-300">#</th>
                <th class="px-4 py-2 border border-gray-300">Tipe</th>
                <th class="px-4 py-2 border border-gray-300">Harga/12 Jam</th>
                <th class="px-4 py-2 border border-gray-300">Harga/24 Jam</th>
                <th class="px-4 py-2 border border-gray-300">Harga/1 Minggu</th>
                <th class="px-4 py-2 border border-gray-300">Harga/1 Bulan</th>
                <th class="px-4 py-2 border border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody class=" text-gray-600 font-semibold">
            @forelse ($motorsHarga as $index => $motorHarga)
            <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition-colors">
                <td class="px-4 py-3 border border-gray-300 text-center">{{ $index + 1 }}</td>
                <td class="px-4 py-3 border border-gray-300">{{ $motorHarga->motor->tipe }}</td>
                <td class="px-4 py-3 border border-gray-300">Rp {{ number_format($motorHarga->harga_12_jam, 0, ',', '.') }}</td>
                <td class="px-4 py-3 border border-gray-300">Rp {{ number_format($motorHarga->harga_24_jam, 0, ',', '.') }}</td>
                <td class="px-4 py-3 border border-gray-300">Rp {{ number_format($motorHarga->harga_1_minggu, 0, ',', '.') }}</td>
                <td class="px-4 py-3 border border-gray-300">Rp {{ number_format($motorHarga->harga_1_bulan, 0, ',', '.') }}</td>
                <td class="px-4 py-3 border border-gray-300 flex gap-2">
                    <a href='{{ url('admin/motorHarga/'.$motorHarga->id.'/edit') }}'
                       class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('admin.motorHarga.destroy', $motorHarga->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded-md text-sm font-medium"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center px-4 py-3 text-gray-500">No motor prices available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $motorsHarga->appends(request()->query())->links('pagination::tailwind') }}
    </div>
</div>

@endsection
