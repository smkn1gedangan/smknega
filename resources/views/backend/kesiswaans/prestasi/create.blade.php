@extends("backend.layouts.main")



@section("title","Prestasi")

@section("content")
    <div id="main" class="main-content flex-1 ">
        <x-titlepage title="prestasi prestasi" quote="tambah data prestasi di smkn 1 gedangan" isRoute="route" nameRoute="List prestasi" href="{{ route(name: 'prestasi.index') }}"></x-titlepage>
            <div class="p-4 md:p-5">
                <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{route("prestasi.store")}}">
                    @csrf
                          <div class="grid grid-cols-12 space-y-4 gap-2">
                             <div class="col-span-7">
                                <x-input-label value="Nama"></x-input-label>
                                <x-text-input type="text" id="nama" :value="old('nama')" class="block mt-1 w-full" name="nama" required  />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                             <div class="col-span-7">
                                <x-input-label value="Juara"></x-input-label>
                                <x-text-input type="text" id="juara" :value="old('juara')" class="block mt-1 w-full" name="juara" required  />
                                <x-input-error :messages="$errors->get('juara')" class="mt-2" />
                            </div>
                             <div class="col-span-7">
                                <x-input-label value="Tingkat"></x-input-label>
                                <x-text-input type="text" id="tingkat" :value="old('tingkat')" class="block mt-1 w-full" name="tingkat" required  />
                                <x-input-error :messages="$errors->get('tingkat')" class="mt-2" />
                            </div>
                             <div class="col-span-7">
                                <x-input-label value="Penyelenggara"></x-input-label>
                                <x-text-input type="text" id="penyelenggara" :value="old('penyelenggara')" class="block mt-1 w-full" name="penyelenggara" required  />
                                <x-input-error :messages="$errors->get('penyelenggara')" class="mt-2" />
                            </div>
                          </div>  
                          <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah Data Prestasi</button>
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
