@extends("frontend.layouts.main")

@section("title","Jurusan Dkv Smkn 1 Gedangan")

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

{{-- dkv start --}}
<section class="w-full flex justify-center flex-wrap pt-20 md:pt-28">
    <div class="w-full lg:w-full p-2 flex flex-col items-center">

        @if (file_exists(public_path('img/jurusan/' . $dkv->photo)) && $dkv->photo)
                    <div class="img-fixed my-5 rounded-md w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 min-h-64 md:min-h-96 md:h-auto"
                        style="background-image: url('{{ asset("img/jurusan/" . $dkv->photo) }}');">
                    </div>
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-64 md:h-96 my-5 grid place-content-center text-xs">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">{{ $dkv->judul }}</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-2 sm:w-5/6 md:items-center md:p-8  lg:w-3/5">

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="lg:first-letter:pl-16 mb-3 text-sm md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $dkv->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$dkv->penulis->name}}  {{$dkv->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- dkv end --}}
@endsection
