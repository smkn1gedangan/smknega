@extends("frontend.layouts.main")

@section("title","Sejarah Smkn 1 Gedangan")

@section("content")
{{-- header start --}}
<section  class="relative ">
    <div class="w-full">
            <!-- Slide 1 -->
            <div class="swiper-slide object-cover" style="background: url({{asset("img/profil/static_gedung.jpg")}});">
                <div class="py-8 flex flex-col items-center justify-center px-4 h-screen mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative ">

                </div>
                <div class="bg-gradient-to-t from-slate-900 to-transparent dark:from-white w-full h-full absolute top-0 left-0 z-0"></div>
            </div>


    </div>

</section>
{{-- header end --}}

{{-- sejarah start --}}
<section class="w-full flex md:justify-center flex-wrap">
    <div class="flex flex-col w-full p-4 sm:w-5/6  md:w-4/5 md:items-center md:p-8 lg:w-3/5">
        <x-heading-profil class="w-full">sejarah sekolah</x-heading-profil>
        @if (file_exists(public_path('img/profil/' . $sejarah->photo)) && $sejarah->photo)
                <img class="w-11/12 sm:w-5/6 h-52 sm:h-64 lg:h-auto rounded-md object-cover my-5" src="{{ asset("img/profil/" . $sejarah->photo) }}" alt="">
                    @else
                        <div class="bg-gray-200 w-11/12 sm:w-5/6 h-52 sm:h-64 my-5">
                            <span>No Image</span> <!-- Pesan fallback -->
                        </div>
                    @endif

            <p class="mb-3 font-normal text-gray-800 dark:text-gray-400 mt-6">
                {!! $sejarah->konten !!}
            </p>
            <p class="mb-3 w-full text-left font-normal text-gray-800 dark:text-gray-400 mt-6">ditulis oleh {{$sejarah->penulis->name}}  {{$sejarah->created_at->diffForHumans()}}</p>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">
        <x-right-component-fe channelId="UCaW8arAuV0WMEJEzM1rZ1Nw" :articleTerbarus=$articleTerbarus :galeris=$galeris></x-right-component-fe>
    </div>
</section>
{{-- sejarah end --}}
@endsection
