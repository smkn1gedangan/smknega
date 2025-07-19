@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Sejarah")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="data sejarah" quote="data sejarah smkn 1 gedangan "></x-titlepage>
        <div class="w-full p-5">

            @if (file_exists(public_path('storage/' . $sejarah->photo)) && $sejarah->photo)
                           <img src="{{ asset('storage/' . $sejarah->photo) }}" class="object-cover object-center h-auto md:w-72">
           @else
                           <div class="w-full bg-gray-200 h-40 md:w-80">
                               <span>No Image</span> <!-- Pesan fallback -->
                           </div>
           @endif

            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$sejarah->konten!!}</div>
        </div>

            <div class="items-center pb-6">

                <a href="{{ route('sejarah.edit', [Crypt::encrypt($sejarah->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Sejarah</a>
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
