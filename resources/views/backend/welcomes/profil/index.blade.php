@extends("backend.layouts.main")

@section("css")

@endsection

@section("title","Profil")

@section("content")
    <div id="main" class="main-content flex-1">
        <div class="flex w-full justify-between items-center pt-4 ">
            <x-titlepage quote="profil smkn 1 gedangan" title="Data Profil"></x-titlepage>
        </div>
        <div class="w-3/4 p-5">
                @if ($profil->photo && file_exists(public_path('storage/' . $profil->photo)))
                    <img src="{{ asset('storage/' . $profil->photo) }}"
                        class="object-cover w-72 h-auto">
                @else
                    <div class="w-full bg-gray-200 h-40 md:w-80 flex items-center justify-center">
                        <span>No Image</span>
                    </div>
                @endif

                <div class="prose text-gray-900 dark:text-gray-400 mt-6">{!! $profil->konten !!}</div>
            </div>
        
            <div class="items-center mb-6">

                <a href="{{ route('profil.edit', [Crypt::encrypt($profil->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-400 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Profil</a>
            </div>
        </div>
@endsection

@section("js")
    <script>
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>

@endsection
