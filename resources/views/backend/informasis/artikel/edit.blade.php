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
            <form id="form" action="{{ route('artikel.update', Crypt::encrypt($article->id)) }}" class="mt-4 w-full flex flex-col items-center" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-full grid grid-cols-12 space-y-4 p-5">
                    <div class="col-span-6 space-y-4">
                         <div>
                                <x-input-label value="Judul"></x-input-label>
                                <x-text-input type="text" id="title" :value="old('title',$article->title)" class="block mt-1 w-full" name="title" required  />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
               
                <div class="col-span-10">
                    <x-input-label value="Konten"></x-input-label>
                    <div id="editor" class="mt-1 shadow-md bg-white block w-full px-3 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none" style="height: 300px;">
                         {!! old('text_content', $article->text_content) !!}
                    </div>
                    <input type="hidden" name="text_content" id="text_content">
                    @error('text_content')
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="col-span-12">
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
                     
                   </div>
                
                <div class="col-span-8">
                   
                    <x-input-label value="Photo"></x-input-label>
                        <x-text-input type="file" name="image" id="image" class="block mt-1 w-full border border-black" name="image"   />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                      @if (file_exists(public_path('storage/' . $article->image)) && $article->image)
                      <p class="mt-3">Photo saat ini : </p>
                      <img class="w-40  duration-700  rounded-md object-cover h-auto" src="{{ asset("storage/" . $article->image) }}" alt="">
                      @else
                      <p class="mt-3">Photo saat ini : </p>
                      <div class="bg-gray-200 w-40 h-52 grid place-content-center">
                      <span>No Image</span> <!-- Pesan fallback -->
                      </div>
                      @endif

                </div>
                <!-- Tombol Submit -->
                <div class="col-span-6">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-600 rounded-lg shadow hover:bg-yellow-700 focus:bg-yellow-700 focus:outline-none">
                        Ubah Artikel
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
