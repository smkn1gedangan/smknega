@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Kepala sekolah")

@section("content")
    <div id="main" class="main-content flex-1">
        <x-titlepage title="Kepala Sekolah" quote="data kepala sekolah smkn 1 gedangan"></x-titlepage>
        <div class="w-full p-5">

            @if (file_exists(public_path('storage/' . $kepsek->photo)) && $kepsek->photo)
                           <img src="{{ asset('storage/' . $kepsek->photo) }}" class="object-cover rounded-t-lg h-auto md:w-72 md:rounded-none md:rounded-s-lg" alt="{{ $kepsek->photo }}">
           @else
                           <div class="bg-gray-200 grid place-content-center h-52 md:w-72">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
           <h1 class="text-2xl mt-6 mb-2 ">{{$kepsek->nama}}</h1>

            <blockquote class="prose mb-3 mt-6">
                <p class="">{!!$kepsek->sambutan!!}</p>
            </blockquote>

        </div>
        <div class="items-center pb-6">

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
