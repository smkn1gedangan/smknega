@extends("frontend.layouts.main")

@section("title","Pemetaan Organisasi Smkn 1 Gedangan")

@section("content")

{{-- pemetaan start --}}
<section class="w-full flex md:justify-center flex-wrap pt-20 md:pt-28">
    <div class="md:w-full p-2 flex flex-col items-center">

        @if (file_exists(public_path('img/pemetaan/' . $pemetaan->photo)) && $pemetaan->photo)
                <img class="w-11/12 sm:w-5/6 md:w-3/4 lg:w-4/5 h-auto rounded-md object-cover my-5 md:min-h-96" src="{{ asset("img/pemetaan/" . $pemetaan->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 my-5 h-96 grid place-content-center text-xs">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
        @endif
        <x-heading-profil class="w-full md:w-4/5">pemetaan kelulusan</x-heading-profil>
    </div>

    <div class="flex flex-col w-full p-2 sm:w-5/6 md:w-4/5 md:items-center md:p-8  lg:w-3/5">

            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="prose mb-3 text-gray-900 md:text-center dark:text-gray-400 mt-6 w-full">
                {!! $pemetaan->konten !!}
            </div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mb-3 w-full text-xs md:text-base text-left md:text-center font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$pemetaan->penulis->name}}  {{$pemetaan->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
</section>
{{-- pemetaan end --}}
@endsection
