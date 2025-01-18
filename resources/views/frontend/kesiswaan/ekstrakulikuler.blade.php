@extends("frontend.layouts.main")

@section("title","Ekstrakulikuler Smkn 1 Gedangan")

@section("content")

{{-- ekstrakulikuler start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3">ekstrakulikuler</x-heading-profil>
       </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-2 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <div class="swiper mySwiper w-full flex justify-center">
                <div class="swiper-wrapper">
                    @foreach ($ekstraPhotos as $ep)
                        @if (file_exists(public_path('img/ekstra/' . $ep->photo)) && $ep->photo)
                        <div class="swiper-slide ">

                            <img class="relative left-1/2 -translate-x-1/2 w-11/12 sm:w-5/6 rounded-md object-cover my-5" src="{{ asset('img/ekstra/' . $ep->photo) }}" alt="">
                        </div>
                        @else
                            <div class="bg-gray-100 w-11/12 sm:w-5/6 h-64 my-5">
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full">
                {!! $ekstrakulikuler->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left md:text-center font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$ekstrakulikuler->penulis->name}}  {{$ekstrakulikuler->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
    </div>
</section>
{{-- ekstrakulikuler end --}}
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
