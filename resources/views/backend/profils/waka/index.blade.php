@extends("backend.layouts.main")


@section("title","Waka")

@section("content")
<div id="main" class="main-content relative flex-1">
        <x-titlepage title="waka waka" quote="data waka di smkn 1 gedangan" isRoute="route" nameRoute="Tambah waka" href="{{ route('waka.create') }}"></x-titlepage>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10 p-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">No.</th>
                        <th scope="col" class="px-6 text-center py-3">Nama</th>
                        <th scope="col" class="px-6 text-center py-3">Jabatan</th>
                        <th scope="col" class="px-6 text-center py-3">Photo</th>
                        <th scope="col" class="px-6 text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wakas as $waka)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 text-center py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 text-center py-4">{{ Str::words($waka->nama, 3, '...') }}</td>
                            <td class="px-6 text-center py-4">{{ $waka->jabatan }}</td>
                            <td class="px-6 text-center py-4">
                                <div class="flex justify-center">@if (file_exists(public_path('storage/' . $waka->photo)) && $waka->photo)
                                <img class="w-10  duration-700  rounded-md object-cover h-10" src="{{ asset("storage/" . $waka->photo) }}" alt="">
                                @else
                                <div class="bg-gray-200 w-10 h-10 rounded-md grid place-content-center">
                                <span></span> <!-- Pesan fallback -->
                                </div>
                                @endif</div>
                            </td>
                            <td class="px-6 text-center flex gap-2 py-4 justify-center">
                                <a href="{{ route('waka.edit', [Crypt::encrypt($waka->id)]) }}" class="text-yellow-500 hover:text-yellow-600 dark:text-blue-400 ml-4">Edit</a>
                                <form id="delete-form-{{ $waka->id }}" action="{{ route('waka.destroy', [Crypt::encrypt($waka->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $waka->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $wakas->links() }}</div>
        </div>

    </div>
@endsection

@section("js")
    <script>
        function confirmDelete(guruId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Waka ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak , Batal',
                width: '550px',
                customClass: {
                    popup: 'swal-height'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${guruId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>
@endsection
