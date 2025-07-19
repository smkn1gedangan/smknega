@extends("backend.layouts.main")


@section("title","Link")

@section("content")
<div id="main" class="main-content relative flex-1">
        <x-titlepage title="link" quote="data link drive di smkn 1 gedangan" isRoute="route" nameRoute="Tambah link" href="{{ route('drive.create') }}"></x-titlepage>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10 p-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 text-center py-3">No.</th>
                        <th scope="col" class="px-6 text-center py-3">Judul</th>
                        <th scope="col" class="px-6 text-center py-3">Link</th>
                        <th scope="col" class="px-6 text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drives as $link)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 text-center py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 text-center py-4">{{ $link->judul }}</td>
                            <td class="px-6 text-center py-4">{{ $link->link }}</td>
                            <td class="px-6 text-center flex gap-2 py-4 justify-center">
                                <form id="delete-form-{{ $link->id }}" action="{{ route('drive.destroy', [Crypt::encrypt($link->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $link->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $drives->links() }}</div>
        </div>

    </div>
@endsection

@section("js")
    <script>
        function confirmDelete(linkId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data link ini akan dihapus secara permanen!",
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
                    document.getElementById(`delete-form-${linkId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
    </script>
@endsection
