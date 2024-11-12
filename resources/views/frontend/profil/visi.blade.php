@extends("frontend.layouts.main")

@section("title","Visi Misi Smkn 1 Gedangan")


@section("content")

{{-- potensi start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
   <div class="flex justify-center pt-20 md:pt-28">
    <x-heading-profil class="w-5/6 md:w-2/3 lg:w-2/3">visi misi sekolah</x-heading-profil>
   </div>
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 md:w-4/5 md:items-center md:p-8 lg:w-3/5">
            <p class="mb-3 text-center md:text-left font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $visiMisi->konten !!}
            </p>
            <p class="mb-3 w-full text-center md:text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$visiMisi->penulis->name}}  {{$visiMisi->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe :articleTerbarus=$articleTerbarus :galeris=$galeris></x-right-component-fe>
    </div>
    </div>
</section>
{{-- sejarah end --}}
@endsection
