@props([
    'dataLinks' => [], // Nilai default sebagai array kosong
    'data',
    "dataurl"=>""
])

<li>
    <button id="dropdownNavbarLink" data-dropdown-toggle="{{$data}}" class="flex items-center justify-between w-full py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto bg-transparent dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">{{$slot}}</button>
    <!-- Dropdown menu -->
    <div id="{{$data}}" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
          @if (count($dataLinks) > 0)
          @foreach ($dataLinks as $dataLink )
          <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$dataLink}}</a>
          </li>

          @endforeach
          @endif
        </ul>

    </div>
</li>
