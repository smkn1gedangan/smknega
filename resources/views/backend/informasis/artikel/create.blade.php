@extends("backend.layouts.main")

@section("css")
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .swal-height {
               padding: 0.4rem;
           }
    </style>
@endsection

@section("title","Artikel")

@section("content")
    <div id="main" class="main-content flex-1">
        <x-titlepage
            title="Data Artikel"
            quote="buat data artikel smkn 1 gedangan"
            :isRoute="true"
            nameRoute="Lihat Artikel"
            href="{{ route('artikel.index') }}"
        />
        <div class="w-full">
            <form id="form" action="{{ route('artikel.store') }}" class="mt-4 w-full flex flex-col items-center" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full grid grid-cols-12 space-y-4 p-5">
                    <div class="col-span-6 space-y-4">
                         <div>
                                <x-input-label value="Judul"></x-input-label>
                                <x-text-input type="text" id="title" class="block mt-1 w-full" name="title" required  />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
               
                <div class="col-span-10">
                     <x-input-label value="Konten"></x-input-label>
                    <div id="editor" class="mt-1 shadow-md bg-white block w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none" style="height: 300px;">
                    </div>
                    <input type="hidden" name="text_content" id="text_content">
                    @error('text_content')
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
               <div class="col-span-8 my-4">
                <p class="text-red-600 text-sm">jika itu adalah artikel murni , hilangkan kategori prestasi </p>
                <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($kategoris as $kategori)
                    <li class="w-full bg-white border-b border-gray-300 rounded-t-lg dark:border-gray-600">
                      <div class="flex items-center ps-3">
                          <input id="kategori_id" type="checkbox" name="kategori_id[]" value="{{$kategori->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 ml-2 border-gray-500 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                          <label for="kategori_id" class="w-full ml-5 py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$kategori->nama}}</label>
                      </div>
                  </li>
                    @endforeach
                  </ul>
                   
               </div>
                <div class="col-span-8">
                    <x-input-label value="Photo"></x-input-label>
                        <x-text-input type="file" name="image" id="image" class="block mt-1 w-full border border-black" name="image" required  />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <!-- Tombol Submit -->
                <div class="col-span-6">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
                        Tambah Artikel
                    </button>
                </div>
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
                placeholder: 'Tulis konten artikel di sini...',
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
