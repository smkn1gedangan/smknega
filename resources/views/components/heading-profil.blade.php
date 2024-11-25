<h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" {{$attributes->merge(["class"=>"flex flex-row justify-center flex-nowrap items-center"])}}>
    <span class="flex-grow block border-t border-black w-10"></span>
    <span class="text-center flex-grow block mx-4 px-4 py-2.5 text-xl md:text-3xl uppercase rounded leading-none font-medium text-black">
        {{$slot}}
    </span>
    <span class="flex-grow block border-t border-black w-10"></span>
</h2>
