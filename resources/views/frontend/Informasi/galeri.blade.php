@extends("frontend.layouts.main")

@section("title","guru Smkn 1 Gedangan")


@section("content")


<section class="w-full flex flex-col md:items-center flex-wrap ">
    <div class="w-full flex justify-center mb-8 pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3 lg:w-2/3">galeri galeri</x-heading-profil>
    </div>
 
    <div class="md:max-w-[95%] grid grid-cols-2 md:grid-cols-3 gap-4">
       @foreach ($galeris as $galeri)
        <div class="border border-gray-100">
            @if (file_exists(public_path('img/galeri/' . $galeri->photo)) && $galeri->photo)
                <img class="h-auto max-w-full rounded-lg" src="{{ asset("img/galeri/" . $galeri->photo) }}" alt="">
            @else
                <div class="w-96 text-xs md:text-sm grid place-content-center text-slate-800 bg-gray-200 h-64">
                    <span>No Image</span> <!-- Pesan fallback -->
                </div>
            @endif
        </div>
       @endforeach
       
    </div>
</section>

@endsection
