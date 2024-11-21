@extends("frontend.layouts.main")

@section("title","Program Kerja Smkn 1 Gedangan")

@section("content")

{{-- programKerja start --}}
<section class="w-full flex flex-col md:justify-center flex-wrap">
    <div class="flex justify-center pt-20 md:pt-28">
        <x-heading-profil class="w-5/6 md:w-2/3">prestasi</x-heading-profil>
       </div>
      
    <div class="w-full flex md:justify-center flex-wrap">
        <div class="flex flex-col w-full p-4 md:w-4/5 md:items-center md:p-8 md:mt-6 lg:w-3/5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold text-gray-900">
                            nama
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold text-gray-900">
                            juara
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold text-gray-900">
                            tingkat
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold text-gray-900">
                            penyelenggara
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($prestasis as $prestasi)
                   <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4 font-semibold">
                       {{ $prestasi->nama }}
                    </td>
                    <td class="px-6 py-4">
                       {{ $prestasi->juara }}
                    </td>
                    <td class="px-6 py-4">
                       {{ $prestasi->tingkat }}
                    </td>
                    <td class="px-6 py-4">
                       {{$prestasi->penyelenggara}}
                    </td>
                </tr>
                   @endforeach
                </tbody>
            </table>
            <div class="mt-6">{{ $prestasis->links() }}</div>
    </div>
    <div class="w-full lg:w-[37%] p-4 gap-4 flex flex-wrap lg:flex-col">

        <x-right-component-fe></x-right-component-fe>
    </div>
    </div>
</section>
{{-- programKerja end --}}
@endsection
