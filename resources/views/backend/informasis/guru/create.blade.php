@extends("backend.layouts.main")



@section("title","Guru")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="Guru guru" quote="tambah data guru di smkn 1 gedangan" isRoute="route" nameRoute="List Guru" href="{{ route('guru.index') }}"></x-titlepage>
            <div class="p-4 md:p-5">
                <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("guru.store")}}">
                    @csrf
                          <div class="grid grid-cols-10 space-y-4">
                             <div class="col-span-6">
                                <x-input-label value="Nama"></x-input-label>
                                <x-text-input type="text" id="nama" class="block mt-1 w-full" name="nama" required  />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                             <div class="col-span-6">
                                <x-input-label value="Tugas"></x-input-label>
                                <x-text-input type="text" id="tugas" class="block mt-1 w-full" name="tugas" required  />
                                <x-input-error :messages="$errors->get('tugas')" class="mt-2" />
                            </div>
                             <div class="col-span-6">
                                <x-input-label value="Photo"></x-input-label>
                                <x-text-input type="file" id="photo" class="block mt-1 border border-black w-full" name="photo" required  />
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            </div>

                          </div>  
                          <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Guru</button>
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