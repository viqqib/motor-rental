@extends('admin.layouts.app')

@section('title', 'Data Motor')

@section('content')
<div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
    <!-- Search Form -->
    <div class="mb-6">
        <form action="{{ url('admin/motor') }}" method="GET" class="flex items-center rounded-md border border-gray-300 overflow-hidden shadow-sm">
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
                <th class="px-4 py-3">Merek</th>
                <th class="px-4 py-3">Tahun</th>
                <th class="px-4 py-3">Nomor Polisi</th>
                <th class="px-4 py-3">Warna</th>
                <th class="px-4 py-3">Harga/12 Jam</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($motors as $index => $motor)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                <td class="px-4 py-3">{{ $motor->tipe }}</td>
                <td class="px-4 py-3">{{ $motor->merek }}</td>
                <td class="px-4 py-3">{{ $motor->tahun }}</td>
                <td class="px-4 py-3">{{ $motor->nomor_plat }}</td>
                <td class="px-4 py-3">{{ $motor->warna }}</td>
                <td class="px-4 py-3">
                    {!! $motor->motorHarga 
                        ? 'Rp' . number_format($motor->motorHarga->harga_12_jam, 0, ',', '.') . 
                          '<a href="' . url('admin/motorHarga/'.$motor->motorHarga->id.'/edit') . '" class="ml-3 text-teal-600 underline">Edit</a>'
                        : '<a href="' . url('admin/motorHarga/create') . '" class="text-red-600 underline">Tambah Harga</a>'
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
                            Delete
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
    <div class="flex justify-end mt-6">
        <a href="{{ url('admin/motor/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md">
            Tambah Motor
        </a>
    </div>
</div>
@endsection
