@extends("frontend.layouts.main")

@section("title","kepsek Smkn 1 Gedangan")

@section("content")

{{-- kepsek start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3">kepala sekolah</x-heading-profil>
       </div>   
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <div class="relative">
                @if (file_exists(public_path('img/kepala_sekolah/' . $kepsek->photo)) && $kepsek->photo)
                <img class="rounded-t-lg w-4/5 md:w-full h-96 object-cover relative left-1/2 -translate-x-1/2" src="{{asset("img/kepala_sekolah/" . $kepsek->photo)}}" alt="" />
                <div style="box-shadow:inset 10px 10px 100px relative left-1/2 -translate-x-1/2 rgba(0, 0, 0, 0.6)" class=" dark:from-blue-900 w-4/5 h-full absolute top-0 left-0 z-0"></div>
            @else
                <div class="bg-gray-200 w-64 sm:w-96 h-96 relative left-1/2 -translate-x-1/2 grid place-content-center">
                    <span>No Image</span> <!-- Pesan fallback -->
                </div>
            @endif
    
            </div>
            <h5 class="mb-2 pt-3 md:pt-5 text-xl font-semibold tracking-tight text-gray-900 dark:text-white text-left">{{$kepsek->nama}}</h5>
            <div class="lg:first-letter:pl-16 mb-3 text-sm md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $kepsek->sambutan !!}
            </div>
        </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
    </div>
</section>
{{-- kepsek end --}}
@endsection
