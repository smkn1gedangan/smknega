@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Tkr")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-semibold dark:text-white">Data {{ $tkr->judul }}</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400 lowercase">data {{ $tkr->judul }} Smkn 1 Gedangan</p>
            </div>

        </div>
        <div class="my-5 w-3/4 pl-10">

            @if (file_exists(public_path('img/jurusan/' . $tkr->photo)) && $tkr->photo)
                           <img src="{{ asset('img/jurusan/' . $tkr->photo) }}" class="object-cover w-full rounded-t-lg h-auto md:w-80 md:rounded-none md:rounded-s-lg" alt="{{ $tkr->photo }}">
           @else
                           <div class="w-full bg-gray-200 grid place-content-center h-64 md:w-4/5">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
           <div class="w-full flex gap-2">
                @if (file_exists(public_path('img/jurusan/' . $tkr->photo_kaprog)) && $tkr->photo_kaprog)
                <img src="{{ asset('img/jurusan/' . $tkr->photo_kaprog) }}" class="object-cover w-52 rounded-t-lg md:rounded-s-lg mt-8" alt="{{ $tkr->photo_kaprog }}">
                @else
                            <div class="w-52 mt-8 bg-gray-200 grid place-content-center h-64 ">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                @endif
                <div class="flex flex-col justify-center mx-4">
                    <h1 class="text-base font-semibold mt-6 text-gray-800 dark:text-gray-100 capitalize">{{$tkr->nama_kaprog}}</h1>
                    <p>sebagai</p>
                    <h1 class="text-base font-semibold mb-2 text-gray-800 dark:text-gray-100 capitalize">{{$tkr->ket_kaprog}}</h1>
                </div>
           </div>
           <h1 class="text-2xl mt-6 mb-2 text-gray-800 dark:text-gray-100">{{$tkr->nama}}</h1>

           <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$tkr->konten!!}</div>

        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('tkr.edit', [Crypt::encrypt($tkr->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-600 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Jurusan Tkr</a>
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
