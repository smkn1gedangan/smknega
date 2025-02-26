@extends("backend.layouts.main")



@section("title","  Progam Bisnis Sekolah")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard class="lowercase">edit data photo program bisnis</x-title-create-dashboard>
        <div class="w-full">
            <form id="form" action="{{ route('bisnisPhoto.update',[Crypt::encrypt($bisnis->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                @if (file_exists(public_path('img/bisnis/' . $bisnis->photo)) && $bisnis->photo)
                <p class="mt-3">Photo saat ini : </p>
                <img class="w-1/5  duration-700  rounded-md object-cover h-full" src="{{ asset("img/bisnis/" . $bisnis->photo) }}" alt="">
                @else
                <p class="mt-3">Photo saat ini : </p>
                <div class="bg-gray-200 w-1/5 h-52 grid place-content-center">
                <span>No Image</span> <!-- Pesan fallback -->
                </div>
                @endif
                <div class="mb-4 w-11/12">
                    <input class="mt-6 bg-white shadow-md w-2/5 rounded-md" type="file" name="photo" id="photo">

                </div>


                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:bg-yellow-500 focus:outline-none shadow-md transition-all duration-200">
                        Ubah Photo
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
