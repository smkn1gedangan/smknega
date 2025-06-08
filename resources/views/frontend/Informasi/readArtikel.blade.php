@props([
    "url"=>"",
])

@extends("frontend.layouts.main")
@section("title","Artikel $article->title ? $url : $article->title  Smkn 1 Gedangan")
@section("content")
    <section class="relative bg-no-repeat">
       <div class="w-screen md:max-w-[95%] p-2 md:py-16 flex md:flex-row justify-evenly flex-wrap">
            <div class="md:pl-12 mt-20  md:py-6 flex flex-col w-full md:w-11/12 lg:w-2/3">
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="text-xl font-semibold capitalize tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</p>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-5 mt-2 md:mt-0 font-normal text-xs text-gray-700 dark:text-gray-400">dibuat pada {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('l, d F Y') }}
                </p>
                    @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                    <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-full md:w-5/6 rounded-t-lg h-auto md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">
                @else
                    <div class="w-full md:w-5/6 text-xs grid place-content-center text-slate-800 bg-gray-200 h-64">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

                <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-3">{!!$article->text_content!!}</div>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mt-1 font-normal relative text-gray-900 dark:text-gray-400 text-xs md:text-sm">artikel ini dilihat {{ $article->view}} kali</p>
            </div>
            <div class="flex flex-col mt-20 items-center w-full md:w-full p-2 md:py-6 lg:w-[30%] border border-gray-200">


            <h2 class="w-full my-5 text-center text-2xl uppercase font-semibold text-gray-900 dark:text-white">Ketegori Artikel</h2>
            <ul class="w-full flex flex-col gap-6 max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400 pl-3">

              @foreach ($kategoris as $kategori)
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="flex items-center">
                <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                 </svg>
                {{$kategori->nama}}
                </li>
              @endforeach
            </ul>
            <h2 class="w-full text-center my-5 md:my-4  text-xl uppercase font-semibold text-gray-900 dark:text-white">Artikel Terbaru </h2>
            @foreach ($articleTerbarus as $articleTerbaru)
                        <a href="{{route("readArticle",$articleTerbaru->slug)}}" class="flex items-center bg-white border border-gray-200 mt-3 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full  lg:w-full">
                            @if (file_exists(public_path('img/articles_images/' . $articleTerbaru->image)) && $articleTerbaru->image)
                            <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="object-cover w-20 h-20 rounded-t-lg md rounded-md" src="{{ asset('img/articles_images/' . $articleTerbaru->image) }}">
                        @else
                            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="bg-gray-200 h-20 w-20 grid place-content-center text-xs ">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif

                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-2 text-base font-semibold tracking-tight text-gray-800 dark:text-white">{{$articleTerbaru->title}}</h5>
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($articleTerbaru->created_at)->translatedFormat('l, d F Y') }}</p>
                            </div>
                        </a>
                        @endforeach

            </div>
       </div>
    </section>
@endsection
