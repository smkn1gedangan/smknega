@extends("frontend.layouts.main")

@section("title","Rencana Smkn 1 Gedangan")

@section("content")

{{-- rencana start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-11/12 md:w-2/3">rencana pengembangan</x-heading-profil>
       </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-2 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full">
                {!! $rencana->konten !!}
            </div>
            <p  data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left font-normal text-gray-800 dark:text-gray-400 mt-3">ditulis oleh {{$rencana->penulis->name}}  {{$rencana->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
    </div>
</section>
{{-- rencana end --}}
@endsection
