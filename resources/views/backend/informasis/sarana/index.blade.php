@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Sarana Prasarana")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="data Sarana Prasarana" quote="data Sarana Prasarana smkn 1 gedangan "></x-titlepage>
        <div class="w-full p-5">
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$sarana->konten!!}</div>
        </div>

            <div class="items-center pb-6">

                <a href="{{ route('sarana.edit', [Crypt::encrypt($sarana->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Sarana Prasarana</a>
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
