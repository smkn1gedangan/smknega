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
    <div id="main" class="w-full flex flex-col bg-gray-100 p-10">
        <h1 class="text-xl font-semibold text-slate-800">{{$article->title}}</h1>
        <div class="my-5 w-3/4">

             @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                            <img src="{{ asset('img/articles_images/' . $article->image) }}" class="object-cover w-full rounded-t-lg h-40 md:h-auto md:w-4/5 md:rounded-none md:rounded-s-lg" alt="{{ $article->title }}">
            @else
                            <div class="w-full bg-gray-200 h-64 md:w-4/5 grid place-content-center">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
            @endif

            <div class="prose mb-3 text-gray-900 dark:text-gray-400 mt-6">{!!$article->text_content!!}</div>
            <div class="flex justify-between mt-4">
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400">ditulis oleh {{ $article->writer->name}}</p>
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> {{ $article->created_at->diffForHumans()}}</p>
            </div>

            <p class="mt-1 text-sm text-right font-normal text-gray-700 dark:text-gray-400">dilihat {{ $article->view}} kali</p>
        </div>
        <div class="w-3/4 flex justify-start gap-2 items-center">
            <a href="{{ route('artikel.show', [Crypt::encrypt($article->id)]) }}" class="bg-blue-600 hover:bg-blue-900 transition-all duration-200 dark:text-blue-400 text-white py-2.5 px-4 rounded-md">Show</a>
            <a href="{{ route('artikel.edit', [Crypt::encrypt($article->id)]) }}" class="bg-yellow-500 transition-all duration-200 hover:bg-orange-400 dark:text-blue-400 ml-4 text-white py-2.5 px-4 rounded-md">Edit</a>
            <form id="delete-form-{{ $article->id }}" action="{{ route('artikel.destroy', [Crypt::encrypt($article->id)]) }}" method="POST" class="inline">
                @csrf
                @method('delete')
                <button type="button" onclick="confirmDelete({{ $article->id }})" class="bg-red-600 hover:bg-red-900 transition-all duration-200 dark:text-red-400 ml-4 text-white py-2.5 px-4 rounded-md">
                    Delete
                </button>
            </form>
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
    </script>
@endsection
