<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .bg-blue-scrolled {
            background-color: white; /* Warna biru */
            transition: background-color 0.3s ease;
        }

    </style>
</head>
<body class="relative w-full">


<nav id="navbar" class=" z-50 w-full fixed border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
      </a>
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
          </li>
          <x-dropdown-link data="navbar-jurusan">Jurusan</x-dropdown-link>

          <x-dropdown data="data-pricing">Pricing</x-dropdown-link>
          <x-dropdown data="data-artikel">Artikel</x-dropdown-link>
          <x-dropdown data="data-kontak">Contact</x-dropdown-link>

        </ul>
      </div>
    </div>
</nav>
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
    <div class="w-screen md:max-w-[90%] p-2 md:py-16 flex md:flex-row justify-evenly flex-wrap">
        <div class="flex flex-col w-full md:w-3/5 ">
            <x-heading-welcome>Artikel Terbaru</x-heading-welcome>
            <div class="flex flex-col w-full gap-2 md:gap-10 ">
                <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                <img class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-80 md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a>
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                <img class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-80 md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a>
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                <img class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-80 md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a>
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                <img class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-80 md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a>
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                <img class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-80 md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a></div>


        </div>
        <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8 md:mt-2">
            <a href="#">
                <img class="rounded-t-lg w-4/5 md:w-full object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/welcome/owijpg.jpg")}}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-800 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                     <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
{{-- artikel dan sambutan end --}}

{{-- Tentang Sekolah start --}}
<section class="py-2">
    <div class="max-w-screen-2xl flex items-center flex-col">
        <x-heading-welcome>Statistik sekolah</x-heading-welcome>
        <div class="w-full flex justify-evenly flex-wrap">
            <div class="w-full flex items-center flex-col flex-wrap md:w-[30%] lg:w-[23%] border border-gray-300">

            </div>
        </div>
    </div>
</section>
{{-- Tentang Sekolah End --}}
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-blue-scrolled');
            } else {
                navbar.classList.remove('bg-blue-scrolled');
            }
        });
    });
</script>
</html>
