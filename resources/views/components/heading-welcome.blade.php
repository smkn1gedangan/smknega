@props([
    "classAdventage"=>"underline underline-offset-4 mb-4  decoration-1 decoration-black dark:decoration-black text-xl md:text-4xl"
])

<h1 class="{{$classAdventage}}  pt-4 md:pt-10 font-semibold leading-none tracking-tight text-gray-900 text-2xl md:text-4xl dark:text-white">{{$slot}}</h1>
