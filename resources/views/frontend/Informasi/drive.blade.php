@extends("frontend.layouts.main")

@section("title","Drive Smkn 1 Gedangan")

@section("content")

{{-- Drive start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3">Drive smkn 1 gedangan</x-heading-profil>
       </div>
    <div class="w-full flex justify-center flex-wrap">
        <div class="flex flex-col w-full p-2 lg:w-1/2">
           @foreach ($drives as $drive)
           <div class=" md:ml-10 mt-2">
                <div class="flex items-center gap-2 font-semibold">
                    <p>{{$loop->iteration}}.</p>
                    <h2 class="dark:text-white text-lg">{{$drive->judul}}</h2>
                </div>
               <a href="{{$drive->link}}" class="inline-flex items-center text-sm text-blue-600 dark:text-blue-500 hover:underline">
               {{$drive->link}}</a>
           </div>
           @endforeach
           <div class="flex justify-center w-5/6 mt-6">{{ $drives->links() }}</div>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
    </div>
</section>
{{-- sarana end --}}
@endsection
