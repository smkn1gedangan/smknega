@extends("frontend.layouts.main")

@section("title","Sejarah Smkn 1 Gedangan")

@section("content")
{{-- header start --}}
<section  class="relative ">
    <div class="w-full">
            <!-- Slide 1 -->
            <div class="swiper-slide object-cover" style="background: url({{asset("img/profil/tentang.jpg")}});">
                <div class="py-8 flex flex-col items-center justify-center px-4 h-screen mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative ">

                </div>
                <div class="bg-gradient-to-t from-slate-900 to-transparent dark:from-white w-full h-full absolute top-0 left-0 z-0"></div>
            </div>


    </div>

</section>
{{-- header end --}}

{{-- sejarah start --}}
<section class="w-full flex md:justify-center flex-wrap">
    <div class="flex flex-col w-full p-4 sm:w-4/5 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
        <x-heading-welcome classAdventage="">Sejarah Smkn 1 Gedangan Malang</x-heading-welcome>
        @if (file_exists(public_path('img/profil/' . $sejarah->photo)) && $sejarah->photo)
                <img class="w-11/12 sm:w-4/5 h-52 sm:h-64 lg:h-auto rounded-md object-cover my-5" src="{{ asset("img/profil/" . $sejarah->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-4/5 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! nl2br(e($sejarah->konten)) !!}
            </p>
            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{Auth::user()->name}}  {{$sejarah->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 md:p-2 md:py-20 gap-4 flex flex-wrap lg:flex-col">
       <div class="w-full flex flex-col gap-2 sm:w-[47%] lg:w-full">
        <h2 class="mb-2 md:mt-8 text-xl uppercase font-semibold text-gray-900 dark:text-white">Artikel Terbaru </h2>
        @foreach ($articleTerbarus as $articleTerbaru)
                    <a href="{{route("readArticle",$articleTerbaru->slug)}}" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full">
                        @if (file_exists(public_path('img/articles_images/' . $articleTerbaru->image)) && $articleTerbaru->image)
                        <img class="object-cover w-20 h-20 rounded-t-lg md rounded-md" src="{{ asset('img/articles_images/' . $articleTerbaru->image) }}">
                    @else
                        <div class="bg-gray-200 h-20 w-20 ">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-800 dark:text-white">{{$articleTerbaru->title}}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$articleTerbaru->created_at}}</p>
                        </div>
                    </a>
        @endforeach
       </div>
       <div class="w-full flex flex-col gap-2 sm:w-[47%] lg:w-full">
        <h2 class="mb-2 md:mt-8 text-xl uppercase font-semibold text-gray-900 dark:text-white">Galeri Terbaru </h2>
        @foreach ($galeris as $galeri)
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
</section>
{{-- sejarah end --}}
@endsection
