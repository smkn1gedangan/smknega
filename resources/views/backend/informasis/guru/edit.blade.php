@extends("backend.layouts.main")

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@endsection

@section("title","Guru")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit data guru Smkn 1 Gedangan</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('guru.update',[Crypt::encrypt($guru->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 ">
                    <div class="mb-4 w-2/5">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" value="{{old("nama",$guru->nama)}}" name="nama" id="nama"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Nama">
                        @error("nama")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-4 w-2/5">
                        <label for="tugas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tugas</label>
                        <input type="text" name="tugas" id="tugas" value="{{old("tugas",$guru->tugas)}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("tugas")
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
                        Ubah data Guru
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section("js")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil update data guru!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
    </script>
@endsection
