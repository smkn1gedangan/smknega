<!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

<footer class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <div class="lg:flex lg:items-start lg:gap-8">


        <div class="mt-8 grid grid-cols-2 gap-8 lg:mt-0 lg:grid-cols-5 lg:gap-y-16">
          <div class="col-span-2">
            <div>
              <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="text-2xl font-bold text-gray-900">Smkn 1 Gedangan</h2>

              <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="mt-4 text-gray-500">
                sekolah unggulan yang menghasilkan tamatan berkualitas serta melahirkan tenaga kerja yang kompeten dan mandiri melalui pengembangan IPTEK dan IMTAQ.
              </p>
            </div>
          </div>

          <div class="col-span-2 md:justify-end lg:col-span-3 flex lg:items-center">
            @auth
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button
                data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"
                type="submit"
                class="mt-1 w-full bg-red-700 px-6 py-3 rounded-md text-sm font-bold uppercase tracking-wide text-white transition-none hover:bg-red-600 sm:mt-0 sm:w-auto sm:shrink-0"
            >
                Logout
            </button>
            </form>

            @endauth
            @guest
                <a
                data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"
                    href="{{route("login")}}"
                    class="mt-1 bg-teal-500 px-6 py-3 rounded-md text-sm font-bold uppercase tracking-wide text-white transition-none hover:bg-teal-600 sm:mt-0 sm:w-auto sm:shrink-0"
                >
                    Login
                </a>
            @endguest

          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-900" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">Profil</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("sejarah") }}" class="text-gray-700 transition hover:opacity-75"> Sejarah </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("potensi") }}" class="text-gray-700 transition hover:opacity-75"> Potensi Unggulan </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("rencana") }}" class="text-gray-700 transition hover:opacity-75"> Rencana Pengembangan Sekolah </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("visi") }}" class="text-gray-700 transition hover:opacity-75"> Visi Misi </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("logo") }}" class="text-gray-700 transition hover:opacity-75"> Logo Smk </a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("komite") }}" class="text-gray-700 transition hover:opacity-75"> Komite Sekolah</a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("struktur") }}" class="text-gray-700 transition hover:opacity-75">Struktur Organisasi</a>
              </li>
            </ul>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-900" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">Program</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("kerja") }}" class="text-gray-700 transition hover:opacity-75">Program Kerja </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("peraturan") }}" class="text-gray-700 transition hover:opacity-75"> Peraturan Peraturan </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("bisnis") }}" class="text-gray-700 transition hover:opacity-75"> Program Bisnis</a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("industri") }}" class="text-gray-700 transition hover:opacity-75"> Hubungan Industri</a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("bursa") }}" class="text-gray-700 transition hover:opacity-75"> Bursa Kerja</a>
              </li>
            </ul>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-900" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">Kesiswaan</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("prestasi") }}" class="text-gray-700 transition hover:opacity-75">Prestasi Siswa </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("ekstrakulikuler") }}" class="text-gray-700 transition hover:opacity-75"> Ekstrakulikuler </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("osis") }}" class="text-gray-700 transition hover:opacity-75"> Osis</a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("beasiswa") }}" class="text-gray-700 transition hover:opacity-75"> Beasiswa</a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("pemetaan") }}" class="text-gray-700 transition hover:opacity-75"> Pemetaan Kelulusan </a>
              </li>

            </ul>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-900" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">Informasi</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("guru") }}" class="text-gray-700 transition hover:opacity-75"> Guru </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("artikel") }}" class="text-gray-700 transition hover:opacity-75"> Artikel </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("galeri") }}" class="text-gray-700 transition hover:opacity-75"> Galeri </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("sarana") }}" class="text-gray-700 transition hover:opacity-75"> Sarana Prasarana </a>
              </li>
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="" class="text-gray-700 transition hover:opacity-75"> E learning </a>
              </li>
            </ul>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-gray-900" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">PPDB</p>

            <ul class="mt-6 space-y-4 text-sm">
              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("info_ppdb") }}" class="text-gray-700 transition hover:opacity-75"> Informasi PPDB </a>
              </li>

              <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <a href="{{ route("jadwal") }}" class="text-gray-700 transition hover:opacity-75"> Jadwal PPDB </a>
              </li>
            </ul>
          </div>

          <ul class="col-span-2 flex justify-start gap-6 lg:col-span-5 lg:justify-end">
            <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a
                href="{{$link["facebook"]}}"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Facebook</span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>

            <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a
                href="{{$link["instagram"]}}"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Instagram</span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>

            {{-- <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Twitter</span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                  />
                </svg>
              </a>
            </li> --}}

            {{-- <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">GitHub</span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li> --}}
            <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a
                href="{{$link["tiktok"]}}"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Tiktok</span>

                <svg xmlns="http://www.w3.org/2000/svg" class="size-6"   viewBox="0 0 24 24"><path fill="currentColor" d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48"/></svg>
              </a>
            </li>


          </ul>
        </div>
      </div>

      <div class="mt-8 border-t border-gray-100 pt-8">
        <div class="sm:flex sm:justify-between">
          <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="text-xs text-gray-500">2024. Smkn 1 Gedangan. All rights reserved.</p>
          <a target="_blank" href="https://usammuhazir.vercel.app/" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="text-xs text-gray-500 font-bold capitalize">visit more about developer.</a>

          <ul class="mt-8 flex flex-wrap justify-start gap-4 text-xs sm:mt-0 lg:justify-end">
            <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a href="#" class="text-gray-500 transition hover:opacity-75"> Terms & Conditions </a>
            </li>

            <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a href="#" class="text-gray-500 transition hover:opacity-75"> Privacy Policy </a>
            </li>

            <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
              <a href="#" class="text-gray-500 transition hover:opacity-75"> Cookies </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
