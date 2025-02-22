@extends("backend.layouts.main")


@section("title","Komite")

@section("content")
    <div id="main" class="main-content relative flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-semibold dark:text-white">Data Komite</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">seluruh data komite smkn 1 gedangan</p>
            </div>
            <div data-modal-target="t-komite" data-modal-toggle="t-komite" class="text-white mr-10 bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition-all duration-200 cursor-pointer">Tambah Komite</div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10">
            <x-heading-welcome classAdventage="md:my-6">Ketua Komite</x-heading-welcome>
            {{-- ketua komite --}}
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400 md:mb-20">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <th scope="col" class="px-6 py-3">Photo</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center">1</td>
                        <td class="px-6 py-4">{{ Str::words($ketuaKomite->nama, 3, '...') }}</td>
                        <td class="px-6 py-4">{{ $ketuaKomite->jabatan }}</td>
                        <td class="px-6 py-4">
                            @if (file_exists(public_path('img/komite/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                            <img class="w-10 rounded-md object-cover h-10" src="{{ asset("img/komite/" . $ketuaKomite->photo) }}" alt="">
                            @else
                            <div class="bg-gray-200 w-10 h-10 grid place-content-center">
                            </div>
                            @endif
                        </td>
                        <td class="px-6 flex gap-2 py-4 justify-center">
                            <div data-modal-target="u-kk" data-modal-toggle="u-kk" class="text-yellow-500 hover:text-yellow-600 dark:text-yellow-400 ml-4 cursor-pointer">Edit</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <x-heading-welcome classAdventage="md:my-6">Komite - Komite</x-heading-welcome>
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <th scope="col" class="px-6 py-3">Photo</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komites as $komite)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ Str::words($komite->nama, 3, '...') }}</td>
                            <td class="px-6 py-4">{{ $komite->jabatan }}</td>
                            <td class="px-6 py-4">
                                @if (file_exists(public_path('img/komite/' . $komite->photo)) && $komite->photo)
                                <img class="w-10  duration-700  object-cover h-10" src="{{ asset("img/komite/" . $komite->photo) }}" alt="">
                                @else
                                <div class="bg-gray-200 w-10 h-10 grid place-content-center">
                                </div>
                                @endif
                            </td>
                            <td class="px-6 flex gap-2 py-4 justify-evenly">
                                <a href="{{ route('komite.edit', [Crypt::encrypt($komite->id)]) }}" class="text-yellow-500 hover:text-yellow-600 dark:text-yellow-400 ml-4 transition-all duration-200">Edit</a>
                                <form id="delete-form-{{ $komite->id }}" action="{{ route('komite.destroy', [Crypt::encrypt($komite->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete({{ $komite->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $komites->links() }}</div>
        </div>
          {{-- update ketua komite --}}
          <div id="u-kk" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed bg-black bg-opacity-50 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Ketua Komite
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="u-kk">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("ketuaKomite.update", [Crypt::encrypt($ketuaKomite->id)])}}">
                            @csrf
                            @method("put")
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="nama" value="{{old("nama",$ketuaKomite->nama)}}" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan Nama" required />
                                @error('nama')
                                <p class="mt-2 text-sm text-red-800">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div>
                                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                <input type="text" value="{{old("jabatan",$ketuaKomite->jabatan)}}" placeholder="Masukkan Jabatan" name="jabatan" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                @error('jabatan')
                                <p class="mt-2 text-sm text-red-800">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div>
                                @if (file_exists(public_path('img/komite/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                                <p class="mt-3">Photo saat ini : </p>
                                <img class="w-24  duration-700  rounded-md object-cover h-full" src="{{ asset("img/komite/" . $ketuaKomite->photo) }}" alt="">
                                @else
                                <p class="mt-3">Photo saat ini : </p>
                                <div class="bg-gray-200 w-10 h-14 grid place-content-center">
                                </div>
                                @endif
                                <input class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" type="file" name="photo" id="photo">
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
          {{-- tambah komite --}}
          <div id="t-komite" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed bg-black bg-opacity-50 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Komite Baru
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="t-komite">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("komite.store")}}">
                            @csrf
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="nama" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan Nama" required />
                                @error('nama')
                                <p class="mt-2 text-sm text-red-800">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div>
                                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                <input type="text" placeholder="Masukkan Jabatan" name="jabatan" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                @error('jabatan')
                                <p class="mt-2 text-sm text-red-800">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div>
                                <input class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" type="file" name="photo" id="photo">
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
        function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data komite ini akan dihapus secara permanen!",
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
