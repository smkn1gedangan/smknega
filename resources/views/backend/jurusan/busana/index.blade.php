@extends("backend.layouts.main")

@section("title","busana")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-semibold dark:text-white">Data {{ $busana->judul }}</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400 lowercase">data {{ $busana->judul }} Smkn 1 Gedangan</p>
            </div>

        </div>
        <div class="my-5 w-3/4 pl-10">

            @if (file_exists(public_path('img/jurusan/' . $busana->photo)) && $busana->photo)
                           <img src="{{ asset('img/jurusan/' . $busana->photo) }}" class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-auto md:rounded-none md:rounded-s-lg" alt="{{ $busana->photo }}">
           @else
                           <div class="w-full bg-gray-200 h-64 grid place-content-center md:w-4/5">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
           <h1 class="text-2xl mt-6 mb-2 text-gray-800 dark:text-gray-100">{{$busana->nama}}</h1>

           <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$busana->konten!!}</div>

        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('busana.edit', [Crypt::encrypt($busana->id)]) }}" class="bg-yellow-600 hover:bg-orange-400 dark:text-blue-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Data Tata Busana</a>
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
