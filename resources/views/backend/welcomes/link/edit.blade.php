@extends("backend.layouts.main")



@section("title","Link")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <x-title-create-dashboard>edit data link sosmed Smkn 1 Gedangan</x-title-create-dashboard>
        <div class="w-full">
            <form action="{{ route('link.update',[Crypt::encrypt($link->id)]) }}" class="mt-4 w-full flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="w-11/12 ">
                    <div class="mb-4 w-2/5">
                        <label for="facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-300">facebook</label>
                        <input type="text" name="facebook" id="facebook" value="{{old("facebook",$link->facebook)}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("facebook")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4 w-2/5">
                        <label for="instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram</label>
                        <input type="text" name="instagram" id="instagram" value="{{old("instagram",$link->instagram)}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("instagram")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4 w-2/5">
                        <label for="tiktok" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tiktok</label>
                        <input type="text" name="tiktok" id="tiktok" value="{{old("tiktok",$link->tiktok)}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("tiktok")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-4 w-2/5">
                        <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website</label>
                        <input type="text" name="website" id="website" value="{{old("website",$link->website)}}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-500 focus:outline-none "
                               >
                        @error("website")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>



                <!-- Tombol Submit -->
                <div class="w-11/12 mt-4 mb-8">
                    <button type="submit"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:bg-blue-700 focus:outline-none">
                        Ubah Data Link
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection

