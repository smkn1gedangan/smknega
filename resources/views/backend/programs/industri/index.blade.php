@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Hubungan Industri")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="Hubungan Industri" quote="data Hubungan Industri di smkn 1 gedangan "></x-titlepage>
        <div class="w-full p-5">
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$industri->konten!!}</div>
        </div>

            <div class="items-center pb-6">

                <a href="{{ route('industri.edit', [Crypt::encrypt($industri->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200 capitalize">Edit Hubungan Industri</a>
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
