@extends("backend.layouts.main")

@section("css")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .swal-height {
            padding: 0.4rem;
        }
    </style>
@endsection

@section("title","Artikel")

@section("content")
    <div id="main" class="main-content flex-1 bg-gray-100 md:pt-20 md:pl-6 md:mt-2">
        <div class="flex w-full justify-between items-center pt-4 ">
            <h3 class="text-3xl font-semibold dark:text-white">data artikel {{$article->title}}</h3>
        </div>
        <div class="my-5 w-3/4">

             @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                            <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-full rounded-t-lg h-40 md:h-52 md:w-52 md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">
            @else
                            <div class="w-full bg-gray-200 h-52 md:w-52">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
            @endif
            <p class="mt-5 text-slate-800">teks konten : {!!$article->text_content!!}</p>
            <div class="flex justify-between mt-4">
                <p class="font-normal text-gray-700 dark:text-gray-400">ditulis oleh {{ $article->writer->name}}</p>
                <p class="font-normal relative text-gray-700 dark:text-gray-400"> {{ $article->created_at->diffForHumans()}}</p>
            </div>
            <p class="mt-1 text-sm text-right font-normal relative text-gray-700 dark:text-gray-400">dilihat {{ $article->view}} kali</p>
        </div>
        <div class="w-3/4 flex justify-start gap-2 items-center">
            <a href="{{ route('artikel.show', [Crypt::encrypt($article->id)]) }}" class="bg-blue-600 hover:bg-blue-900 dark:text-blue-400 text-white py-2.5 px-4 rounded-md">Show</a>
            <a href="{{ route('artikel.edit', [Crypt::encrypt($article->id)]) }}" class="bg-yellow-500 hover:bg-orange-400 dark:text-blue-400 ml-4 text-white py-2.5 px-4 rounded-md">Edit</a>
            <form id="delete-form-{{ $article->id }}" action="{{ route('artikel.destroy', [Crypt::encrypt($article->id)]) }}" method="POST" class="inline">
                @csrf
                @method('delete')
                <button type="button" onclick="confirmDelete({{ $article->id }})" class="bg-red-600 hover:bg-red-900 dark:text-red-400 ml-4 text-white py-2.5 px-4 rounded-md">
                    Delete
                </button>
            </form>
        </div>

    </div>
@endsection

@section("js")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
