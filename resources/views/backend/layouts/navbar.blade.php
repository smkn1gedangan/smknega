<nav class="z-50" aria-label="alternative nav">
    <div class="bg-transparent h-20 fixed bottom-0 mt-12 md:relative md:min-h-screen z-10 w-full md:w-56 content-center">

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
                            <a href="{{ route("link.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">


                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-link pr-0 md:pr-3"></i>
                                </i> Link Sosial Media</span>
                            </a>
                        </li>
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
              <li class="mr-3 flex-1">
                <button id="profilDropdown" data-dropdown-toggle="profil" data-dropdown-placement="right" class="me-3 mt-6 mb-3 md:mb-0 text-white  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">PROFIL
                </button>

                <!-- Dropdown menu -->
                <div id="profil" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 mt-2" aria-labelledby="profilDropdown">
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("sejarah.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-history pr-0 md:pr-3"></i>
                                    Sejarah</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("potensi.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-lightbulb pr-0 mdpr-3"></i>
                                    Potensi Unggulan</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("rencana.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-calendar-check pr-0 md:pr-3"></i>
                                    Rencana Sekolah</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("visi.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-binoculars pr-0 md:pr-3"></i>
                                    Visi Misi</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("logo.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-cogs pr:0 md:pr-3"></i>
                                    Logo Sekolah</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("deskripsiKomite.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-file-alt pr-0 md:pr-3"></i>
                                    Deskripsi Komite</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("komite.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-user-tie pr-0 md:pr-3"></i>
                                    Komite Sekolah</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("struktur.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-sitemap pr-0 md:pr-3"></i>
                                    Struktur Organisasi</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("waka.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-users pr-0 md:pr-3"></i>
                                    Waka</span>
                            </a>
                        </li>

                    </ul>
                </div>
              </li>
              <li class="mr-3 flex-1">
                <button id="profilDropdown" data-dropdown-toggle="program" data-dropdown-placement="right" class="me-3 mt-6 mb-3 md:mb-0 text-white  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">PROGRAM
                </button>

                <!-- Dropdown menu -->
                <div id="program" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 mt-2" aria-labelledby="profilDropdown">
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("kerja.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-project-diagram pr-0 md:pr-3"></i>

                                    Program Kerja</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("peraturan.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-gavel pr-3 md:pr-3"></i>


                                    Peraturan Peraturan</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("bisnis.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-briefcase pr-3 md:pr-3"></i>


                                    Program Bisnis</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("industri.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-handshake pr-3 md:pr-3"></i>


                                    Hubungan Industri</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("bursa.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-user-tie pr-3 md:pr-3"></i>


                                    Bursa Kerja</span>
                            </a>
                        </li>

                    </ul>
                </div>
              </li>
              <li class="mr-3 flex-1">
                <button id="jurusanDropdown" data-dropdown-toggle="jurusan" data-dropdown-placement="right" class="me-3 mt-6 mb-3 md:mb-0 text-white  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">JURUSAN
                </button>

                <!-- Dropdown menu -->
                <div id="jurusan" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 mt-2" aria-labelledby="jurusanDropdown">
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("sija.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-laptop-code pr-0 md:pr-3"></i>

                                    Sija</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("dkv.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-pen pr-3 md:pr-3"></i>


                                    Dkv</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("animasi.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-play pr-3 md:pr-3"></i>


                                    Animasi</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("boga.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-utensils pr-3 md:pr-3"></i>


                                    Tata Boga</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("akuntansi.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-calculator pr-3 md:pr-3"></i>


                                    Akuntansi</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("busana.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-tshirt pr-3 md:pr-3"></i>


                                    Tata Busana</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("tkr.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-wrench pr-3 md:pr-3"></i>


                                    Tkr</span>
                            </a>
                        </li>

                    </ul>
                </div>
              </li>
              <li class="mr-3 flex-1">
                <button id="kesiswaanDropdown" data-dropdown-toggle="kesiswaan" data-dropdown-placement="right" class="me-3 mt-6 mb-3 md:mb-0 text-white  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">KESISWAAN
                </button>

                <!-- Dropdown menu -->
                <div id="kesiswaan" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 mt-2" aria-labelledby="kesiswaanDropdown">

                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("prestasi.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-award pr-3 md:pr-3"></i>


                                    Prestasi</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("ekstrakulikuler.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-basketball-ball pr-3 md:pr-3"></i>


                                    Ekstakulikuler</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("osis.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-microphone pr-3 md:pr-3"></i>


                                    Osis</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("beasiswa.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-certificate pr-3 md:pr-3"></i>


                                    Beasiswa</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("pemetaan.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-map pr-3 md:pr-3"></i>


                                    Pemetaan Kelulusan</span>
                            </a>
                        </li>

                    </ul>
                </div>
              </li>
              <li class="mr-3 flex-1">
                <button id="informasiDropdown" data-dropdown-toggle="informasi" data-dropdown-placement="right" class="me-3 mt-6 mb-3 md:mb-0 text-white  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">INFORMASI
                </button>

                <!-- Dropdown menu -->
                <div id="informasi" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 mt-2" aria-labelledby="informasiDropdown">

                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("guru.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-user-graduate pr-3 md:pr-3"></i>
                                    Guru</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{ route("artikel.index") }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 no-underline hover:border-blue-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block"><i class="fas fa-file-alt pr-0 md:pr-3"></i> Artikel</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{route("galeri.index")}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 hover:border-red-500">
                                <i class="fas fa-images md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block">Galeri</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1 ml-3">
                            <a href="{{route("sarana.index")}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-gray-900 border-b-2 md:text-gray-700 hover:border-red-500">
                                <i class="fas fa-building md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base  block md:inline-block">Sarana Prasarana</span>
                            </a>
                        </li>
                    </ul>
                </div>
              </li>




            </ul>
        </div>


    </div>
</nav>
