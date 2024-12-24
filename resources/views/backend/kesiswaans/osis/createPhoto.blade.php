@extends("backend.layouts.main")



@section("title","Osis Sekolah")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard class="lowercase">Tambah data Osis</x-title-create-dashboard>
        <div class="w-full">
            <form id="form" action="{{ route('osisPhoto.store')}}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="mb-4 w-2/5">
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                    <input type="text" value="{{old("nama")}}" autocomplete="off" name="nama" id="nama"
                           class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                           required placeholder="Masukkan Nama">
                    @error("nama")
                    <p class="mt-2 text-sm text-red-800">
                        {{ $message }}
                    </p>
                    @enderror
                    </div>

                    <div class="mb-4 w-2/5">
                        <label for="jabatan" value="{{old("jabatan")}}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan</label>
                        <input type="text" autocomplete="off" name="jabatan" id="jabatan"
                            class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                            required placeholder="Masukkan jabatan">
                        @error("jabatan")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                <div class="mb-4 w-11/12">

                    <input class="mt-6 rounded-md bg-white shadow-md w-2/5" type="file" name="photo" id="photo">
                    @error('photo')
                    <p class="mt-2 text-sm text-red-800">
                        {{ $message }}
                    </p>
                @enderror
                </div>


                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg  hover:bg-blue-700 focus:bg-blue-700 focus:outline-none shadow-md transition-all duration-200">
                        tambah Photo
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
