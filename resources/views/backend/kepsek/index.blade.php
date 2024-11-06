@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Kepala sekolah")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-bold dark:text-white">Data Kepala sekolah</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">data kepala Sekolah Smkn 1 Gedangan</p>
            </div>

        </div>
        <div class="my-5 w-3/4 pl-10">

            @if (file_exists(public_path('img/kepala_sekolah/' . $kepsek->photo)) && $kepsek->photo)
                           <img src="{{ asset('img/kepala_sekolah/' . $kepsek->photo) }}" class="object-cover w-full rounded-t-lg h-40 md:h-52 md:w-52 md:rounded-none md:rounded-s-lg" alt="{{ $kepsek->photo }}">
           @else
                           <div class="w-full bg-gray-200 h-52 md:w-52">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
           <h1 class="text-2xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">{{$kepsek->nama}}

            <p class="mb-3 font-normal text-gray-900 dark:text-gray-400 text-sm mt-6">{{$kepsek->sambutan}}</p>
        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('kepsek.edit', [Crypt::encrypt($kepsek->id)]) }}" class="bg-yellow-600 hover:bg-orange-400 dark:text-blue-400 ml-4 text-white py-2.5 px-4 rounded-md">Edit data kepala sekolah</a>
            </div>
        </div>
@endsection

@section("js")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
