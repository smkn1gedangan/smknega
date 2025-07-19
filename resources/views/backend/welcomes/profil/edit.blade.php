@extends("backend.layouts.main")

@section("css")

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section("title", "Profil")

@section("content")
    <div id="main" class="main-content flex-1">
        <x-titlepage quote="ubah profil smkn 1 gedangan" title="Data Profil"></x-titlepage>
        <div class="w-full p-5">
            <form id="form" action="{{ route('profil.update', [Crypt::encrypt($profil->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-4 w-full">
                    <x-input-label value="Konten"></x-input-label>
                    <div id="editor" class="mt-1 block w-full px-3 py-2 border  border-gray-300 rounded-md text-gray-700  focus:border-blue-500 focus:outline-none" style="height: 300px;">
                        {!! old('konten', $profil->konten) !!}
                    </div>
                    <input type="hidden" name="konten" id="konten">
                    @error('konten')
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                 @if (file_exists(public_path('storage/' . $profil->photo)) && $profil->photo)
                    <p class="mt-3">Photo saat ini : </p>
                    <img class="w-60 rounded-md object-cover h-full" src="{{ asset("storage/" . $profil->photo) }}" alt="">
                    @else
                    <p class="mt-3">Photo saat ini : </p>
                    <div class="bg-gray-200 my-2 w-60 h-52 grid place-content-center">
                    <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                    @endif

                <x-text-input id="photo" class="block mt-4 border border-black w-2/5"
                type="file"
                name="photo" />
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
