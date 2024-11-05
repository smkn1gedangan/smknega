@extends("backend.layouts.main")

@section("title","Artikel")

@section("content")
    <div div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <div class="flex w-full justify-between items-center pt-4 md:pt-20 md:pl-6">
            <div class="w-3/4">               
                <h3 class="text-3xl font-bold dark:text-white">Data Artikel</h3>
                <p class="mb-3 text-gray-800 dark:text-gray-400">Seluruh data Artikel Smkn 1 Gedangan</p>
            </div>
            <div class="flex"><button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Artikel</button></div>
            <div>   

            </div>
        </div>
    </div>
@endsection