@props([
    "classAdventage"=>"underline underline-offset-4 mb-4  decoration-1 decoration-black dark:decoration-black"
])

<h1 class="{{$classAdventage}}  pt-4 md:pt-10 text-2xl font-semibold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">{{$slot}}</h1>
