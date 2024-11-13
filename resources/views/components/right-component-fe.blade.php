@props(['articleTerbarus',"galeris"])
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
                        <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($articleTerbaru->created_at)->translatedFormat('l, d F Y') }}</p>
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
   <div class="w-full flex flex-col gap-2 sm:w-[47%] lg:w-full">
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
