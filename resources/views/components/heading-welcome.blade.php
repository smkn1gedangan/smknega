@props([
    "classAdventage"=>"underline underline-offset-4 mb-4  decoration-1 decoration-black dark:decoration-black text-xl md:text-4xl"
])

<h1 class="{{$classAdventage}}  pt-4 md:pt-10 leading-none tracking-tight text-gray-800 text-xl md:text-2xl dark:text-white">{{$slot}}</h1>
