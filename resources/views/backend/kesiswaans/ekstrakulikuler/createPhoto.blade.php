@extends("backend.layouts.main")



@section("title","Ekstrakulikuler Sekolah")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard class="lowercase">Tambah data photo Esktrakulikuler</x-title-create-dashboard>
        <div class="w-full">
            <form id="form" action="{{ route('ekstraPhoto.store')}}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-4 w-11/12">

                    <input class="mt-6 rounded-md" type="file" name="photo" id="photo">

                </div>


                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
                        tambah Photo
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
