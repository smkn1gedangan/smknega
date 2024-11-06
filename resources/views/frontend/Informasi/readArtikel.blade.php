@extends("frontend.layouts.main")
@section("title","article")
@section("content")
    <section class="relative bg-no-repeat">
        <div class="w-screen md:max-w-[95%] p-2 md:py-16 flex md:flex-row justify-evenly flex-wrap">
            <div class="flex flex-col w-full md:w-11/12 lg:w-3/5 ">
                <div class="decoration-1 decoration-black dark:decoration-black pt-4 md:pt-10 mb-4 text-2xl font-semibold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">{{$article->title}}</div>
                <div class="flex flex-col w-full gap-2 md:gap-10 ">
                    <a href="{{route("readArticle",$article->slug)}}" class="flex flex-col relative items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full">
                        @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                                <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-full rounded-t-lg h-40 md:h-52 md:w-52 md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">
                            @else
                                <div class="w-full bg-gray-200 h-52 md:w-52">
                                    <span>No Image</span> <!-- Pesan fallback -->
                                </div>
                            @endif

                        <div class="w-full  flex flex-col justify-between p-4 leading-normal ">
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
                </div>


            </div>
            <div class="flex flex-col-reverse md:flex-row-reverse lg:flex-col items-center w-full md:w-full  lg:w-[38%]">


            </div>
        </div>
    </section>
@endsection
