@extends("backend.layouts.main")

@section("css")
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@endsection

@section("title","Tkr")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard class="lowercase">{{ $tkr->judul }}</x-title-create-dashboard>
        <div class="w-full">
            <form id="form" action="{{ route('tkr.update',[Crypt::encrypt($tkr->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 gap-2 ">
                    <div class="mb-4 w-2/5">
                        <label for="penulis_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">penulis_id</label>
                        <input type="text" value="{{ Auth::user()->name}}" name="penulis_id" id="penulis_id"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               readOnly>
                        @error("penulis_id")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="w-11/12 gap-2 ">
                    <div class="mb-4 w-2/5">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">judul</label>
                        <input type="text" value="{{old("judul",$tkr->judul)}}" name="judul" id="judul"
                               class="mt-1 shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none"
                               >
                        @error("judul")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 w-11/12">
                    <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten</label>
                    <div id="editor" class="mt-1 block bg-white shadow-md w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none" style="height: 300px;">
                        {!! old('konten', $tkr->konten) !!}

                    </div>
                    <input type="hidden" name="konten" id="konten">
                    @error('konten')
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input class="mt-6 rounded-md bg-white shadow-md w-2/5" type="file" name="photo" id="photo">
                @error('photo')
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
                @enderror
                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:bg-yellow-500 focus:outline-none shadow-md transition-all duration-200">
                        Ubah Jurusan Tkr
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
                placeholder: 'Tulis konten di sini...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline','strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'align': [] }],
                        [{ 'font': [] }],
                        [{ 'header':[1,2,3,4,5,6,false] }],
                        [{ 'color': [] },{'background':[]}],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        ['blockquote', 'code-block']
                    ],

                }
            });

            const form = document.getElementById('form');
            form.addEventListener('submit', function() {
                document.querySelector('#konten').value = quill.root.innerHTML;
            });
        });

    </script>
@endsection
