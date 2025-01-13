@extends("frontend.layouts.main")

@section("title","Jurusan Sija Smkn 1 Gedangan")

@section("content")

{{-- sija start --}}
<section class="w-full flex justify-center flex-wrap pt-20 md:pt-28">
    <div class="w-full lg:w-full p-2 flex flex-col items-center">

        @if (file_exists(public_path('img/jurusan/' . $sija->photo)) && $sija->photo)
                    <img src="{{ asset("img/jurusan/" . $sija->photo) }}" class="relative my-5 object-cover object-center rounded-md w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-auto"/>
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-64 md:h-96 my-5 grid place-content-center text-xs">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">{{ $sija->judul }}</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-2 sm:w-5/6 md:items-center md:p-8  lg:w-3/5">

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full">
                {!! $sija->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$sija->penulis->name}}  {{$sija->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- sija end --}}
@endsection
