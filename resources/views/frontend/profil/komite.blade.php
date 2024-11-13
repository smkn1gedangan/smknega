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
        <x-heading-profil class="w-5/6 md:w-2/3 lg:w-2/3">komite sekolah</x-heading-profil>
       </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <p class="mb-3 text-center md:text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $deskripsiKomite->konten !!}
            </p>
            <p class="mb-3 w-full text-center md:text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$deskripsiKomite->penulis->name}}  {{$deskripsiKomite->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">
        <x-heading-profil class="md:w-[38%] lg:w-full max-w-sm mt-8 md:mt-10 w-full">ketua komite</x-heading-profil>
        <div class="w-full md:w-[38%] lg:w-full max-w-sm bg-white min-h-[40rem] max-h-[42rem] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
            <div class="relative">
                @if (file_exists(public_path('img/komite/' . $ketuaKomite->photo)) && $ketuaKomite->photo)
                <img class="rounded-t-lg w-4/5 md:w-full h-96 object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/komite/" . $ketuaKomite->photo)}}" alt="" />
                <div style="box-shadow:inset 10px 10px 100px relative left-1/2 -translate-x-1/2 rgba(0, 0, 0, 0.6)" class=" dark:from-blue-900 w-4/5 h-full absolute top-0 left-0 z-0"></div>
            @else
                <div class="bg-gray-200 w-4/5 md:w-full h-96 relative left-1/2 -translate-x-1/2">
                    <span>No Image</span> <!-- Pesan fallback -->
                </div>
            @endif

            </div>
            <div class="w-4/5 md:w-full relative left-1/2 -translate-x-1/2 md:pl-1">
                <h5 class="w-full mb-2 pt-3 md:pt-5 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$ketuaKomite->nama}}</h5>
                <p class="mb-3 font-normal text-gray-800 dark:text-gray-400">{{ Str::words(strip_tags($ketuaKomite->jabatan), 3, '...') }}.</p>
                
            </div>
        </div>
    </div>
    </div>
    <div class="flex w-full flex-col items-center ">
        <x-heading-welcome classAdventage="mb-3 md:mb-5 text-center">Para Komite Smkn 1 Gedangan</x-heading-welcome>

        <div class="flex overflow-x-auto gap-3 w-[95%]">
            @foreach ($komites as $komite)
            <div class="w-[48%] sm:w-[32%] md:w-[23%] lg:w-[19%] bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700 relative flex-shrink-0">
                <a class="relative" href="#">
                    @if (file_exists(public_path('img/komite/' . $komite->photo)) && $komite->photo)
                        <img class="rounded-md w-full h-full relative left-1/2 -translate-x-1/2" src="{{ asset('img/komite/' . $komite->photo) }}" alt="" />
                    @else
                        <div class="bg-black relative h-80 w-full flex justify-center items-center">
                            <span>No Image</span>
                        </div>
                    @endif
                </a>
                <div class="swiper mySwiper bg-transparent bgMorpish absolute bottom-0 w-full p-2">
                  <div class="swiper-wrapper ">
                    <div class="swiper-slide tx-sh  font-bold text-center text-gray-100 dark:text-gray-400 md:font-bold capitalize  mb-0 md:mb-3 ">
                        {{ $komite->nama }}
                    </div>
                    <div class="swiper-slide tracking-wide tx-sh text-center text-sm text-gray-100 dark:text-gray-400 capitalize">
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