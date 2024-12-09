<?php
$search = request()->input('search');

$artikels = \App\Models\Article::query()
    ->when($search, function ($query) use ($search) {
        return $query->where('title', 'like', '%' . $search . '%');
    })
    ->latest() // Mengurutkan berdasarkan waktu terbaru
    ->paginate(10);

?>


@extends("frontend.layouts.main")
@section("title","Artikel Smkn 1 Gedangan")
@section("content")
    <section class="relative bg-no-repeat">
       <div class="w-screen md:max-w-[95%]  p-2 md:py-16 flex md:flex-row justify-evenly flex-wrap">
           <div class="md:pl-12 mt-20 md:mt-0 p-2 md:py-6 flex flex-wrap gap-3 flex-col sm:flex-row lg:flex-col w-full lg:w-2/3 ">
            @foreach ($artikels as $artikel)
            <div class="w-full sm:w-[47%] border border-gray-200 lg:w-5/6 md:p-4 mt-6 md:mt-4">
                <a data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" href="{{route("readArticle",$artikel->slug)}}" class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-slate-600">{{ $artikel->title }}</a>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-xs md:text-sm ">dibuat pada {{ \Carbon\Carbon::parse($artikel->created_at)->translatedFormat('l, d F Y') }}
                </p>
                    @if (file_exists(public_path('img/artikels_images/' . $artikel->image)) && $artikel->image)
                    <img data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" src="{{ asset('img/artikels_images/' . $artikel->image) }}" class="object-cover w-full rounded-t-lg h-auto md:rounded-none md:rounded-s-lg" alt="{{ $artikel->title }}">
                @else
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="w-full text-xs md:text-sm grid place-content-center text-slate-800 bg-gray-200 h-60">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 mt-2 font-normal text-gray-900 dark:text-gray-400">
                    {{ Str::words(str_replace('&nbsp;', '', strip_tags($artikel->text_content)), 20, '...') }}
                </p>
            </div>
            @endforeach
            <div class="flex justify-center w-5/6 mt-6">{{ $artikels->links() }}</div>
           </div>
            <div class="flex flex-col items-center w-full md:w-full p-2 md:py-6 lg:w-[30%]">

            <form method="GET" action="{{ url()->current() }}" class="w-full max-w-md mx-auto my-4">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari Artikel</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Artikel" />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                </div>
            </form>

            <h2 class="mb-2 mt-10 text-2xl uppercase font-semibold text-gray-900 dark:text-white">Ketegori Artikel</h2>
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
