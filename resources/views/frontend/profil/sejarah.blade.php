@extends("frontend.layouts.main")

@section("title","Sejarah Smkn 1 Gedangan")

@section("content")
{{-- sejarah start --}}
<section class="w-full flex md:justify-center flex-wrap pt-20 md:pt-28 ">
    <div class="flex flex-col w-full sm:w-5/6  md:w-4/5 md:items-center lg:w-3/5 p-2">
        <x-heading-profil class="w-full">sejarah</x-heading-profil>
        @if (file_exists(public_path('img/profil/' . $sejarah->photo)) && $sejarah->photo)
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="w-11/12 my-5  sm:w-5/6 h-52 sm:h-64 lg:h-auto overflow-hidden">
                        <img class="w-full hover:scale-110 transition-all duration-700  rounded-md object-cover" src="{{ asset("img/profil/" . $sejarah->photo) }}" alt="">
                    </div>
                    
                    @else
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="bg-gray-200 w-11/12 sm:w-5/6 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="mb-3 text-sm md:text-base font-normal text-gray-800 dark:text-gray-400 mt-6 lg:first-letter:pl-16">
                {!! $sejarah->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="mb-3 w-full text-xs md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-3">ditulis oleh {{$sejarah->penulis->name}}  {{$sejarah->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">
        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- sejarah end --}}
@endsection
