@extends("frontend.layouts.main")

@section("title","Jurusan Sija Smkn 1 Gedangan")

@section("content")

{{-- sija start --}}
<section class="w-full flex md:justify-center flex-wrap pt-32">
    <div class="md:w-full p-2 flex flex-col items-center">
        
        @if (file_exists(public_path('img/jurusan/' . $sija->photo)) && $sija->photo)
                <img class="w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-52 sm:h-64 md:h-auto rounded-md object-cover my-5" src="{{ asset("img/profil/" . $sija->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">{{ $sija->judul }}</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-4 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">
       
            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $sija->konten !!}
            </p>
            <p class="mb-3 w-full text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$sija->penulis->name}}  {{$sija->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe :articleTerbarus=$articleTerbarus :galeris=$galeris></x-right-component-fe>
    </div>
</section>
{{-- sija end --}}
@endsection
