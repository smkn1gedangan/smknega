@extends("frontend.layouts.main")

@section("title","Struktur Organisasi Smkn 1 Gedangan")

@section("css")
<style>
    .swal-height {
    padding: 0.4rem;
    }
    .bgMorpish{
    backdrop-filter: blur(9px);
    }
    .tx-sh{
    text-shadow: 2px 2px 5px black;
    }
</style>
@endsection

@section("content")

{{-- struktur start --}}
<section class="w-full flex md:justify-center flex-wrap pt-32">
    <div class="md:w-full p-2 flex flex-col items-center">

        @if (file_exists(public_path('img/profil/' . $struktur->photo)) && $struktur->photo)
                <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-52 sm:h-64 md:h-auto rounded-md object-cover my-5 md:min-h-96" src="{{ asset("img/profil/" . $struktur->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 grid place-content-center sm:w-5/6 h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">struktur organisasi sekolah</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-2 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full">
                {!! $struktur->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left md:text-center font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$struktur->penulis->name}}  {{$struktur->updated_at->diffForHumans()}}</p>
            <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="{{$wakas->count()< 1 ? "invisible":"mb-2 md:mt-8 text-xl uppercase font-semibold text-gray-900 dark:text-white"}}  ">Anggota Waka</h2>
            <div class="w-full flex flex-wrap justify-center gap-2">
                @foreach ($wakas as $waka)
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-[48%] lg:w-[31%] max-w-sm white border border-gray-200 rounded-lg shadow  dark:border-gray-700 relative flex-shrink-0">
                    <a class="relative" href="#">
                        @if (file_exists(public_path('img/waka/' . $waka->photo)) && $waka->photo)
                        <img class="rounded-md w-full h-auto md:h-auto relative left-1/2 -translate-x-1/2" src="{{ asset('img/waka/' . $waka->photo) }}" alt="" />
                        @else
                            <div class="bg-gray-200 relative h-72 w-full flex justify-center items-center">
                                <span>No Image</span>
                            </div>
                        @endif
                    </a>
                    <div class="swiper mySwiper bg-transparent bgMorpish absolute bottom-0 w-full p-1">
                      <div class="swiper-wrapper ">
                        <div class="swiper-slide tx-sh font-semibold text-center text-gray-100 dark:text-gray-400 md:font-bold capitalize  mb-0 md:mb-3 min-h-20 flex items-end justify-center ">
                            {{ $waka->nama }}
                        </div>
                        <div class="swiper-slide tracking-wide tx-sh text-center text-sm text-gray-100 dark:text-gray-400 capitalize min-h-20 flex items-end justify-center">
                            {{ $waka->jabatan }}
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- struktur end --}}
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
