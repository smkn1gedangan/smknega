@extends("backend.layouts.main")


@section("title","Komite")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="Komite komite" quote="ubah data komite smkn 1 gedangan" isRoute="true" nameRoute="List Komite" href="{{ route('komite.index') }}"></x-titlepage>
         <div class="p-4 md:p-5">
                        <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("komite.update", [Crypt::encrypt($komite->id)])}}">
                            @csrf
                            @method("put")
                            <div class="grid grid-cols-12 space-y-4">
                                <div class="col-span-10">
                                    <x-input-label value="Nama"></x-input-label>
                                    <x-text-input type="text" id="nama" class="block mt-1 w-full" name="nama" :value="old('nama',$komite->nama)" required  />
                                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                </div>
                                <div class="col-span-10">
                                    <x-input-label value="Jabatan"></x-input-label>
                                    <x-text-input type="text" id="jabatan" class="block mt-1 w-full" name="jabatan" :value="old('jabatan',$komite->jabatan)" required  />
                                    <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                                </div>
                                <div class="mb-4 col-span-10">
                                    <x-input-label value="Photo"></x-input-label>
                                    <x-text-input type="file" id="photo" class="block mt-1 w-full border border-black" name="photo" :value="old('photo',$komite->photo)"  />
                                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                    @if (file_exists(public_path('storage/' . $komite->photo)) && $komite->photo)
                                        <p class="mt-3">Photo saat ini : </p>
                                        <img class="w-40  duration-700  rounded-md object-cover h-auto" src="{{ asset("storage/" . $komite->photo) }}" alt="">
                                    @else
                                        <p class="mt-3">Photo saat ini : </p>
                                        <div class="bg-gray-200 w-40 h-52 grid place-content-center text-xs">
                                            <span>No Image</span> <!-- Pesan fallback -->
                                        </div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="col-span-6">
                                <button type="submit" class=" text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Ubah Data Komite</button>
                            </div>

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
