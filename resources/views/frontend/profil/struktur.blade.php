@extends("frontend.layouts.main")

@section("title","Struktur Organisasi Smkn 1 Gedangan")

@section("content")

{{-- struktur start --}}
<section class="w-full flex md:justify-center flex-wrap pt-32">
    <div class="md:w-full p-2 flex flex-col items-center">
        
        @if (file_exists(public_path('img/profil/' . $struktur->photo)) && $struktur->photo)
                <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-52 sm:h-64 md:h-auto rounded-md object-cover my-5 md:min-h-96" src="{{ asset("img/profil/" . $struktur->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">struktur organisasi sekolah</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-4 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">
       
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="lg:first-letter:pl-16 mb-3 text-sm md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $struktur->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-3">ditulis oleh {{$struktur->penulis->name}}  {{$struktur->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- struktur end --}}
@endsection
