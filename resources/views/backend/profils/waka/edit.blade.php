@extends("backend.layouts.main")



@section("title","Waka")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="data waka" quote="ubah data waka di smkn 1 gedangan" isRoute="route" nameRoute="List waka" href="{{ route('waka.index') }}"></x-titlepage>
            <div class="p-4 md:p-5">
                <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("waka.update",Crypt::encrypt($waka->id))}}">
                    @csrf
                    @method("PUT")
                          <div class="grid grid-cols-10 space-y-4">
                             <div class="col-span-6">
                                <x-input-label value="Nama"></x-input-label>
                                <x-text-input type="text" id="nama" :value="old('nama',$waka->nama)" class="block mt-1 w-full" name="nama" required  />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                             <div class="col-span-6">
                                <x-input-label value="Jabatan"></x-input-label>
                                <x-text-input type="text" id="jabatan" :value="old('jabatan',$waka->jabatan)" class="block mt-1 w-full" name="jabatan" required  />
                                <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                            </div>
                             <div class="col-span-6">
                                <x-input-label value="Photo"></x-input-label>
                                <x-text-input type="file" id="photo" class="block mt-1 border border-black w-full" name="photo"   />
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                @if (file_exists(public_path('storage/' . $waka->photo)) && $waka->photo)
                                <p class="mt-3">Photo saat ini : </p>
                                <img class="w-40  duration-700  rounded-md object-cover h-auto" src="{{ asset("storage/" . $waka->photo) }}" alt="">
                                @else
                                <p class="mt-3">Photo saat ini : </p>
                                <div class="bg-gray-200 w-40 h-52 grid place-content-center">
                                <span>No Image</span> <!-- Pesan fallback -->
                                </div>
                                @endif
                            </div>

                          </div>  
                          <button type="submit" class=" text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Ubah waka</button>
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
