@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","progam Ekstrakulikuler sekolah")

@section("content")
    <div id="main" class="main-content relative flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="flex w-full justify-between items-center pt-4 ">
                <div class="w-3/4 ml-10">
                    <h3 class="text-3xl font-semibold dark:text-white">Esktrakulikuler</h3>
                    <p class="mb-3 text-gray-800 dark:text-gray-400">seluruh data ekstrakulikuler smkn 1 gedangan</p>
                </div>
                <div data-modal-target="t-photo" data-modal-toggle="t-photo" class="text-white mr-10 cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 shadow-md transition-all duration-200">Tambah photo</div>
            </div>

        </div>
        <div class="flex justify-center w-full">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Photo</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstraPhotos as $ekstraPhoto)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                @if (file_exists(public_path('img/ekstra/' . $ekstraPhoto->photo)) && $ekstraPhoto->photo)
                                <img class="w-10 rounded-md object-cover h-10" src="{{ asset("img/ekstra/" . $ekstraPhoto->photo) }}" alt="">
                                @else
                                <div class="bg-gray-200 w-10 h-10 grid place-content-center">
                                </div>
                                @endif
                            </td>
                            <td class="px-6 flex gap-2 py-4 justify-center">
                              
                                <form id="delete-form-{{ $ekstraPhoto->id }}" action="{{ route('ekstraPhoto.destroy', [Crypt::encrypt($ekstraPhoto->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete({{ $ekstraPhoto->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-5 w-3/4 pl-10">
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$ekstrakulikuler->konten!!}</div>
        </div>
        <div class="items-center ml-6 pb-6">

                <a href="{{ route('ekstrakulikuler.edit', [Crypt::encrypt($ekstrakulikuler->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-500 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Ekstrakulikuler</a>
        </div>
          {{-- tambah photo ekstrakulikuler --}}
          <div id="t-photo" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed bg-black bg-opacity-50 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Photo Ekstrakulikuler Baru
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="t-photo">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" method="post" enctype="multipart/form-data" action="{{route("ekstraPhoto.store")}}">
                            @csrf
                            <div>
                                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" type="file" name="photo" id="photo">
                                @error('photo')
                                <p class="mt-2 text-sm text-red-800">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
<script>
    window.Laravel = {
        successMessage: @json(session('success')),
    };
        function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Photo Ekstra ini akan dihapus secara permanen!",
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
                    document.getElementById(`delete-form-${articleId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
</script>
@endsection
