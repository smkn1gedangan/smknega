@extends("backend.layouts.main")

@section("title","Guru")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>Tambah Prestasi</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('prestasi.store') }}" class="mt-4 w-full flex flex-col items-center" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-11/12">
                    <div class="mb-4 w-2/5">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text"   autocomplete="off" name="nama" id="nama"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Nama">
                        @error("nama")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-4 w-2/5">
                        <label for="juara" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Juara</label>
                        <input type="text"  autocomplete="off" name="juara" id="juara"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan juara">
                        @error("juara")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4 w-2/5">
                        <label for="tingkat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
                        <input type="text"  autocomplete="off" name="tingkat" id="tingkat"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="masukkan tingkat">
                        @error("tingkat")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4 w-2/5">
                        <label for="penyelenggara" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penyelenggara</label>
                        <input type="text"  autocomplete="off" name="penyelenggara" id="penyelenggara "
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan penyelenggara">
                        @error("penyelenggara")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>





                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-700 focus:outline-none shadow-md transition-all duration-200">
                        Tambah Prestasi
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection

