@extends("backend.layouts.main")


@section("title","Link")

@section("content")
    <div id="main" class="main-content flex-1">
        <div class="flex w-full justify-between items-center pt-2">
            <x-titlepage title="data link" quote="link sosial media smkn 1 gedangan"></x-titlepage>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg flex flex-col items-center mt-10">
            <table class="w-full text-sm">
                <thead class="text-xs text-white uppercase bg-black ">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Facebook</th>
                        <th scope="col" class="px-6 py-3">Instagram</th>
                        <th scope="col" class="px-6 py-3">Tiktok</th>
                        <th scope="col" class="px-6 py-3">Website</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 text-center">1</td>
                        <td class="px-6 py-4">{{ $link->facebook }}</td>
                        <td class="px-6 py-4">{{ $link->instagram }}</td>
                        <td class="px-6 py-4">{{ $link->tiktok }}</td>
                        <td class="px-6 py-4">{{ $link->website }}</td>

                        <td class="px-6 flex gap-2 py-4 justify-center">
                            <div data-modal-target="u-link" data-modal-toggle="u-link" class="text-yellow-300 cursor-pointer">Edit</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
         {{-- update link --}}
         <div id="u-link" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed bg-black bg-opacity-50 top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Update Link Sosial Media
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="u-link">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" method="post" action="{{route("link.update", [Crypt::encrypt($link->id)])}}">
                            @csrf
                            @method("put")
                            <div>
                                <x-input-label value="Facebook"></x-input-label>
                                <x-text-input type="url" id="facebook" class="block mt-1 w-full" name="facebook" :value="old('facebook',$link->facebook)" required  />
                                <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                            </div>
                            <div>
                               <div>
                                <x-input-label value="Instagram"></x-input-label>
                                <x-text-input type="url" id="instagram" class="block mt-1 w-full" name="instagram" :value="old('instagram',$link->instagram)" required  />
                                <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                            </div>
                            </div>
                            <div>
                               <div>
                                <x-input-label value="Tiktok"></x-input-label>
                                <x-text-input type="url" id="tiktok" class="block mt-1 w-full" name="tiktok" :value="old('tiktok',$link->tiktok)" required  />
                                <x-input-error :messages="$errors->get('tiktok')" class="mt-2" />
                            </div>
                            </div>
                            <div>
                               <div>
                                <x-input-label value="Website"></x-input-label>
                                <x-text-input type="url" id="website" class="block mt-1 w-full" name="website" :value="old('website',$link->website)" required  />
                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                            </div>
                            </div>


                            <button type="submit" class="w-full text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Ubah Link</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>

        window.Laravel = {
            successMessage: @json(session('success'))
        };
    </script>
@endsection
