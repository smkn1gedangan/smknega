@extends("frontend.layouts.main")

@section("title","Potensi Smkn 1 Gedangan")

@section("content")

{{-- potensi start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
   <div class="text-center pt-6 md:pt-28">
        <x-heading-welcome classAdventage="">Potensi Sekolah</x-heading-welcome>
   </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 sm:w-4/5 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $potensi->konten !!}
            </p>
            <p class="mb-3 w-full text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$potensi->penulis->name}}  {{$potensi->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">
        <div class="w-full md:w-[38%] lg:w-full max-w-sm bg-white min-h-[40rem] max-h-[42rem] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8">
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
    </div>
</section>
{{-- sejarah end --}}
@endsection
