@extends("backend.layouts.main")


@section("title","Waka")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-semibold dark:text-white">Data Waka</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">seluruh data Waka smkn 1 gedangan</p>
            </div>
            <a href="{{route("waka.create")}}" class="text-white mr-10 bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 shadow-md transition-all duration-200">Tambah Waka</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10">

            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <th scope="col" class="px-6 py-3">Photo</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wakas as $waka)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ Str::words($waka->nama, 3, '...') }}</td>
                            <td class="px-6 py-4">{{ $waka->jabatan }}</td>
                            <td class="px-6 py-4">
                                @if (file_exists(public_path('img/waka/' . $waka->photo)) && $waka->photo)
                                <img class="w-10 rounded-md object-cover h-10" src="{{ asset("img/waka/" . $waka->photo) }}" alt="">
                                @else
                                <div class="bg-gray-200 w-10 h-10 grid place-content-center">
                                </div>
                                @endif
                            </td>
                            <td class="px-6 flex gap-2 py-4 justify-evenly">
                                <a href="{{ route('waka.edit', [Crypt::encrypt($waka->id)]) }}" class="text-yellow-500 hover:text-yellow-600 transition-all duration-200 dark:text-yellow-400 ml-4">Edit</a>
                                <form id="delete-form-{{ $waka->id }}" action="{{ route('waka.destroy', [Crypt::encrypt($waka->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete({{ $waka->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $wakas->links() }}</div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data waka ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak , Batal',
                width: '550px',
                customClass: {
                    popup: 'swal-height'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${articleId}`).submit();
                }
            });
        }
        window.Laravel = {
        successMessage: @json(session('success')),
    };
    </script>
@endsection
