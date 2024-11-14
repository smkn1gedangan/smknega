@extends("frontend.layouts.main")

@section("title","Jurusan Akuntansi Smkn 1 Gedangan")

@section("content")

{{-- akuntansi start --}}
<section class="w-full flex md:justify-center flex-wrap pt-32">
    <div class="md:w-full p-2 flex flex-col items-center">
        
        @if (file_exists(public_path('img/jurusan/' . $akuntansi->photo)) && $akuntansi->photo)
                <img class="w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-52 sm:h-64 md:h-auto rounded-md object-cover my-5" src="{{ asset("img/profil/" . $akuntansi->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">{{ $akuntansi->judul }}</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-4 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">
       
            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $akuntansi->konten !!}
            </p>
            <p class="mb-3 w-full text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$akuntansi->penulis->name}}  {{$akuntansi->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe :articleTerbarus=$articleTerbarus :galeris=$galeris></x-right-component-fe>
    </div>
</section>
{{-- akuntansi end --}}
@endsection
