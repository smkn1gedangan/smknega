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
        <div class="flex flex-col w-full md:w-4/5 lg:w-3/5 ">
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
            </a>
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-[100%] ">
                <img class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-80 md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a></div>


        </div>
        <div class="flex flex-col-reverse lg:flex-col items-center w-full md:w-full  lg:w-[38%]">
            <div class="max-w-sm bg-white min-h-[40rem] max-h-[42rem] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8 md:mt-2">
                <a href="#">
                    <img class="rounded-t-lg w-4/5 md:w-full h-96 object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/welcome/owijpg.jpg")}}" alt="" />
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
            <div class="w-full mt-8 md:mt-2 p-5 ">
                <div class="pl-4"><x-heading-welcome>Prestasi Terbaru</x-heading-welcome></div>
                <div class="w-full flex pl-4 flex-col md:flex-row lg:flex-col flex-wrap gap-2 md:gap-4">
                    <a href="#" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full md:w-[48%]  lg:w-full">
                        <img class="object-cover w-20 h-20 rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-700 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">12 Ags 2021</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full md:w-[48%]  lg:w-full">
                        <img class="object-cover w-20 h-20 rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-700 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">12 Ags 2021</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full md:w-[48%]  lg:w-full">
                        <img class="object-cover w-20 h-20 rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-700 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">12 Ags 2021</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full md:w-[48%]  lg:w-full">
                        <img class="object-cover w-20 h-20 rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-700 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">12 Ags 2021</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full md:w-[48%]  lg:w-full">
                        <img class="object-cover w-20 h-20 rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="{{asset("img/welcome/tentang.jpg")}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-700 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">12 Ags 2021</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- artikel dan sambutan end --}}




@endsection


@section("content")

@endsection
