@extends("backend.layouts.main")


@section("title","Edit")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit waka smkn 1 gedangan</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('waka.update',[Crypt::encrypt($waka->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 ">
                    <div class="mb-4 w-2/5">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" value="{{old("nama",$waka->nama)}}" name="nama" id="nama"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Nama">
                        @error("nama")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-4 w-2/5">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{old("jabatan",$waka->jabatan)}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("jabatan")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>


                <input class="mt-6 rounded-md" type="file" name="photo" id="photo">
                @error('photo')
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
                @enderror
                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
                        Ubah Data Waka
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