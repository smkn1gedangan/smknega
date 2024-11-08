@extends("frontend.layouts.main")
@section("title","article")
@section("content")
    <section class="relative bg-no-repeat">
       <div class="w-screen md:max-w-[95%] p-2 md:py-16 flex md:flex-row justify-evenly flex-wrap">
            <div class="pl-12 flex flex-col w-full md:w-11/12 lg:w-2/3">
                <x-heading-welcome classAdventage="mb-0">{{$article->title}}</x-heading-welcome>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">dibuat pada {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('l, d F Y') }}
                </p>
                    @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                    <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-5/6 rounded-t-lg h-auto md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">
                @else
                    <div class="w-full bg-gray-200 h-52 md:w-52">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

                <p class="mb-3 mt-10 font-normal text-gray-900 dark:text-gray-400">
                    {{ Str::words(str_replace('&nbsp;', '', strip_tags($article->text_content)), 1000, '...') }}
                </p>
            </div>
            <div class="flex flex-col-reverse md:flex-row-reverse lg:flex-col items-center w-full md:w-full p-2 mt-44 md:py-6 lg:w-[30%] border border-gray-200">

            <form class="w-full max-w-md mx-auto my-4">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari berita</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari berita" required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                </div>
            </form>

            <h2 class="mb-2 text-2xl uppercase font-semibold text-gray-900 dark:text-white">Ketegori Berita </h2>
            <ul class="w-full flex flex-col gap-6 max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400 pl-3">

              @foreach ($kategoris as $kategori)
              <li class="flex items-center">
                <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                 </svg>
                {{$kategori->nama}}
                </li>
              @endforeach
            </ul>

            </div>
       </div>
    </section>
@endsection
