<nav id="navbar" class="{{Request::is("/") ?"text-slate-900 md:text-white" :"text-slate-900 border "}}  z-50 w-full  fixed border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center  justify-between mx-auto p-4">
        <a href="{{route("welcome")}}" class="flex sm:invisible items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset("img/static_icon.png")}}" class="h-8" alt="Flowbite Logo" />
        </a>
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center bg-white p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-2 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{route("welcome")}}" class="{{Request::is("/") ?"md:text-blue-700":"md:text-black"}} block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">HOME</a>
          </li>
          <x-dropdown data="data-profil" :dataLinks="[
            ['route' => 'sejarah', 'name' => 'SEJARAH SMK'],
            ['route' => 'potensi', 'name' => 'POTENSI UNGGULAN'],
            ['route' => 'rencana', 'name' => 'RENCANA PENGEMBANGAN SEKOLAH'],
            ['route' => 'visi', 'name' => 'VISI DAN MISI'],
            ['route' => 'logo', 'name' => 'LOGO SMK'],
            ['route' => 'komite', 'name' => 'KOMITE SEKOLAH'],
            ['route' => 'struktur', 'name' => 'STRUKTUR ORGANISASI'],
        ]">PROFIL</x-dropdown>

          <x-dropdown data="data-program" :dataLinks="[
          ['route'=>'kerja','name'=>'PROGRAM KERJA'],
          ['route'=>'peraturan','name'=>'PERATURAN PERATURAN'],
          ['route'=>'bisnis','name'=>'PROGRAM BISNIS'],
          ['route'=>'industri','name'=>'HUBUNGAN INDUSTRI'],
          ['route'=>'bursa','name'=>'BURSA KERJA']]">
          PROGRAM SEKOLAH</x-dropdown>
          <x-dropdown data="data-jurusan" :dataLinks="[
          ['route'=>'sija','name'=>'SISTEM INFORMATIKA DAN JARINGAN APLIKASI'],
          ['route'=>'dkv','name'=>'DKV'],
          ['route'=>'animasi','name'=>'ANIMASI'],
          ['route'=>'boga','name'=>'TATA BOGA'],
          ['route'=>'akuntansi','name'=>'AKUNTANSI'],
          ['route'=>'busana','name'=>'TATA BUSANA'],
          ['route'=>'tkr','name'=>'TERKNIK KENDARAAN RINGAN']]">
          JURUSAN</x-dropdown>
          <x-dropdown data="data-kesiswaan" :dataLinks="[
          ['route'=>'prestasi','name'=>'PRESTASI SISWA'],
          ['route'=>'ekstrakulikuler','name'=>'EKSTRAKULIKULER'],
          ['route'=>'osis','name'=>'OSIS'],
          ['route'=>'beasiswa','name'=>'BEASISWA'],
          ['route'=>'pemetaan','name'=>'INFORMASI PEMETAAN KELULUSAN']]">
          KESISWAAN</x-dropdown>
          <x-dropdown dataurl="informasi" data="data-informasi" :dataLinks="[
          ['route'=>'guru','name'=>'GURU'],
          ['route'=>'artikel','name'=>'ARTIKEL'],
          ['route'=>'galeri','name'=>'GALERI'],
          ['route'=>'sarana','name'=>'SARANA PRASARANA'],
          ['route'=>'elearning','name'=>'E-LEARNING'],
          ['route'=>'islamic','name'=>'NEGA ISLAMIC']
          ]">INFORMASI</x-dropdown>
          <x-dropdown data="data-ppdb" :dataLinks="[
          ['route'=>'jadwal','name'=>'JADWAL PPDB'],
          ['route'=>'info_ppdb','name'=>'INFORMASI PPDB'],
          ['route'=>'survey','name'=>'SURVEY PEMINATAN']
          ]">PPDB</x-dropdown>

        </ul>
      </div>
    </div>
</nav>
