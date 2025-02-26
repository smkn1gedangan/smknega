@extends("backend.layouts.main")

@section("css")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .swal-height {
               padding: 0.4rem;
           }
    </style>
@endsection

@section("title","Artikel")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard class="lowercase">edit artikel {{$article->title}}</x-title-create-dashboard>
        <div class="w-full">
            <form id="form" action="{{ route('artikel.update',[Crypt::encrypt($article->id)]) }}" class="mt-4 w-full flex flex-col items-center" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 flex flex-col gap-2 ">
                    <div class="mb-4 w-2/5">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" value="{{old("title",$article->title)}}" name="title" id="title"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               required placeholder="Masukkan Judul">
                        @error("title")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-4 w-2/5">
                        <label for="writer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                        <input type="text" name="writer_id" id="writer" value="{{ Auth::user()->name}}"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               readonly
                               >
                        @error("writer")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 w-11/12">
                    <label for="text_content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten Artikel</label>
                    <div id="editor" class="mt-1 shadow-md bg-white block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none" style="height: 300px;">
                        {!! old('text_content', $article->text_content) !!}
                    </div>
                    <input type="hidden" name="text_content" id="text_content">
                    @error('text_content')
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col w-11/12 gap-2 justify-center">
                    <p class="text-red-600 text-sm">jika itu adalah artikel murni , hilangkan kategori prestasi </p>
                    <ul class="w-48 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        @foreach ($kategoris as $kategori)
                        <li class="w-full bg-white border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                          <div class="flex items-center ps-3">
                              <input id="kategori_id" type="checkbox" name="kategori_id[]" value="{{$kategori->id}}"
                              @foreach ($article->kategoris as $articleKategori)
                                @if ($articleKategori->id === $kategori->id)
                                    checked
                                @endif
                                @endforeach
                               class="w-4 h-4 text-blue-600 bg-gray-100 ml-2 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                              <label for="kategori_id" class="w-full ml-5 py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$kategori->nama}}</label>
                          </div>
                      </li>
                        @endforeach
                      </ul>
                      @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                      <p class="mt-3">Photo saat ini : </p>
                      <img class="w-1/5  duration-700  rounded-md object-cover h-full" src="{{ asset("img/articles_images/" . $article->image) }}" alt="">
                      @else
                      <p class="mt-3">Photo saat ini : </p>
                      <div class="bg-gray-200 w-1/5 h-52 grid place-content-center">
                      <span>No Image</span> <!-- Pesan fallback -->
                      </div>
                      @endif
                    <input class="mt-6 rounded-md shadow-md w-2/5 bg-white" type="file" name="image" id="image">
                    @error('image')
                    <p class="mt-2 text-sm text-red-800">
                        {{ $message }}
                    </p>
                    @enderror
                   </div>
                <!-- Tombol Submit -->
                <div class="mt-4 mb-8 w-11/12">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition-all duration-200 shadow-md focus:bg-yellow-700 focus:outline-none">
                        Ubah Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section("js")
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Tulis konten profil di sini...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline','strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'align': [] }],
                        [{ 'font': [] }],
                        ['link'],
                        [{ 'header':[1,2,3,4,5,6,false] }],
                        [{ 'color': [] },{'background':[]}],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        ['blockquote', 'code-block']
                    ],

                }
            });

            // Set the hidden input value to the Quill editor's content on form submission
            const form = document.getElementById('form');
            form.addEventListener('submit', function() {
                document.querySelector('#text_content').value = quill.root.innerHTML;
            });
        });
    </script>
@endsection
