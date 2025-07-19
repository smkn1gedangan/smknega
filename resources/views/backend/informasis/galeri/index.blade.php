@extends("backend.layouts.main")

@section("title","Galeri")

@section("content")
    <div id="main" class="main-content relative flex-1">
        <x-titlepage
            title="Data Galeri"
            quote="seluruh data galeri photo smkn 1 gedangan"
            :isRoute="true"
            nameRoute="Tambah Galeri"
            href="{{ route('galeri.create') }}"
        />
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10 p-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-white uppercase bg-black">
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
                            <td class="px-6 py-4"><img src="{{ asset('storage/' . $galeri->photo) }}" class="object-cover w-10 rounded-sm" alt="{{ $galeri->photo }}"></td>
                            <td class="px-6 flex gap-2 py-4 justify-center">
                              
                                <form id="delete-form-{{ $galeri->id }}" action="{{ route('galeri.destroy', [Crypt::encrypt($galeri->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $galeri->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
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
    <script>
        function confirmDelete(galeriId) {
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
                    document.getElementById(`delete-form-${galeriId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>
@endsection