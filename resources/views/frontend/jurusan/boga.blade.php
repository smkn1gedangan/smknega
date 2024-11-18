@extends("frontend.layouts.main")

@section("title","Jurusan boga Smkn 1 Gedangan")

@section("css")
    <style>
         .img-fixed {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section("content")

{{-- boga start --}}
<section class="w-full flex justify-center flex-wrap pt-32">
    <div class="w-full lg:w-full p-2 flex flex-col items-center">

        @if (file_exists(public_path('img/jurusan/' . $boga->photo)) && $boga->photo)
                    <div class="img-fixed my-5 rounded-md w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 min-h-64 md:min-h-96"
                        style="background-image: url('{{ asset("img/jurusan/" . $boga->photo) }}');">
                    </div>
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-96 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">{{ $boga->judul }}</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-4 sm:w-5/6 md:items-center md:p-8  lg:w-3/5">

            <p class="lg:first-letter:pl-16 mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $boga->konten !!}
            </p>
            <p class="mb-3 w-full text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$boga->penulis->name}}  {{$boga->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- boga end --}}
@endsection
