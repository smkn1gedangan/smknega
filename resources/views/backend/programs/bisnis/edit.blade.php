@extends("backend.layouts.main")

@section("css")
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section("title","Program Bisnis")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="data Program Bisnis" quote="ubah data Program Bisnis yang ada di smkn 1 gedangan " isRoute="true" nameRoute="Back" href="{{ route('bisnis.index') }}"></x-titlepage>
        <div class="w-full p-5">
            <form id="form" action="{{ route('bisnis.update',[Crypt::encrypt($bisnis->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="grid grid-cols-12 space-y-5">
                    <div class="col-span-10">
                    <x-input-label value="Konten"></x-input-label>
                    <div id="editor" class="mt-1 bg-white shadow-md  block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:border-blue-500 focus:outline-none" style="height: 300px;">
                        {!! old('konten', $bisnis->konten) !!}

                    </div>
                    <input type="hidden" name="konten" id="konten">
                    <x-input-error :messages="$errors->get('konten')" class="mt-2" />
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg shadow-md hover:bg-yellow-600  focus:bg-yellow-500 transition-all duration-200 focus:outline-none">
                        Ubah Data Bisnis
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

            const form = document.getElementById('form');
            form.addEventListener('submit', function() {
                document.querySelector('#konten').value = quill.root.innerHTML;
            });
        });

         window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>
@endsection
