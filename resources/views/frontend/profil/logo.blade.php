@extends("frontend.layouts.main")

@section("title","Logo Smkn 1 Gedangan")

@section("content")

{{-- logo start --}}
<section class="w-full flex md:justify-center flex-wrap pt-20 md:pt-28">
    <div class="relative flex flex-col w-full p-2 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">
        <x-heading-profil class="w-full">logo sekolah</x-heading-profil>
        @if (file_exists(public_path('img/profil/' . $logo->photo)) && $logo->photo)
                <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-11/12 sm:w-5/6 lg:w-1/2 h-auto sm:h-64 lg:h-auto rounded-md object-cover my-5" src="{{ asset("img/profil/" . $logo->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full ">
                {!! $logo->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left md:text-center font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$logo->penulis->name}}  {{$logo->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- logo end --}}
@endsection
