@extends("backend.layouts.main")


@section("title","Prestasi")

@section("content")
<div id="main" class="main-content relative flex-1">
        <x-titlepage title="prestasi prestasi" quote="data prestasi siswa/siswi smkn 1 gedangan" isRoute="route" nameRoute="Tambah prestasi" href="{{ route('prestasi.create') }}"></x-titlepage>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10 p-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">No.</th>
                        <th scope="col" class="px-6 text-center py-3">Nama</th>
                        <th scope="col" class="px-6 text-center py-3">Juara</th>
                        <th scope="col" class="px-6 text-center py-3">Tingkat</th>
                        <th scope="col" class="px-6 text-center py-3">Penyelenggara</th>
                        <th scope="col" class="px-6 text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestasis as $prestasi)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 text-center py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 text-center py-4">{{ Str::words($prestasi->nama, 3, '...') }}</td>
                            <td class="px-6 text-center py-4">{{ $prestasi->juara }}</td>
                            <td class="px-6 text-center py-4">{{ $prestasi->tingkat }}</td>
                            <td class="px-6 text-center py-4">{{ $prestasi->penyelenggara }}</td>
                           
                            <td class="px-6 text-center flex gap-2 py-4 justify-center">
                                <a href="{{ route('prestasi.edit', [Crypt::encrypt($prestasi->id)]) }}" class="text-yellow-500 hover:text-yellow-600 dark:text-blue-400 ml-4">Edit</a>
                                <form id="delete-form-{{ $prestasi->id }}" action="{{ route('prestasi.destroy', [Crypt::encrypt($prestasi->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $prestasi->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $prestasis->links() }}</div>
        </div>

    </div>
@endsection

@section("js")
    <script>
        function confirmDelete(prestasiId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data prestasi ini akan dihapus secara permanen!",
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
                    document.getElementById(`delete-form-${prestasiId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>
@endsection
