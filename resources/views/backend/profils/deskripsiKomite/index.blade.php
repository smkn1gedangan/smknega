@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Deskripsi Komite")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-semibold dark:text-white">Deskripsi Komite</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">deskripsi komite smkn 1 gedangan</p>
            </div>

        </div>
        <div class="my-5 w-3/4 pl-10">
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$deskripsiKomite->konten!!}</div>
        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('deskripsiKomite.edit', [Crypt::encrypt($deskripsiKomite->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-500 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Deskripsi Komite</a>
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
