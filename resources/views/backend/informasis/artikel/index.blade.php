@extends("backend.layouts.main")

@section("css")
 <style>
     .swal-height {
            padding: 0.4rem;
        }
 </style>
@endsection

@section("title","Artikel")

@section("content")
    <div id="main" class="main-content flex-1">
        <x-titlepage
            title="Data Artikel"
            quote="seluruh data artikel smkn 1 gedangan"
            :isRoute="true"
            nameRoute="Tambah Artikel"
            href="{{ route('artikel.create') }}"
        />
         <form route="{{route("artikel.index")}}">
                    <div class="flex items-center">
                        <x-text-input type="search" name="title" placeholder="Cari berdasarkan judul" :value="old('title',$judul)" class="w-full"></x-text-input>
                        <button type="submit" class="shadow-lg px-2.5 py-3 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg transition-all duration-300 hover:bg-blue-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Cari</span>
                        </button>
                    </div>
            </form>
             <form class="w-full p-5 space-y-5" action="{{route("artikel.index")}}" method="get">
                    @foreach ($kategoris as $kategori)
                    <div class="flex items-center">
                        <input id="checkbox-item-3"
                        @if(!request()->has('kategori_id')) checked @elseif(in_array($kategori->id, request()->input('kategori_id', []))) checked @endif
                         type="checkbox" name="kategori_id[]" value="{{$kategori->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$kategori->nama}}</label>
                        </div>
                    @endforeach
                    <button class="text-white mr-10 mt-8 bg-blue-600 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition-all duration-200" onclick="submit">Cari Berdasarkan Kategori</button>
                </form>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex flex-col items-center mt-10">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Judul</th>
                        <th scope="col" class="px-6 py-3">Paragraf Utama</th>
                        <th scope="col" class="px-6 py-3">Dilihat</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ Str::words($article->title, 3, '...') }}</td>
                            <td class="px-6 py-4">{{ Str::words(strip_tags($article->text_content), 3, '...') }}</td>
                            <td class="px-6 py-4">{{ $article->view }} kali</td>
                            <td class="px-6 py-4">
                                @foreach ($article->kategoris as $kategori)
                                    {{ $kategori->nama }}
                                @endforeach
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('artikel.show', [Crypt::encrypt($article->id)]) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400">Show</a>
                                <a href="{{ route('artikel.edit', [Crypt::encrypt($article->id)]) }}" class="text-orange-600 hover:text-orange-400 dark:text-blue-400 ml-4">Edit</a>
                                <form id="delete-form-{{ $article->id }}" action="{{ route('artikel.destroy', [Crypt::encrypt($article->id)]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="confirmDelete('{{ $article->id }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 ml-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-10 pb-4">{{ $articles->links() }}</div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data artikel ini akan dihapus secara permanen!",
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
