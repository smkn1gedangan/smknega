@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Beasiswa")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="beasiswa sekolah" quote="data beasiswa di smkn 1 gedangan "></x-titlepage>
        <div class="w-full p-5">
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$beasiswa->konten!!}</div>
        </div>

            <div class="items-center pb-6">

                <a href="{{ route('beasiswa.edit', [Crypt::encrypt($beasiswa->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200 capitalize">Edit Beasiswa</a>
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
