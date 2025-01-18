@extends("frontend.layouts.main")

@section("title","Program Bisnis Smkn 1 Gedangan")

@section("content")

{{-- bisnis start --}}
<section class="w-full flex md:justify-center flex-wrap pt-32">
    <div class="flex flex-col w-full p-2 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">
        <x-heading-profil class="w-full">bisnis sekolah</x-heading-profil>
            <div class="swiper mySwiper w-full flex justify-center">
                <div class="swiper-wrapper">
                    @foreach ($bisnisPhoto as $bp)
                        @if (file_exists(public_path('img/bisnis/' . $bp->photo)) && $bp->photo)
                        <div class="swiper-slide ">

                            <img class="relative left-1/2 -translate-x-1/2 w-11/12 sm:w-5/6 sm:h-64 rounded-md object-cover my-5" src="{{ asset('img/bisnis/' . $bp->photo) }}" alt="">
                        </div>
                        @else
                            <div class="bg-gray-100 w-11/12 sm:w-5/6 h-64 my-5">
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full">
                {!! $bisnis->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base md:text-center text-left font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$bisnis->penulis->name}}  {{$bisnis->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- bisnis end --}}
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
