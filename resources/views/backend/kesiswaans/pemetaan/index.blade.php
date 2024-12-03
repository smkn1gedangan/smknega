@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","pemetaan Kelulusan")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-bold dark:text-white">Data Pemetaan Kelulusan</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400 lowercase">data pemetaan kelulusan Smkn 1 Gedangan</p>
            </div>

        </div>
        <div class="my-5 w-3/4 pl-10">

            @if (file_exists(public_path('img/pemetaan/' . $pemetaan->photo)) && $pemetaan->photo)
                           <img src="{{ asset('img/pemetaan/' . $pemetaan->photo) }}" class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-auto md:rounded-none md:rounded-s-lg" alt="{{ $pemetaan->photo }}">
           @else
                           <div class="w-full bg-gray-200 h-52 md:w-52">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif
           <h1 class="text-2xl mt-6 mb-2 text-gray-800 dark:text-gray-100">{{$pemetaan->nama}}</h1>

            <blockquote class="text-sm italic text-gray-900 dark:text-white">
                <p>{!!$pemetaan->konten!!}</p>
            </blockquote>

        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('pemetaan.edit', [Crypt::encrypt($pemetaan->id)]) }}" class="bg-yellow-600 hover:bg-orange-400 dark:text-blue-400 ml-4 text-white py-2.5 px-4 rounded-md">Edit Data Pemetaan Kelulusan</a>
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
