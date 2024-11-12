@extends("frontend.layouts.main")

@section("title","Sejarah Smkn 1 Gedangan")

@section("content")

{{-- logo start --}}
<section class="w-full flex md:justify-center flex-wrap pt-32">
    <div class="flex flex-col w-full p-4 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">
        <x-heading-profil class="w-full">logo sekolah</x-heading-profil>
        @if (file_exists(public_path('img/profil/' . $logo->photo)) && $logo->photo)
                <img class="w-11/12 sm:w-5/6 h-52 sm:h-64 lg:h-auto rounded-md object-cover my-5" src="{{ asset("img/profil/" . $logo->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $logo->konten !!}
            </p>
            <p class="mb-3 w-full text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$logo->penulis->name}}  {{$logo->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe :articleTerbarus=$articleTerbarus :galeris=$galeris></x-right-component-fe>
    </div>
</section>
{{-- logo end --}}
@endsection
