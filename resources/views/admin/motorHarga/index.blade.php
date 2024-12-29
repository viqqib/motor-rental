@extends('admin.layouts.app')

@section('title', 'List Motor Harga')

@section('content')

<div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">

    <!-- Search Form -->
    <div class="mb-6">
        <form action="{{ url('admin/motorHarga') }}" method="GET" class="flex items-center rounded-md border border-gray-300 overflow-hidden shadow-sm">
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
    </div>

    <!-- Data Table -->
    <table class="min-w-full border-collapse table-auto rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-teal-500 text-white text-sm uppercase">
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Tipe</th>
                <th class="px-4 py-3">Harga/12 Jam</th>
                <th class="px-4 py-3">Harga/24 Jam</th>
                <th class="px-4 py-3">Harga/1 Minggu</th>
                <th class="px-4 py-3">Harga/1 Bulan</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($motorsHarga as $index => $motorHarga)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                <td class="px-4 py-3">{{ $motorHarga->motor->tipe }}</td>
                <td class="px-4 py-3">Rp {{ number_format($motorHarga->harga_12_jam, 0, ',', '.') }}</td>
                <td class="px-4 py-3">Rp {{ number_format($motorHarga->harga_24_jam, 0, ',', '.') }}</td>
                <td class="px-4 py-3">Rp {{ number_format($motorHarga->harga_1_minggu, 0, ',', '.') }}</td>
                <td class="px-4 py-3">Rp {{ number_format($motorHarga->harga_1_bulan, 0, ',', '.') }}</td>
                <td class="px-4 py-3 flex gap-2 justify-center">
                    <a href='{{ url('admin/motorHarga/'.$motorHarga->id.'/edit') }}'
                       class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md text-sm">
                        Edit
                    </a>
                    <form action="{{ route('admin.motorHarga.destroy', $motorHarga->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md text-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center px-4 py-3 text-gray-500">
                    No motor prices available.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $motorsHarga->appends(request()->query())->links('pagination::tailwind') }}
    </div>

    <!-- Add Motor Harga Button -->
    <div class="flex justify-end mt-6">
        <a href="{{ url('admin/motorHarga/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md">
            Tambah Harga Motor
        </a>
    </div>
</div>

@endsection
