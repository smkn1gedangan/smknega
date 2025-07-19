@extends("backend.layouts.main")


@section("title","ekstrakulikuler")

@section("content")
<div id="main" class="main-content relative flex-1">
        <x-titlepage title="data ekstrakulikuler" quote="data ekstrakulikuler yang ada di smkn 1 gedangan" isRoute="true" nameRoute="Tambah Photo" href="{{ route('ekstraPhoto.create') }}"></x-titlepage>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10 p-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">No.</th>
                        <th scope="col" class="px-6 text-center py-3">Photo</th>
                        <th scope="col" class="px-6 text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstraPhotos as $ep)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 text-center py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 text-center py-4">
                                <div class="flex justify-center">@if (file_exists(public_path('storage/' . $ep->photo)) && $ep->photo)
                                <img class="w-10  duration-700  rounded-md object-cover h-10" src="{{ asset("storage/" . $ep->photo) }}" alt="">
                                @else
                                <div class="bg-gray-200 w-10 h-10 rounded-md grid place-content-center">
                                <span></span> <!-- Pesan fallback -->
                                </div>
                                @endif</div>
                            </td>
                            <td class="px-6 text-center flex gap-2 py-4 justify-center">
                                <form id="delete-form-{{ $ep->id }}" action="{{ route('ekstraPhoto.destroy', [Crypt::encrypt($ep->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $ep->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $ekstraPhotos->links() }}</div>
            <div class="w-full">
                <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$ekstrakulikuler->konten!!}</div>
                <div class="items-center pb-6">
     
                     <a href="{{ route('ekstrakulikuler.edit', [Crypt::encrypt($ekstrakulikuler->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200 capitalize">Ubah Data Ekstrakulikuler</a>
                 </div>
            </div>
        </div>
        
        
    </div>
@endsection

@section("js")
    <script>
        function confirmDelete(ekstraId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Photo ini akan dihapus secara permanen!",
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
                    document.getElementById(`delete-form-${ekstraId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>
@endsection
