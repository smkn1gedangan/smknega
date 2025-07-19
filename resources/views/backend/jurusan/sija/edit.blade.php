@extends("backend.layouts.main")

@section("css")
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


@endsection

@section("title","Sija")

@section("content")
    <div id="main" class="main-content flex-1">
       <x-titlepage title="data jurusan sija" quote="ubah data jurusan sija di smkn 1 gedangan " isRoute="true" nameRoute="Kembali" href="{{ route('sija.index') }}"></x-titlepage>
        <div class="w-full p-5">
            <form id="form" action="{{ route('sija.update',[Crypt::encrypt($sija->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    <div class="grid grid-cols-12 space-y-5 gap-2">
                        <div class="col-span-7 ">
                            <div>
                                <x-input-label value="Nama Jurusan"></x-input-label>
                                <x-text-input type="text" id="judul" class="block mt-1 w-full" name="judul" :value="old('judul',$sija->judul)" required  />
                                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-7">
                            <div>
                                <x-input-label value="Nama Kaprog"></x-input-label>
                                <x-text-input type="text" id="nama_kaprog" class="block mt-1 w-full" name="nama_kaprog" :value="old('nama_kaprog',$sija->nama_kaprog)" required  />
                                <x-input-error :messages="$errors->get('nama_kaprog')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-7">
                            <div>
                                <x-input-label value="Kompetensi"></x-input-label>
                                <x-text-input type="text" id="ket_kaprog" class="block mt-1 w-full" name="ket_kaprog" :value="old('ket_kaprog',$sija->ket_kaprog)" required  />
                                <x-input-error :messages="$errors->get('ket_kaprog')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-7">
                            <div>
                                <x-input-label value="Photo Kaprog"></x-input-label>
                                <x-text-input type="file" id="photo_kaprog" class="block border border-black mt-1 w-full" name="photo_kaprog" :value="old('photo_kaprog',$sija->photo_kaprog)"  />
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                @if (file_exists(public_path('storage/' . $sija->photo_kaprog)) && $sija->photo_kaprog)
                                <p class="mt-3">photo kaprog saat ini : </p>
                                <img class="w-72 h-auto" src="{{ asset("storage/" . $sija->photo_kaprog) }}" alt="">
                                @else
                                <p class="mt-3">photo kaprog saat ini : </p>
                                <div class="bg-gray-200 w-44 h-52 grid place-content-center">
                                <span>No Image</span> <!-- Pesan fallback -->
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-span-10">
                                <x-input-label value="Konten"></x-input-label>
                                <div id="editor" class="mt-1 bg-white shadow-md block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none" style="height: 300px;">
                                    {!! old('konten', $sija->konten) !!}

                                </div>
                                <input type="hidden" name="konten" id="konten">
                            <x-input-error :messages="$errors->get('konten')" class="mt-2" />
                        </div>
                         <div class="col-span-7">
                            <div>
                                <x-input-label value="Photo Jurusan"></x-input-label>
                                <x-text-input type="file" id="photo" class="block mt-1 w-full border border-black" name="photo" :value="old('photo',$sija->photo)"/>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                @if (file_exists(public_path('storage/' . $sija->photo)) && $sija->photo)
                                <p class="mt-3">photo Jurusan: </p>
                                <img class="w-72 h-auto" src="{{ asset("storage/" . $sija->photo) }}" alt="">
                                @else
                                <p class="mt-3">photo Jurusan: </p>
                                <div class="bg-gray-200 w-44 h-52 grid place-content-center">
                                <span>No Image</span> <!-- Pesan fallback -->
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:bg-yellow-500 shadow-md transition-all duration-200 focus:outline-none">
                        Ubah Jurusan Sija
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

    </script>
@endsection
