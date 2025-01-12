@extends("backend.layouts.main")


@section("title","Galeri")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit galeri Smkn 1 Gedangan</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('galeri.update',[Crypt::encrypt($galeri->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 ">
                    <div class="mb-4 w-2/5">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" value="{{old("judul",$galeri->judul)}}" name="judul" id="judul"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Judul">
                        @error("judul")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>


                </div>
                @if (file_exists(public_path('img/galeri/' . $galeri->photo)) && $galeri->photo)
                <p class="mt-3">Photo saat ini : </p>
                <img class="w-1/5  duration-700  rounded-md object-cover h-full" src="{{ asset("img/galeri/" . $galeri->photo) }}" alt="">
                @else
                <p class="mt-3">Photo saat ini : </p>
                <div class="bg-gray-200 w-1/5 h-52 grid place-content-center">
                <span>No Image</span> <!-- Pesan fallback -->
                </div>
                @endif
                <input class="mt-6 rounded-md bg-white shadow-md w-2/5" type="file" name="photo" id="photo">
                @error('photo')
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
                @enderror
                <!-- Tombol Submit -->
                <div class="mt-4 mb-8 w-11/12">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 transition-all duration-200 rounded-lg shadow hover:bg-yellow-600 focus:bg-yellow-700 focus:outline-none">
                        Ubah Galeri
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
