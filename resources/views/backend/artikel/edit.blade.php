@extends("backend.layouts.main")

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section("title","Artikel")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit Artikel {{$article->title}}</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('artikel.update',[Crypt::encrypt($article->id)]) }}" class="mt-4 w-full flex flex-col items-center" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <!-- Judul -->
                <div class="w-full flex justify-evenly gap-2 ">
                    <div class="mb-4 w-2/5">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" value="{{old("title",$article->title)}}" name="title" id="title"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Judul">
                        @error("title")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Penulis -->
                    <div class="mb-4 w-2/5">
                        <label for="writer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                        <input type="text" name="writer_id" id="writer" value="{{ Auth::user()->name}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               readonly
                               >
                        @error("writer")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Konten -->
                <div class="mb-4 w-11/12">
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten Artikel</label>
                    <textarea style="resize: none;overflow: hidden;" id="summernote" name="text_content"

                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                              rows="6">{{old("text_content",$article->text_content)}}
                    </textarea>
                    @error('text_content')
                    <p class="mt-2 text-sm text-red-800">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <input class="mt-6" type="file" name="image" id="image">
                @error('image')
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
                @enderror
                <!-- Tombol Submit -->
                <div class="mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
                        Ubah data
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Tulis konten artikel di sini...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil update artikel!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
    </script>
@endsection
