@extends("backend.layouts.main")



@section("title","Photo Ekstrakulikuler")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="photo ekstrakulikuler" quote="data photo ekstrakulikuler yang ada di smkn 1 gedangan" isRoute="true" nameRoute="list photo" href="{{ route('ekstrakulikuler.index') }}"></x-titlepage>
        <div class="w-full p-5">
            <form id="form" action="{{ route('ekstraPhoto.store')}}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-12">
                    <div class="col-span-6">
                            <x-input-label value="Photo"></x-input-label>
                            <x-text-input type="file" id="photo" class="block mt-1 border border-black w-full" name="photo" required  />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>
                </div>
                <!--Tombol Submit -->
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
