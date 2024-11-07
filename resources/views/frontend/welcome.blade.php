@extends("frontend.layouts.main")
@section("title","homepage")
@section("css")
<style>


</style>
@endsection

@section("content")
{{-- header start --}}
<section style="background: url({{asset("img/welcome/tentang.jpg")}})" class="relative bg-no-repeat">
    <div class="py-8 flex flex-col items-center justify-center px-4 h-screen md:min-h-screen mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative ">

        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Selamat datang di Smkn 1 Gedangan</h1>
        <p class="mb-8 text-lg font-semibold text-gray-900 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>

    </div>
    <div class="bg-gradient-to-t from-gray-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
</section>
{{-- header end --}}


{{-- artikel dan sambutan start--}}
<section class="flex w-full justify-center flex-wrap">
    <div class="w-screen md:max-w-[95%] p-2 md:py-16 flex md:flex-row justify-evenly flex-wrap">
        <div class="flex flex-col w-full md:w-11/12 lg:w-3/5 ">
            <x-heading-welcome>Artikel Terbaru</x-heading-welcome>
            <div class="flex flex-col w-full gap-2 md:gap-10 ">
                @foreach ($articles as $article)
                <a href="{{route("readArticle",$article->slug)}}" class="flex flex-col relative items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                    @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                            <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-full rounded-t-lg h-40 md:h-52 md:w-52 md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">
                        @else
                            <div class="w-full bg-gray-200 h-52 md:w-52">
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
        <div class="flex flex-col-reverse md:flex-row-reverse lg:flex-col items-center w-full md:w-full  lg:w-[38%]">
            <div class="w-full  md:w-[38%] lg:w-full max-w-sm bg-white min-h-[40rem] max-h-[42rem] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8 md:mt-2">
                <div class="relative">
                    @if (file_exists(public_path('img/kepala_sekolah/' . $kepsek->kepsek)) && $kepsek->photo)
                    <img class="rounded-t-lg w-4/5 md:w-full h-96 object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/kepala_sekolah/" . $kepsek->photo)}}" alt="" />
                    <div style="box-shadow:inset 10px 10px 100px rgba(0, 0, 0, 0.6)" class=" dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
                @else
                    <div class="bg-gray-200 w-4/5 md:w-full h-96">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

                </div>
                <div class="md:pl-1">
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
                <div class="w-full flex md:pl-4 flex-col flex-wrap gap-2">
                    <h1 class="text-2xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">Prestasi Terbaru</div>
                    @foreach ($prestasis as $prestasi)
                    <a href="{{route("readArticle",$prestasi->slug)}}" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full  lg:w-full">
                        @if (file_exists(public_path('img/articles_images/' . $prestasi->image)) && $prestasi->image)
                        <img class="object-cover w-20 h-20 rounded-t-lg md rounded-md" src="{{ asset('img/articles_images/' . $prestasi->image) }}"">
                    @else
                        <div class="bg-gray-200 h-20 w-20 ">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-800 dark:text-white">{{$prestasi->title}}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$prestasi->created_at}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
{{-- artikel dan sambutan end --}}




@endsection


@section("content")

@endsection
