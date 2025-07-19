<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="shortcut icon" href="{{asset("img/static_icon.png")}}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    <style>
        .swal-height {
            padding: 0.4rem;
        }
        .ql-align-center {
            text-align: center;
        }
        .ql-align-right {
            text-align: right;
        }

    </style>
    @yield("css")

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body x-data="{isSidebarOpen : true}" class="font-sans leading-normal tracking-normal">

<header class="bg-gray-300">
    @include("backend.layouts.header")
    <button type="button" class="" @click="isSidebarOpen = !isSidebarOpen">
    <span x-show="isSidebarOpen" x-cloak class="my-4">Close</span>
    <span x-show="!isSidebarOpen" x-cloak class="my-4">
        Open
    </span>
</button>
</header>


<main>

    <div class="flex overflow-x-auto" >
        <div class="min-h-screen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-show="isSidebarOpen">
            @include("backend.layouts.sidebar")
        </div>
        <div class="bg-white p-2 flex-1">
            @yield("content")
        </div>
    </div>
</main>




@yield("js")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
