@props(['title', 'quote','isRoute'=>false,"nameRoute",'href' => null])
<div class="flex justify-between items-center">
    <div class="p-2 md:p-5 text-lg capitalize font-semibold text-left rtl:text-right text-gray-900 ">
               {{ $title }}
    <p class="mt-1 text-xs sm:text-sm capitalize font-normal text-gray-500 ">
                   {{ $quote }}
    </p>
</div>

@if ($isRoute)
      <div class="flex items-center gap-2">
                   {{ $slot }}
                    <a
                        href="{{ $href }}"
                        {{ $attributes->merge(["class"=>"inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-100 bg-gray-900 shadow-sm transition duration-150 ease-in-out hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25 gap-2 cursor-pointer"]) }}
                    >
                        <span class="block">{{ $nameRoute }}</span>
                    </a>
        </div>
@endif
</div>
