@extends("frontend.layouts.main")

@section("title","Guru  Smkn 1 Gedangan")

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

{{-- guru start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3 lg:w-2/3">guru dan tenaga pendidikan</x-heading-profil>
       </div>
    <div class="w-full flex flex-col-reverse lg:flex-row md:justify-center flex-wrap">
        <div class="flex flex-col p-4 md:items-center md:p-8 lg:w-3/5">
            <div class="w-full flex flex-wrap gap-2  ">
                @foreach ($gurus as $guru)
            <div class="w-[48%] sm:w-[32%] md:w-[23%] lg:w-[32%] bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700 relative flex-shrink-0 ">
                <div class="relative" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    @if (file_exists(public_path('img/guru/' . $guru->photo)) && $guru->photo)
                        <img class="rounded-md w-full h-full relative left-1/2 -translate-x-1/2" src="{{ asset('img/guru/' . $guru->photo) }}" alt="" />
                    @else
                        <div class="bg-gray-200 relative h-52 w-full grid place-content-center text-xs">
                            <span>No Image</span>
                        </div>
                    @endif
                </div>
                <div class="swiper mySwiper bg-transparent bgMorpish absolute bottom-0 w-full p-1">
                  <div class="swiper-wrapper ">
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="swiper-slide tx-sh   font-semibold text-center text-gray-100 dark:text-gray-400 md:font-bold capitalize  mb-0 md:mb-3 min-h-16 md:min-h-8 flex items-end justify-center">
                        {{ $guru->nama }}
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="swiper-slide tracking-wide tx-sh  text-center text-sm text-gray-100 dark:text-gray-400 capitalize min-h-16 md:min-h-8 flex items-end justify-center">
                        {{ $guru->tugas }}
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
            </div>
            <div class="mt-6">{{ $gurus->links() }}</div>
        </div>
        <div class="w-full lg:w-[37%] p-4 gap-4">
            <div class="relative bg-white  left-1/2 -translate-x-1/2  md:w-[38%] lg:w-full max-w-sm min-h-auto rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8 md:mt-4">
                <div class="relative">
                    @if (file_exists(public_path('img/kepala_sekolah/' . $kepsek->photo)) && $kepsek->photo)
                    <img class="rounded-t-lg w-4/5 md:w-full h-auto object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/kepala_sekolah/" . $kepsek->photo)}}" alt="" />
                    <div style="box-shadow:inset 10px 10px 100px relative left-1/2 -translate-x-1/2 rgba(0, 0, 0, 0.6)" class=" dark:from-blue-900 w-4/5 h-full absolute top-0 left-0 z-0"></div>
                @else
                    <div class="bg-gray-200 w-4/5 md:w-full h-96 relative left-1/2 -translate-x-1/2 grid place-content-center text-xs">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

                </div>
                <div class="w-4/5 md:w-full relative left-1/2 -translate-x-1/2 md:pl-1">
                    <h5 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-2 pt-3 md:pt-5 text-xl font-semibold tracking-tight text-gray-900 dark:text-white text-left">{{$kepsek->nama}}</h5>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 font-normal text-sm md:text-base text-gray-800 dark:text-gray-400">{{ Str::words(strip_tags($kepsek->sambutan), 25, '...') }}.</p>
                    <a href="{{route("sambutan_kepsek")}}" class="inline-flex mb-2 items-center px-3 py-2 text-sm font-medium text-center transition-all duration-300 text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Baca Selengkapnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
{{-- guru end --}}
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
