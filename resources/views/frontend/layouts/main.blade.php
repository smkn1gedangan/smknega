<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .bg-blue-scrolled {
        background-color: white; /* Warna biru */
        transition: background-color 0.3s ease;
    }
    </style>
   @yield("css")
</head>
<body class="relative w-full">


{{-- navbar start --}}
@include("frontend.layouts.navbar")
{{-- navbar end --}}

@yield("content")



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
