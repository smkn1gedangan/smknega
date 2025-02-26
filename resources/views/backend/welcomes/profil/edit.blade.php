@extends("backend.layouts.main")

@section("css")

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section("title", "Profil")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit profil smkn 1 gedangan</x-title-create-dashboard>
        <div class="w-full">
            <form id="form" action="{{ route('profil.update', [Crypt::encrypt($profil->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">

                @csrf
                @method("PUT")

                <div class="mb-4 w-11/12">
                    <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten Profil</label>
                    <div id="editor" class="mt-1 block w-full px-3 py-2 border bg-gray-100 border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none" style="height: 300px;">
                        {!! old('konten', $profil->konten) !!}

                    </div>
                    <input type="hidden" name="konten" id="konten">
                    @error('konten')
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                 @if (file_exists(public_path('img/welcome/' . $profil->photo)) && $profil->photo)
                    <p class="mt-3">Photo saat ini : </p>
                    <img class="w-60 rounded-md object-cover h-full" src="{{ asset("img/welcome/" . $profil->photo) }}" alt="">
                    @else
                    <p class="mt-3">Photo saat ini : </p>
                    <div class="bg-gray-200 my-2 w-60 h-52 grid place-content-center">
                    <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                    @endif
                <x-text-input id="photo" class="block mt-1 bg-white w-2/5"
                type="file"
                name="photo"
                autocomplete="current-photo" />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                <!-- Tombol Submit -->
                <div class="mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg shadow-lg hover:bg-yellow-600 transition-all duration-150 focus:bg-yellow-700 focus:outline-none">
                        Ubah Data Profil
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
