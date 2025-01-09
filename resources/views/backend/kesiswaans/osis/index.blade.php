@extends("backend.layouts.main")

@section("title","Osis Smkn 1 Gedangan")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <div class="flex w-full justify-between items-center pt-4 ">
                <div class="w-3/4 ml-10">
                    <h3 class="text-3xl font-semibold dark:text-white">Osis Sekolah</h3>
                    <p class="mb-3 text-gray-800 dark:text-gray-400">seluruh data osis smkn 1 gedangan</p>
                </div>
                <a href="{{route("osisPhoto.create")}}" class="text-white mr-10 bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 shadow-md transition-all duration-200">Tambah osis</a>
            </div>

        </div>
        <div class="flex justify-center w-full">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama.</th>
                        <th scope="col" class="px-6 py-3">Jabatan.</th>
                        <th scope="col" class="px-6 py-3">Photo</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($osisPhotos as $osisPhoto)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $osisPhoto->nama }}</td>
                            <td class="px-6 py-4">{{ $osisPhoto->jabatan }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('img/osis/' . $osisPhoto->photo) }}" class="object-cover rounded-t-lg w-10 h-10 md:rounded-none md:rounded-s-lg" alt="{{ $osisPhoto->photo }}">
                            </td>
                            <td class="px-6 flex gap-2 py-4 justify-center">
                                <a href="{{ route('osisPhoto.edit', [Crypt::encrypt($osisPhoto->id)]) }}" class="text-yellow-500 hover:text-yellow-600  ml-4">Edit</a>
                                <form id="delete-form-{{ $osisPhoto->id }}" action="{{ route('osisPhoto.destroy', [Crypt::encrypt($osisPhoto->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete({{ $osisPhoto->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-5 w-3/4 pl-10">
            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$osis->konten!!}</div>
        </div>
            <div class="items-center ml-6 pb-6">

                <a href="{{ route('osis.edit', [Crypt::encrypt($osis->id)]) }}" class="bg-yellow-500 hover:bg-yellow-600 dark:text-yellow-500 ml-4 text-white py-2.5 px-4 rounded-md shadow-md transition-all duration-200">Edit Osis</a>
            </div>
        </div>
@endsection

@section("js")
<script>
    window.Laravel = {
        successMessage: @json(session('success')),
    };
    function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Photo Osis ini akan dihapus secara permanen!",
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
</script>
@endsection
