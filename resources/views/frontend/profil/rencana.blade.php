@extends("frontend.layouts.main")

@section("title","Rencana Smkn 1 Gedangan")

@section("content")

{{-- potensi start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
   <div class="text-center pt-20 md:pt-28">
        <x-heading-welcome classAdventage="">Rencana pengembangan sekolah</x-heading-welcome>
   </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 sm:w-4/5 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <p class="mb-3 text-center sm:text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $rencana->konten !!}
            </p>
            <p class="mb-3 w-full text-center sm:text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$rencana->penulis->name}}  {{$rencana->created_at->diffForHumans()}}</p>
    </div>
    <x-right-component-fe :articleTerbarus=$articleTerbarus :galeris=$galeris></x-right-component-fe>
    </div>
</section>
{{-- sejarah end --}}
@endsection
