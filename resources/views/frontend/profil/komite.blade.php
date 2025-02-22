@extends("frontend.layouts.main")

@section("title","Komite Smkn 1 Gedangan")

@section("css")
<style>
    .bgMorpish{
        backdrop-filter: blur(9px);
    }
    .tx-sh{
        text-shadow: 2px 2px 5px black;
    }
</style>
@endsection

@section("content")

{{-- Komite start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3 lg:w-2/3">komite</x-heading-profil>
       </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-2 md:items-center md:p-8 lg:w-5/6">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full  ">
                {!! $deskripsiKomite->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left md:text-center font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$deskripsiKomite->penulis->name}}  {{$deskripsiKomite->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full p-2 flex flex-col items-center">
        <x-heading-profil class="max-w-sm mt-4 md:mt-2 w-full">ketua komite</x-heading-profil>
        <div class="w-full max-w-sm bg-white min-h-auto rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
            <div class="relative w-full flex justify-center ">
                @if (file_exists(public_path('img/komite/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="rounded-t-lg w-4/5 md:w-full h-auto object-cover" src="{{asset("img/komite/" . $ketuaKomite->photo)}}" alt="" />

            @else
                <div class="bg-gray-200 w-4/5 md:w-full grid place-content-center text-xs h-96">
                    <span>No Image</span> <!-- Pesan fallback -->
                </div>
            @endif

            </div>
            <div class="w-4/5 md:w-full relative left-1/2 -translate-x-1/2 md:pl-1">
                <h5 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-full mb-2  text-base md:text-xl font-semibold tracking-tight text-gray-900 dark:text-white min-h-20 flex items-end justify-center">{{$ketuaKomite->nama}}</h5>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 font-normal text-sm md:text-base text-gray-800 dark:text-gray-400 flex items-end justify-center">{{ Str::words(strip_tags($ketuaKomite->jabatan), 3, '...') }}.</p>

            </div>
        </div>
    </div>
    </div>
    <div class="flex w-full flex-col items-center ">
        <x-heading-welcome classAdventage="mb-3 md:mb-5 text-center">Komite Komite</x-heading-welcome>

        <div class="flex overflow-x-auto gap-3 w-[95%]">
            @foreach ($komites as $komite)
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-[48%] sm:w-[32%] md:w-[23%] lg:w-[19%] bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700 relative flex-shrink-0">
                <a class="relative" href="#">
                    @if (file_exists(public_path('img/komite/' . $komite->photo)) && $komite->photo)
                        <img class="rounded-md w-full h-auto relative left-1/2 -translate-x-1/2" src="{{ asset('img/komite/' . $komite->photo) }}" alt="" />
                    @else
                        <div class="bg-gray-200 relative text-xs h-52 w-full grid place-content-center">
                            <span>No Image</span>
                        </div>
                    @endif
                </a>
                <div class="swiper mySwiper bg-transparent bgMorpish absolute bottom-0 w-full p-2">
                  <div class="swiper-wrapper ">
                    <div class="swiper-slide tx-sh font-semibold text-center text-gray-100 dark:text-gray-400 md:font-bold capitalize mb-0 md:mb-3 min-h-16 md:min-h-8 flex items-end justify-center ">
                        {{ $komite->nama }}
                    </div>
                    <div class="swiper-slide tracking-wide tx-sh text-center text-sm text-gray-100 dark:text-gray-400 capitalize min-h-16 md:min-h-8 flex items-end justify-center">
                        {{ $komite->jabatan }}
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
{{-- Komite end --}}
@endsection


@section("js")
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    });
</script>
@endsection
