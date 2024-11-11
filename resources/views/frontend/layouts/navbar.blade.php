<nav id="navbar" class="{{Request::is("/") ?"text-white" :"text-slate-900 border "}}  z-50 w-full  fixed border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">

      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-2 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{route("welcome")}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">HOME</a>
          </li>
          <x-dropdown data="navbar-jurusan" :dataLinks="[
            ['route' => 'sejarah', 'name' => 'SEJARAH SMK'],
            ['route' => 'potensi', 'name' => 'POTENSI UNGGULAN'],
            ['route' => '', 'name' => 'PENGEMBANGAN SEKOLAH'],
            ['route' => '', 'name' => 'VISI DAN MISI'],
            ['route' => '', 'name' => 'LOGO SMK'],
            ['route' => '', 'name' => 'KOMITE SEKOLAH'],
            ['route' => '', 'name' => 'STRUKTUR ORGANISASI'],
            ['route' => '', 'name' => 'HYMNE']
        ]">PROFIL</x-dropdown>

          <x-dropdown data="data-program" :dataLinks="[['route'=>'','name'=>'PROGRAM KERJA'],['route'=>'','name'=>'PERATURAN PERATURAN'],['route'=>'','name'=>'PROGRAM BISNIS'],['route'=>'','name'=>'PROGRAM PENGEMBANGAN SEKOLAH'],['route'=>'','name'=>'HUBUNGAN INDUSTRI'],['route'=>'','name'=>'BURSA KERJA']]">PROGRAM SEKOLAH</x-dropdown>
          <x-dropdown data="data-gtk" :dataLinks="[['route'=>'','name'=>'INFORMASI GURU'],['route'=>'','name'=>'INFORMASI TENAGA PENDIDIKAN'],['route'=>'','name'=>'TUGAS DAN FUNGSI']]">GTK</x-dropdown>
          <x-dropdown data="data-kesiswaan" :dataLinks="[['route'=>'','name'=>'PRESTASI SISWA'],['route'=>'','name'=>'INFORMASI PESERTA DIDIK'],['route'=>'','name'=>'EKSTRAKULIKULER'],['route'=>'','name'=>'OSIS'],['route'=>'','name'=>'BEASISWA'],['route'=>'','name'=>'INFORMASI PEMETAAN KELULUSAN']]">KESISWAAN</x-dropdown>
          <x-dropdown data="data-sarana" :dataLinks="[['route'=>'','name'=>'PETA SEKOLAH'],['route'=>'','name'=>'SARANA INFRASTRUKTUR'],['route'=>'','name'=>'SARANA PEMEBELAJARAN']]">SARANA PRASARANA</x-dropdown>
          <x-dropdown dataurl="informasi" data="data-informasi" :dataLinks="[['route'=>'','name'=>'ARTIKEL'],['route'=>'','name'=>'KURIKULUM']]">INFORMASI</x-dropdown>
          <x-dropdown data="data-ppdb" :dataLinks="[['route'=>'','name'=>'JADWAL PPDB'],['route'=>'','name'=>'INFORMASI PPDB']]">PPDB</x-dropdown>

        </ul>
      </div>
    </div>
</nav>
