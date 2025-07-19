@extends("backend.layouts.main")

@section("css")
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@endsection

@section("title","Kepala sekolah")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="Kepala Sekolah" quote="ubah data kepala sekolah smkn 1 gedangan"></x-titlepage>
        <div class="w-full p-5">
            <form id="form" action="{{ route('kepsek.update',[Crypt::encrypt($kepsek->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-full space-y-4 grid grid-cols-12">
                    <div class="mb-4 col-span-6">
                                <x-input-label value="Nama"></x-input-label>
                                <x-text-input type="text" id="nama" class="block mt-1 w-full" name="nama" :value="old('nama',$kepsek->nama)" required  />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>
                    <div class="col-span-10">
                    <x-input-label value="Sambutan"></x-input-label>
                    <div id="editor" class="mt-1 bg-white shadow-md  block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 focus:border-blue-500 focus:outline-none" style="height: 300px;">
                        {!! old('sambutan', $kepsek->sambutan) !!}

                    </div>
                    <input type="hidden" name="sambutan" id="sambutan">
                     <x-input-error :messages="$errors->get('sambutan')" class="mt-2" />
                </div>
                <div class="mb-4 col-span-8">
                    <x-input-label value="Photo"></x-input-label>
                    <x-text-input type="file" id="photo" class="block mt-1 w-full border border-black" name="photo" :value="old('photo',$kepsek->photo)"  />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                @if (file_exists(public_path('storage/' . $kepsek->photo)) && $kepsek->photo)
                <p class="mt-3">Photo saat ini : </p>
                <img class="w-40  duration-700  rounded-md object-cover h-auto" src="{{ asset("storage/" . $kepsek->photo) }}" alt="">
                @else
                <p class="mt-3">Photo saat ini : </p>
                <div class="bg-gray-200 w-40 h-52 grid place-content-center">
                <span>No Image</span> <!-- Pesan fallback -->
                </div>
                @endif
                </div>
               
                </div>
                
                <!-- Tombol Submit -->
                <div class="col-span-6 mt-6 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg shadow-md hover:bg-yellow-600 focus:bg-yellow-500 transition-all duration-300 focus:outline-none">
                        Ubah Kepala Sekolah
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
                placeholder: 'Tulis sambutan di sini...',
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
                document.querySelector('#sambutan').value = quill.root.innerHTML;
            });
        });

    </script>
@endsection
