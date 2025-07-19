@extends("backend.layouts.main")



@section("title","Link")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="Link" quote="tambah data drive di smkn 1 gedangan" isRoute="route" nameRoute="List drive" href="{{ route('drive.index') }}"></x-titlepage>
            <div class="p-4 md:p-5">
                <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("drive.store")}}">
                    @csrf
                          <div class="grid grid-cols-10 space-y-4">
                             <div class="col-span-6">
                                <x-input-label value="Judul"></x-input-label>
                                <x-text-input type="text" id="judul" class="block mt-1 w-full" name="judul" required  />
                                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                            </div>
                             <div class="col-span-6">
                                <x-input-label value="Link"></x-input-label>
                                <x-text-input type="url" id="link" class="block mt-1 w-full" name="link" required  />
                                <x-input-error :messages="$errors->get('link')" class="mt-2" />
                            </div>
                          </div>  
                          <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Link</button>
                        </form>
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