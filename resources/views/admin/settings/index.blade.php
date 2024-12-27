@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')

<div class="">

    
    {{-- @foreach ($socialLinks as $socialLink )
        <h1>{{ $socialLink->name }}</h1>
        <i class="fa-brands fa-{{ $socialLink->name }}"></i>
        <h1>{{ $socialLink->iden }}</h1>
    @endforeach --}}

    <div class="bg-white rounded-md p-5 px-7">
        <div class="bg-white w-[800px] px-3 border border-gray-200 pt-3 rounded-md pb-3">
            <p class="text-xl font-xl font-semibold text-teal-700">Sosial Media</p>
            <hr class="bg-red-700 mt-3">
            <table class="w-full text-left">
                @foreach ($socialLinks as $socialLink)
                    <tr class="bg-white py-3">
                        <!-- Social Media Name -->
                        <td class="py-3 px-4 w-1/4">
                            <div class="text-lg">{{ ucfirst($socialLink->name) }}</div>
                        </td>

                        <!-- Social Media Identifier -->
                        <td class="py-3 px-4 w-1/3">
                            <a class="ml-10" href="{{ $socialLink->link }}" target="_blank">{{ $socialLink->identifier }}</a>
                        </td>

                        <!-- Action Buttons -->
                        <td class="py-3 px-4 text-right w-1/4">
                            <div class="flex justify-end space-x-4">
                                <!-- Edit Button with Font Awesome Icon -->
                                <a href="{{ route('admin.settings.social-link.edit', $socialLink->id) }}" class="text-teal-600">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- Delete button with Font Awesome Icon -->
                                <form action="{{ route('admin.settings.social-link.destroy', $socialLink->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $socialLink->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400" onclick="return confirmDelete({{ $socialLink->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

            <a href="settings/social-link/create" class="inline-block mt-3">
                <div class="bg-blue-600 py-3 px-4 text-white rounded-md font-bold">Tambah Akun Sosial Media</div>
            </a>
            

        </div>
    </div>
    
    
</div>


<script>
    function confirmDelete(socialLinkId) {
        const result = confirm("Hapus akun ini?");
        if (result) {
            document.getElementById('delete-form-' + socialLinkId).submit();
        }
        return false; // Prevent the default form submission
    }
</script>


@endsection
