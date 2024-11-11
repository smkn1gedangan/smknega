@extends("frontend.layouts.main")
@section("title","homepage")
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
{{-- header start --}}
<section  class="relative ">
    <div class="swiper mySwiper w-full">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide object-cover  " style="background: url({{asset("img/welcome/baner3.jpg")}})">
                <div class="py-8 flex flex-col items-center justify-center px-4 h-screen mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative ">

                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">Selamat datang di Smkn 1 Gedangan</h1>
                <p class="mb-8 text-lg font-semibold text-white lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>

                </div>
                <div class="bg-gradient-to-t from-slate-900 to-transparent dark:from-white w-full h-full absolute top-0 left-0 z-0"></div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide object-cover  " style="background: url({{asset("img/welcome/baner1.jpg")}})">
                <div class="py-8 flex flex-col items-center justify-center px-4 h-screen mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative ">

                {{-- <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">isi title1</h1> --}}
                {{-- <p class="mb-8 text-lg font-semibold text-white lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p> --}}

                </div>
                <div class="bg-gradient-to-t from-slate-900 to-transparent dark:from-white w-full h-full absolute top-0 left-0 z-0"></div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide object-cover  " style="background: url({{asset("img/welcome/baner2.jpg")}})">
                <div class="py-8 flex flex-col items-center justify-center px-4 h-screen mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative ">

                {{-- <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">isi title2</h1> --}}
                {{-- <p class="mb-8 text-lg font-semibold text-white lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p> --}}

                </div>
                <div class="bg-gradient-to-t from-slate-900 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
            </div>
        </div>
        <!-- Swiper Navigation Buttons -->

    </div>

</section>
{{-- header end --}}

{{-- profil sekolah start --}}
    <section id="profil" class="pt-10">
        <div class="w-screen md:max-w-[95%] md:gap-6 p-2 md:pl-10 flex md:flex-row justify-evenly flex-wrap">
            <div class="flex flex-col w-full md:p-8 md:w-11/12 lg:w-3/5">
                <x-heading-welcome classAdventage="">SMK Negeri 1 Gedangan Malang</x-heading-welcome>
                @if (file_exists(public_path('img/welcome/' . $profil->photo)) && $profil->photo)
                <img class="w-11/12 sm:w-4/5 h-52 sm:h-64 rounded-md object-cover my-5" src="{{ asset("img/welcome/" . $profil->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-4/5 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 mt-6">
                        {!!$profil->konten!!}
                    </p>
                    <button type="button" class="w-2/5 lg:w-1/5 mt-2 mb-8 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Info ppdb</button>
            </div>
            <div class="flex flex-col md:flex-row-reverse lg:flex-col items-center w-full md:w-full  lg:w-[35%]">
                <div class="w-full md:mt-20 md:w-[38%] lg:w-full max-w-sm bg-white min-h-[40rem] max-h-[42rem] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8">
                    <div class="relative">
                        @if (file_exists(public_path('img/kepala_sekolah/' . $kepsek->photo)) && $kepsek->photo)
                        <img class="rounded-t-lg w-4/5 md:w-full h-96 object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/kepala_sekolah/" . $kepsek->photo)}}" alt="" />
                        <div style="box-shadow:inset 10px 10px 100px relative left-1/2 -translate-x-1/2 rgba(0, 0, 0, 0.6)" class=" dark:from-blue-900 w-4/5 h-full absolute top-0 left-0 z-0"></div>
                    @else
                        <div class="bg-gray-200 w-4/5 md:w-full h-96 relative left-1/2 -translate-x-1/2">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

                    </div>
                    <div class="w-4/5 md:w-full relative left-1/2 -translate-x-1/2 md:pl-1">
                        <h5 class="mb-2 pt-3 md:pt-5 text-xl font-semibold tracking-tight text-gray-900 dark:text-white text-center md:text-left">{{$kepsek->nama}}</h5>
                        <p class="mb-3 font-normal text-gray-800 dark:text-gray-400">{{ Str::words(strip_tags($kepsek->sambutan), 25, '...') }}.</p>
                        <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-3/5 lg:w-full mt-8 md:mt-2 p-2">
                    <div class="w-full flex md:pl-0 flex-col flex-wrap gap-2">
                        <h1 class="{{ count($prestasis) < 1 ? 'visible' : '' }} text-2xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">Prestasi Terbaru</div>
                        @foreach ($prestasis as $prestasi)
                        <a href="{{route("readArticle",$prestasi->slug)}}" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full  lg:w-full">
                            @if (file_exists(public_path('img/articles_images/' . $prestasi->image)) && $prestasi->image)
                            <img class="object-cover w-20 h-20 rounded-t-lg md rounded-md" src="{{ asset('img/articles_images/' . $prestasi->image) }}">
                        @else
                            <div class="bg-gray-200 h-20 w-20 ">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif

                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-800 dark:text-white">{{$prestasi->title}}</h5>
                                <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($prestasi->created_at)->translatedFormat('l, d F Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
{{-- profil sekolah end --}}


{{-- guru guru start --}}
    <section class="flex w-full flex-col items-center">
        <x-heading-welcome classAdventage="mb-3 md:mb-5 text-center">Waka Smkn 1 Gedangan</x-heading-welcome>

        <div class="flex overflow-x-auto gap-3 w-[95%]">
            @foreach ($gurus as $guru)
            <div class="w-[48%] sm:w-[32%] md:w-[23%] lg:w-[19%] bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700 relative flex-shrink-0">
                <a class="relative" href="#">
                    @if (file_exists(public_path('img/guru/' . $guru->photo)) && $guru->photo)
                        <img class="rounded-md w-full h-full relative left-1/2 -translate-x-1/2" src="{{ asset('img/guru/' . $guru->photo) }}" alt="" />
                    @else
                        <div class="bg-black relative h-80 w-full flex justify-center items-center">
                            <span>No Image</span>
                        </div>
                    @endif
                </a>
                <div class="swiper mySwiper bg-transparent bgMorpish absolute bottom-0 w-full p-2">
                  <div class="swiper-wrapper ">
                    <div class="swiper-slide tx-sh  font-bold text-center text-gray-100 dark:text-gray-400 md:font-bold capitalize  mb-0 md:mb-3 ">
                        {{ $guru->nama }}
                    </div>
                    <div class="swiper-slide tracking-wide tx-sh text-center text-sm text-gray-100 dark:text-gray-400 capitalize">
                        {{ $guru->tugas }}
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>

{{-- guru guru end --}}

{{-- artikel start--}}
<section class="flex w-full justify-center flex-wrap ">
    <div class="w-screen md:max-w-[95%] p-2 md:py-2 flex md:flex-row justify-evenly flex-wrap md:gap-1">
       <div class="flex flex-col w-full md:w-11/12 lg:w-3/5 ">
        <div class="flex flex-col w-full mt-5 md:mt-0 ">
            <x-heading-welcome classAdventage="{{ $articles->count() < 1 ? 'invisible' : 'mb-3 md:text-xl underline underline-offset-4' }}">
                Artikel Terbaru
            </x-heading-welcome>

            <div class="flex flex-col w-full gap-2 md:gap-10 ">
                @foreach ($articles as $article)
                <a href="{{route("readArticle",$article->slug)}}" class="flex flex-col relative items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                    @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                            <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-full sm:w-3/5 sm:h-52 rounded-t-lg h-40 md:h-52 md:w-52 md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">

                        @else
                            <div class="w-full bg-gray-200 sm:w-3/5 h-52 md:w-52">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif

                    <div class="w-full  flex flex-col justify-between p-4 leading-normal ">
                        <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ Str::words(str_replace('&nbsp;', '', strip_tags($article->text_content)), 15, '...') }}
                        </p>


                        <div class="min-w-full flex justify-between mt-4">
                            <p class="font-normal text-gray-700 dark:text-gray-400">ditulis oleh {{ $article->writer->name}}</p>
                            <p class="font-normal relative text-gray-700 dark:text-gray-400"> {{ $article->created_at->diffForHumans()}}</p>
                        </div>
                        <p class="mt-1 text-sm text-right font-normal relative text-gray-700 dark:text-gray-400">dilihat {{ $article->view}} kali</p>

                    </div>
                </a>
                @endforeach

            </div>


        </div>

       </div>
        <div class="flex flex-col md:flex-row-reverse flex-wrap lg:flex-col items-center w-full md:w-full  lg:w-[35%] sm:gap-2">
            <div class="flex flex-col w-full mt-5 md:mt-0">
                <x-heading-welcome classAdventage="{{ $galeris->count() < 1 ? 'invisible' : 'mb-3 md:text-xl underline underline-offset-4' }}">
                    Galeri Terbaru
                </x-heading-welcome>
                <div class="flex flex-row flex-wrap w-full gap-2 sm:gap-5 md:gap-3 ">
                    @foreach ($galeris as $galeri)
                    <div class="w-11/12 sm:w-[47%] lg:w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        @if (file_exists(public_path('img/galeri/' . $galeri->photo)) && $galeri->photo)
                        <img class="rounded-t-lg object-cover w-full h-52" src="{{ asset("img/galeri/" . $galeri->photo) }}" alt="{{$galeri->judul}}"/>

                    @else
                        <div class="w-full bg-gray-200 h-52">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

                        <div class="p-2">
                            <h5 class="text-md md:text-xl font-normal tracking-tight text-gray-900 dark:text-white">{{ $galeri->judul }}</h5>
                            <p class="mb-2 text-xs md:text-base font-normal text-gray-700 dark:text-gray-400">dibuat pada {{ \Carbon\Carbon::parse($galeri->created_at)->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
            <div class="flex flex-col w-full mt-5 md:mt-0">
                <x-heading-welcome classAdventage="{{ $galeris->count() < 1 ? 'invisible' : 'mb-3 md:text-xl underline underline-offset-4' }}">
                    Youtube Terbaru
                </x-heading-welcome>
                <div class="flex flex-row flex-wrap w-full gap-2 sm:gap-5 md:gap-3 ">
                    @foreach ($galeris as $galeri)
                    <div class="w-11/12 sm:w-[47%] lg:w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <iframe
                            class="w-full h-48"
                            {{-- src="{{ $gvideo->url_video }}" --}}
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen>
                        </iframe>
                    </div>

                    @endforeach
                </div>


            </div>
        </div>
    </div>
</section>
{{-- artikel end --}}






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
