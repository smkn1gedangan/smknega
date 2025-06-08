@props(['articleTerbarus',"galeris"])
 <div  class="w-full flex flex-col gap-2 sm:w-[47%] lg:w-full">
    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-2 md:mt-8 text-xl uppercase font-semibold text-gray-900 dark:text-white">Artikel Terbaru </h2>
    @foreach ($articleTerbarus as $articleTerbaru)
                <a href="{{route("readArticle",$articleTerbaru->slug)}}" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full">
                    @if (file_exists(public_path('img/articles_images/' . $articleTerbaru->image)) && $articleTerbaru->image)
                    <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="object-cover w-20 h-20 rounded-t-lg md rounded-md" src="{{ asset('img/articles_images/' . $articleTerbaru->image) }}">
                @else
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="bg-gray-200 h-20 w-20 text-xs grid place-content-center">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="mb-2 text-base font-semibold tracking-tight text-gray-800 dark:text-white">{{$articleTerbaru->title}}</h5>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"  class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($articleTerbaru->created_at)->translatedFormat('l, d F Y') }}</p>
                    </div>
                </a>
    @endforeach
   </div>
   <div class="w-full flex flex-col gap-2 sm:w-[47%] lg:w-full">
    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-2 md:mt-8 text-xl uppercase font-semibold text-gray-900 dark:text-white">Galeri Terbaru </h2>
    @foreach ($galeris as $galeri)
    <div  class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        @if (file_exists(public_path('img/galeri/' . $galeri->photo)) && $galeri->photo)
        <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="rounded-t-lg object-cover w-full h-64" src="{{ asset("img/galeri/" . $galeri->photo) }}" alt="{{$galeri->judul}}"/>

    @else
        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-full bg-gray-200 h-52">
            <span>No Image</span> <!-- Pesan fallback -->
        </div>
    @endif

        <div class="p-2">
            <a data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" href="{{ route("galeri") }}" class="text-md md:text-xl font-normal tracking-tight text-gray-900 dark:text-white">{{ Str::words($galeri->judul, 5, '...') }}</a>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-2 text-xs md:text-base font-normal text-gray-700 dark:text-gray-400">dibuat pada {{ \Carbon\Carbon::parse($galeri->created_at)->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>
    @endforeach
   </div>
   {{-- <div class="w-full flex flex-col gap-2 sm:w-[47%] lg:w-full">
    <x-heading-welcome classAdventage="{{ $galeris->count() < 1 ? 'invisible' : 'mb-3 md:text-xl underline underline-offset-4' }}">
        Youtube Terbaru
    </x-heading-welcome>
    <div class="flex flex-row flex-wrap w-full gap-2 sm:gap-5 md:gap-3 ">
        @foreach ($youtubeVideos as $video)
        <div class="w-full">
            <a href="{{ $video['url'] }}" target="_blank">
                <img class="rounded-t-lg object-cover w-full h-64" src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}"/>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" href="{{ route("galeri") }}" class="text-md font-semibold lowercase md:mt-3 tracking-tight text-gray-900 dark:text-white">{{ Str::words($video['title'] ,15,"...")}}</p>
            </a>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-2 text-xs md:text-base font-normal text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($video['publishedAt'])->format('d M Y') }}</p>
        </div>
    @endforeach
    </div>


    </div> --}}
