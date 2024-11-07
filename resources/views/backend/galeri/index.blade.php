@extends("backend.layouts.main")

@section("css")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .swal-height {
            padding: 0.4rem;
        }
    </style>
@endsection

@section("title","Galeri")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="w-3/4 ml-10">
                <h3 class="text-3xl font-bold dark:text-white">Data Galeri</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">Seluruh data Galeri Smkn 1 Gedangan</p>
            </div>
            <a href="{{route("galeri.create")}}" class="text-white mr-10 bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Galeri</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Judul</th>
                        <th scope="col" class="px-6 py-3">Photo</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeris as $galeri)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ Str::words($galeri->judul, 3, '...') }}</td>
                            <td class="px-6 py-4">{{ $galeri->photo }}</td>
                            <td class="px-6 flex gap-2 py-4 text-center">
                                <a href="{{ route('galeri.edit', [Crypt::encrypt($galeri->id)]) }}" class="text-orange-600 hover:text-orange-400 dark:text-blue-400 ml-4">Edit</a>
                                <form id="delete-form-{{ $galeri->id }}" action="{{ route('galeri.destroy', [Crypt::encrypt($galeri->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete({{ $galeri->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $galeris->links() }}</div>
        </div>
    </div>
@endsection

@section("js")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Galeri ini akan dihapus secara permanen!",
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
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
    </script>
@endsection
