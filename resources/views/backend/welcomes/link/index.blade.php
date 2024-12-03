@extends("backend.layouts.main")


@section("title","Link")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-bold dark:text-white">Data Link</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">Seluruh data link sosial media Smkn 1 Gedangan</p>
            </div>

        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center">1</td>
                        <td class="px-6 py-4">{{ $link->facebook }}</td>
                        <td class="px-6 py-4">{{ $link->instagram }}</td>
                        <td class="px-6 py-4">{{ $link->tiktok }}</td>
                        <td class="px-6 py-4">{{ $link->website }}</td>

                        <td class="px-6 flex gap-2 py-4 justify-center">
                            <a href="{{ route('link.edit', [Crypt::encrypt($link->id)]) }}" class="text-orange-300 hover:text-orange-400 dark:text-blue-400 ml-4">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
