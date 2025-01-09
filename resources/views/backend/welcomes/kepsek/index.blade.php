@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Kepala sekolah")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-semibold dark:text-white">Data Kepala Sekolah</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">data kepala sekolah smkn 1 gedangan</p>
            </div>

        </div>
        <div class="my-5 w-3/4 pl-10">

            @if (file_exists(public_path('img/kepala_sekolah/' . $kepsek->photo)) && $kepsek->photo)
                           <img src="{{ asset('img/kepala_sekolah/' . $kepsek->photo) }}" class="object-cover w-full rounded-t-lg h-auto md:w-2/5 md:rounded-none md:rounded-s-lg" alt="{{ $kepsek->photo }}">
           @else
                           <div class="w-full bg-gray-200 grid place-content-center h-64 md:w-4/5">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
           <h1 class="text-2xl mt-6 mb-2 text-gray-800 dark:text-gray-100">{{$kepsek->nama}}</h1>

            <blockquote class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">
                <svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                </svg>
                <p class="">{!!$kepsek->sambutan!!}</p>
            </blockquote>

        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('kepsek.edit', [Crypt::encrypt($kepsek->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 transition-all duration-300 ml-4 text-white py-2.5 px-4 rounded-md">Edit Kepala Sekolah</a>
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
