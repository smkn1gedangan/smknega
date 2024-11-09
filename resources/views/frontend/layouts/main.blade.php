<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .bg-blue-scrolled {
        background-color: white; /* Warna biru */
        transition: background-color 0.3s ease;
        border-bottom: 1px solid gray;
        color: #111827;
    }
    </style>
   @yield("css")
</head>
<body class="relative w-full">


{{-- navbar start --}}
@include("frontend.layouts.navbar")
{{-- navbar end --}}

@yield("content")
<div onclick=" window.scrollTo({top:0,behavior:'smooth'})" class="bg-blue-700 rounded-full w-8 h-8 fixed bottom-10 right-4 grid place-content-center">
    <i class="fas fa-arrow-up text-white"></i>

</div>

@include("frontend.layouts.contact")
@include("frontend.layouts.footer")

</body>
@yield("js")
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-blue-scrolled');
            } else {
                navbar.classList.remove('bg-blue-scrolled');
            }
        });
    });
</script>
</html>
