@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')

<div class="">

    {{-- Search Form --}}
    <div class="mb-4">
        <form action="{{ url('admin/motor')  }}" method="GET" class="flex items-center border rounded-lg overflow-hidden shadow-sm">
            <input 
                type="text" 
                name="query" 
                id="search" 
                placeholder="Cari Motor..." 
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
                <th class="px-4 py-2 border border-gray-300">Merek</th>
                <th class="px-4 py-2 border border-gray-300">Tahun</th>
                <th class="px-4 py-2 border border-gray-300">Nomor Plat</th>
                <th class="px-4 py-2 border border-gray-300">Warna</th>
                <th class="px-4 py-2 border border-gray-300">Harga/12 Jam</th>
                <th class="px-4 py-2 border border-gray-300">Status</th>
                <th class="px-4 py-2 border border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody class=" text-gray-600 font-semibold">
            @forelse ($motors as $index => $motor)
            <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition-colors">
                <td class="px-4 py-3 border border-gray-300 text-center">{{ $index + 1 }}</td>
                <td class="px-4 py-3 border border-gray-300">{{ $motor->tipe }}</td>
                <td class="px-4 py-3 border border-gray-300">{{ $motor->merek }}</td>
                <td class="px-4 py-3 border border-gray-300">{{ $motor->tahun }}</td>
                <td class="px-4 py-3 border border-gray-300">{{ $motor->nomor_plat }}</td>
                <td class="px-4 py-3 border border-gray-300">{{ $motor->warna }}</td>
                <td class="px-4 py-3 border border-gray-300">
                    {!! $motor->motorHarga ? 'Rp' . number_format($motor->motorHarga->harga_12_jam, 0, ',', '.'). '<a href="' . url('admin/motorHarga/'.$motor->motorHarga->id.'/edit') . '" class="bg-yellow-400 font-bold px-5 py-2 text-gray-700 rounded-md ml-3 ">Edit Harga</a>' 
                    : '<a href="' . url('admin/motorHarga') . '" class="bg-red-600 font-bold px-5 py-2 text-white rounded-md">Tambah Harga</a>' !!}

                </td>

       

            
                
                <td class="px-4 py-3 border border-gray-300">
                    <span class="{{ $motor->status === 'tersedia' ? 'text-green-700' : 'text-red-500' }}">
                        {{ ucfirst($motor->status) }}
                    </span>
                </td>
                <td class="px-4 py-3 border border-gray-300 flex gap-2">
                    <a href='{{ url('admin/motor/'.$motor->id.'/edit') }}'
                       class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('admin.motor.destroy', $motor->id) }}" method="POST" class="inline-block">
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
                <td colspan="8" class="text-center px-4 py-3 text-gray-500">No motors available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $motors->appends(request()->query())->links('pagination::tailwind') }}
    </div>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ url('admin/motor/create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md">Tambah Motor</a>
    </div>
</div>

@endsection