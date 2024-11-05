<nav id="navbar" class=" z-50 w-full fixed border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">
      
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">HOME</a>
          </li>
          <x-dropdown data="navbar-jurusan" :dataLinks="['SEJARAH SMK','POTENSI UNGGULAN','PENGEMBANGAN SEKOLAH','VISI DAN MISI','LOGO SMK','KOMITE SEKOLAH','STRUKTUR ORGANISASI','HYMNE']">PROFIL</x-dropdown>
          <x-dropdown data="data-program" :dataLinks="['PROGRAM KERJA','PERATURAN PERATURAN','PROGRAM BISNIS','PROGRAM PENGEMBANGAN SEKOLAH','HUBUNGAN INDUSTRI','BURSA KERJA']">PROGRAM SEKOLAH</x-dropdown>
          <x-dropdown data="data-gtk" :dataLinks="['INFORMASI GURU','INFORMASI TENAGA PENDIDIKAN','TUGAS DAN FUNGSI']">GTK</x-dropdown>
          <x-dropdown data="data-kesiswaan" :dataLinks="['PRESTASI SISWA','INFORMASI PESERTA DIDIK','EKSTRAKULIKULER','OSIS','BEASISWA','INFORMASI PEMETAAN KELULUSAN']">KESISWAAN</x-dropdown>
          <x-dropdown data="data-sarana" :dataLinks="['PETA SEKOLAH','SARANA INFRASTRUKTUR','SARANA PEMEBELAJARAN']">SARANA PRASARANA</x-dropdown>
          <x-dropdown data="data-informasi" :dataLinks="['ARTIKEL','KURIKULUM']">INFORMASI</x-dropdown>
          <x-dropdown data="data-ppdb" :dataLinks="['JADWAL PPDB','INFORMASI PPDB']">PPDB</x-dropdown>

        </ul>
      </div>
    </div>
</nav>
