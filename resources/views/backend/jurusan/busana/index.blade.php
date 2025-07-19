@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Jurusan Busana")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="{{ $busana->judul }}" quote="data jurusan busana di smkn 1 gedangan "></x-titlepage>
        <div class="w-full p-5">

            @if (file_exists(public_path('storage/' . $busana->photo)) && $busana->photo)
                           <img src="{{ asset('storage/' . $busana->photo) }}" class="object-cover object-center h-auto w-72">
           @else
                           <div class="bg-gray-200 h-40 w-80 grid place-content-center">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
             <div class="w-full flex gap-2">
                @if (file_exists(public_path('storage/' . $busana->photo_kaprog)) && $busana->photo_kaprog)
                <img src="{{ asset('storage/' . $busana->photo_kaprog) }}" class="object-cover w-52 rounded-t-lg md:rounded-s-lg mt-8" alt="{{ $busana->photo_kaprog }}">
                @else
                            <div class="w-52 mt-8 bg-gray-200 grid place-content-center h-64 ">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                @endif
                <div class="flex flex-col justify-center mx-4">
                    <h1 class="text-base font-semibold mt-6 text-gray-800 dark:text-gray-100 capitalize">{{$busana->nama_kaprog}}</h1>
                    <p>sebagai</p>
                    <h1 class="text-base font-semibold mb-2 text-gray-800 dark:text-gray-100 capitalize">{{$busana->ket_kaprog}}</h1>
                </div>
           </div>
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$busana->konten!!}</div>
        </div>

            <div class="items-center pb-6">

                <a href="{{ route('busana.edit', [Crypt::encrypt($busana->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Ubah Jurusan Busana</a>
            </div>
        </div>
@endsection

@section("js")
    <script>
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>

@endsection
