@extends("backend.layouts.main")


@section("title","Komite")

@section("content")
    <div id="main" class="main-content relative flex-1">
        <x-titlepage title="Komite komite" quote="seluruh komite smkn 1 gedangan" isRoute="true" nameRoute="Tambah Komite" href="{{ route('komite.create') }}"></x-titlepage>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center p-5">
            <x-heading-welcome classAdventage="md:my-6">Ketua Komite</x-heading-welcome>
            {{-- ketua komite --}}
            <table class="w-full text-sm text-left ">
                <thead class="text-xs uppercase bg-black text-white">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">No.</th>
                        <th scope="col" class="px-6 text-center py-3">Nama</th>
                        <th scope="col" class="px-6 text-center py-3">Jabatan</th>
                        <th scope="col" class="px-6 text-center py-3">Photo</th>
                        <th scope="col" class="px-6 text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 text-center py-4 ">1</td>
                        <td class="px-6 text-center py-4">{{ Str::words($ketuaKomite->nama, 3, '...') }}</td>
                        <td class="px-6 text-center py-4">{{ $ketuaKomite->jabatan }}</td>
                        <td class="px-6 text-center py-4">
                            <div class="flex justify-center">
                                @if (file_exists(public_path('storage/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                                <img class="w-10 rounded-md object-cover h-10" src="{{ asset("storage/" . $ketuaKomite->photo) }}" alt="">
                                @else
                                <div class="bg-gray-200 w-10 h-10 grid place-content-center">
                                    </div>
                                    @endif
                            </div>
                        </td>
                        <td class="px-6 text-center flex gap-2 py-4 justify-center">
                            <div data-modal-target="u-kk" data-modal-toggle="u-kk" class="text-yellow-500 hover:text-yellow-600 dark:text-yellow-400 ml-4 cursor-pointer">Edit</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <x-heading-welcome classAdventage="md:my-6">Komite - Komite</x-heading-welcome>
            <table class="w-full text-sm text-left ">
                <thead class="text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">No.</th>
                        <th scope="col" class="px-6 text-center py-3">Nama</th>
                        <th scope="col" class="px-6 text-center py-3">Jabatan</th>
                        <th scope="col" class="px-6 text-center py-3">Photo</th>
                        <th scope="col" class="px-6 text-center py-3 ">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komites as $komite)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 text-center py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 text-center py-4">{{ Str::words($komite->nama, 3, '...') }}</td>
                            <td class="px-6 text-center py-4">{{ $komite->jabatan }}</td>
                            <td class="px-6 text-center py-4">
                                <div class="flex justify-center">
                                    @if (file_exists(public_path('storage/' . $komite->photo)) && $komite->photo)
                                    <img class="w-10  duration-700  object-cover h-10" src="{{ asset("storage/" . $komite->photo) }}" alt="">
                                    @else
                                    <div class="bg-gray-200 w-10 h-10 grid place-content-center">
                                        </div>
                                        @endif
                                </div>
                            </td>
                            <td class="px-6 text-center flex gap-2 py-4 justify-evenly">
                                <a href="{{ route('komite.edit', [Crypt::encrypt($komite->id)]) }}" class="text-yellow-500 hover:text-yellow-600 dark:text-yellow-400 ml-4 transition-all duration-200">Edit</a>
                                <form id="delete-form-{{ $komite->id }}" action="{{ route('komite.destroy', [Crypt::encrypt($komite->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $komite->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" pb-4">{{ $komites->links() }}</div>
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
                            <div class="grid grid-cols-12 space-y-4">
                                <div class="col-span-10">
                                    <x-input-label value="Nama"></x-input-label>
                                    <x-text-input type="text" id="nama" class="block mt-1 w-full" name="nama" :value="old('nama',$ketuaKomite->nama)" required  />
                                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                </div>
                                <div class="col-span-10">
                                    <x-input-label value="Jabatan"></x-input-label>
                                    <x-text-input type="text" id="jabatan" class="block mt-1 w-full" name="jabatan" :value="old('jabatan',$ketuaKomite->jabatan)" required  />
                                    <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                                </div>
                                <div class="mb-4 col-span-10">
                                    <x-input-label value="Photo"></x-input-label>
                                    <x-text-input type="file" id="photo" class="block mt-1 w-full border border-black" name="photo" :value="old('photo',$ketuaKomite->photo)"  />
                                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                    @if (file_exists(public_path('storage/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                                        <p class="mt-3">Photo saat ini : </p>
                                        <img class="w-20 duration-700  rounded-md object-cover h-auto" src="{{ asset("storage/" . $ketuaKomite->photo) }}" alt="">
                                    @else
                                        <p class="mt-3">Photo saat ini : </p>
                                        <div class="bg-gray-200 w-20 h-14 grid place-content-center text-xs">
                                            <span>No Image</span> <!-- Pesan fallback -->
                                        </div>
                                    @endif
                                </div>
                            </div>
                    
                            <button type="submit" class="w-full text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Ubah</button>

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
