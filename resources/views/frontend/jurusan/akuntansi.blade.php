@extends("frontend.layouts.main")

@section("title","Jurusan Akuntansi Smkn 1 Gedangan")

@section("content")

{{-- akuntansi start --}}
<section class="w-full flex justify-center flex-wrap pt-20 md:pt-28">
    <div class="w-full lg:w-full p-2 flex flex-col items-center">

        @if (file_exists(public_path('storage/' . $akuntansi->photo)) && $akuntansi->photo)
        <img src="{{ asset("storage/" . $akuntansi->photo) }}" class="relative my-5 object-cover object-center rounded-md w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-auto"/>
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-64 md:h-96 my-5 grid place-content-center text-xs">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">{{ $akuntansi->judul }}</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-2 sm:w-5/6 md:items-center md:p-3 lg:w-3/5">
        <div class="w-full flex flex-wrap justify-center gap-2 ">
            @if (file_exists(public_path('storage/' . $akuntansi->photo_kaprog)) && $akuntansi->photo_kaprog)
            <img src="{{ asset('storage/' . $akuntansi->photo_kaprog) }}" class="object-cover w-64 sm:w-64 md:w-52 rounded-t-lg md:rounded-s-lg mt-8" alt="{{ $akuntansi->photo_kaprog }}">
            @else
                <div class="w-64 sm:w-64 md:w-52 mt-8 bg-gray-200 grid place-content-center h-72">
                    <span>No Image</span> <!-- Pesan fallback -->
                </div>
            @endif
            <div class="flex flex-col justify-center mx-4">
                <h1 class="text-base text-center md:text-left font-bold mt-2 text-gray-800 dark:text-gray-100 capitalize">{{$akuntansi->nama_kaprog}}</h1>
                <p class="text-center md:text-left">sebagai</p>
                <h1 class="text-base text-center md:text-left mb-2 text-gray-800 dark:text-gray-100 capitalize">{{$akuntansi->ket_kaprog}}</h1>
            </div>
        </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6 w-full">
                {!! $akuntansi->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left md:text-center font-normal text-gray-800 dark:text-gray-400 mt-2">ditulis oleh {{$akuntansi->penulis->name}}  {{$akuntansi->updated_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- akuntansi end --}}
@endsection
