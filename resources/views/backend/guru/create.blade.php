@extends("backend.layouts.main")

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section("title","Guru")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>Tambah Data guru</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('guru.store') }}" class="mt-4 w-full flex flex-col items-center" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Judul -->
                <div class="w-full flex justify-evenly gap-2 ">
                    <div class="mb-4 w-2/5">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" value="{{old("nama")}}" autocomplete="off" name="nama" id="nama"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Nama">
                        @error("nama")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Penulis -->
                    <div class="mb-4 w-2/5">
                        <label for="tugas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tugas</label>
                        <input type="text" autocomplete="off" value="{{old("tugas")}}" name="tugas" id="tugas"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan tugas guru">
                        @error("tugas")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>



                <!-- Konten -->
                
               <div class="flex items-center w-full gap-2 justify-center">
               
                <input class="mt-6" type="file" name="photo" id="photo">
                @error('photo')
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
                @enderror
               </div>
                <!-- Tombol Submit -->
                <div class="mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
                        Tambah Data Guru
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section("js")
    <script>
      
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Menambah artikel!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
    </script>
@endsection
