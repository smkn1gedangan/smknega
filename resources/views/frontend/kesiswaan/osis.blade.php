@extends("frontend.layouts.main")

@section("title","Osis Smkn 1 Gedangan")
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

{{-- osis start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3">osis smkn 1 gedangan</x-heading-profil>
       </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <div class="swiper mySwiper w-full flex justify-center">
                <div class="swiper-wrapper">
                    @foreach ($osisPhotos as $op)
                        <div class="w-full swiper-slide">
                            @if (file_exists(public_path('img/osis/' . $op->photo)) && $op->photo)
                            <img class="relative left-1/2 -translate-x-1/2 w-11/12 sm:w-5/6 sm:h-64 md:h-auto rounded-md md:w-1/2 object-cover" src="{{ asset('img/osis/' . $op->photo) }}" alt="">
                        @else
                            <div class="bg-gray-100 w-11/12 relative left-1/2 -translate-x-1/2 sm:w-5/6 md:w-1/2 h-64 my-5">
                            </div>
                        @endif
                        <div class="left-1/2 -translate-x-1/2 bg-transparent bgMorpish absolute bottom-0 w-11/12 sm:w-5/6 md:w-1/2">
                            <div class="">
                              <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class=" tx-sh  font-semibold text-center text-gray-100 dark:text-gray-400 md:font-bold capitalize  mb-0 md:mb-3 ">
                                {{ $op->nama }} sebagai {{$op->jabatan}}
                              </div>

                            </div>
                          </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="lg:first-letter:pl-16 mb-3 text-sm md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $osis->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$osis->penulis->name}}  {{$osis->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
    </div>
</section>
{{-- osis end --}}
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
