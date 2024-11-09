<nav class="z-50" aria-label="alternative nav">
    <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-56 content-center">

        <div class="md:mt-12 md:w-56 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">

                <li class="mr-3 flex-1">
                    <a href="/be/dashboard" class="block  py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-100 hover:border-purple-500 text-center">
                        <span class="font-semibold pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block ">DASHBOARD</span>
                    </a>
                </li>
              <li class="mr-3 flex-1">
                <button id="welcomeDropdown" data-dropdown-toggle="welcome" data-dropdown-placement="right" class="me-3 mt-6 mb-3 md:mb-0 text-white  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">WELCOME
                </button>

                <!-- Dropdown menu -->
                <div id="welcome" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 mt-2" aria-labelledby="welcomeDropdown">
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("profil.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">


                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-school pr-0 md:pr-3"></i>
                                </i> Profil</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("artikel.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">


                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-file-alt pr-0 md:pr-3"></i> Artikel</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{route("kepsek.index")}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 hover:border-red-500">
                                <i class="fas fa-user pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block">kepala Sekolah</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{route("guru.index")}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 hover:border-red-500">
                                <i class="fas fa-user-graduate md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block">Guru</span>
                            </a>
                        </li>

                      <li class="mr-3 flex-1 ml-3">
                        <a href="{{route("galeri.index")}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 hover:border-red-500">
                            <i class="fas fa-images md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block">Galeri</span>
                        </a>
                    </li>
                    </ul>
                </div>
              </li>




            </ul>
        </div>


    </div>
</nav>
