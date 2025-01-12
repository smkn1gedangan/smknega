@extends("backend.layouts.main")

@section("title","Ketua Komite")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit ketua komite smkn 1 gedangan</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('ketuaKomite.update',[Crypt::encrypt($ketuaKomite->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 ">
                    <div class="mb-4 w-2/5">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" value="{{old("nama",$ketuaKomite->nama)}}" name="nama" id="nama"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Nama">
                        @error("nama")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-4 w-2/5">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{old("jabatan",$ketuaKomite->jabatan)}}"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("jabatan")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                @if (file_exists(public_path('img/komite/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                <p class="mt-3">Photo saat ini : </p>
                <img class="w-1/5  duration-700  rounded-md object-cover h-full" src="{{ asset("img/komite/" . $ketuaKomite->photo) }}" alt="">
                @else
                <p class="mt-3">Photo saat ini : </p>
                <div class="bg-gray-200 w-1/5 h-52 grid place-content-center">
                <span>No Image</span> <!-- Pesan fallback -->
                </div>
                @endif
                <input class="mt-6 rounded-md bg-white shadow-md  w-2/5" type="file" name="photo" id="photo">
                @error('photo')
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
                @enderror
                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:bg-yellow-500 shadow-md transition-all duration-200 focus:outline-none">
                        Ubah Ketua Komite
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section("js")
    <script>

    window.Laravel = {
        successMessage: @json(session('success')),
    };
    </script>
@endsection
