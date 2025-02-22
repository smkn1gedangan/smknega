@extends("backend.layouts.main")

@section("title","Prestasi")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit data prestasi siswa</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('prestasi.update',[Crypt::encrypt($prestasi->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 ">
                    <div class="mb-4 w-2/5">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" value="{{old("nama",$prestasi->nama)}}" name="nama" id="nama"
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
                        <input type="number" name="juara" id="juara" value="{{old("juara",$prestasi->juara)}}"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("juara")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4 w-2/5">
                        <div>
                            <label for="tingkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
                            <select id="tingkat" name="tingkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($prestasi->tingkat )

                                @endif
                                <option value="Antar Sekolah" {{$prestasi->tingkat == "Antar Sekolah" ? 'selected' :''}}>Antar Sekolah</option>
                                <option value="Kabupaten" {{$prestasi->tingkat == "Kabupaten" ? 'selected' :''}}>Kabupaten</option>
                                <option value="Provinsi" {{$prestasi->tingkat == "Provinsi" ? 'selected' :''}}>Provinsi</option>
                                <option value="Nasional" {{$prestasi->tingkat == "Nasional" ? 'selected' :''}}>Nasional</option>
                            </select>
                            @error('tingkat')
                            <p class="mt-2 text-sm text-red-800">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 w-2/5">
                        <label for="penyelenggara" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penyelenggara</label>
                        <input type="text" name="penyelenggara" id="penyelenggara" value="{{old("penyelenggara",$prestasi->penyelenggara)}}"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("penyelenggara")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>



                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:bg-yellow-500 shadow-md transition-all duration-200 focus:outline-none">
                        Ubah Prestasi Siswa
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
