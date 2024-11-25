<section class="bg-white dark:bg-gray-900">
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Kontak Kami</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Jika Pengunjung menemukan error atau bug pada website ini silahkan kiriman feedback dengan menyertakan email pada form dibawah ini </p>
        <form action="{{ route("save_masukan") }}" method="POST" class="space-y-8">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">email</label>
                <input type="email" name="email" value="@auth
                    {{ Auth::user()->email }}
                @endauth" readonly id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="anda harus login terlebih dahulu" required>
                @error("email")
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
            @enderror
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pengirim</label>
                <input type="text" name="nama" id="subject" value="{{ old("nama") }}" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="nama" required>
                    @error("nama")
                        <p class="mt-2 text-sm text-red-800">
                            {{ $message }}
                        </p>
                    @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="masukan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pesan</label>
                <textarea id="masukan" name="masukan" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="biarkan kami mengetahui bug anda..">{{ old("masukan") }}</textarea>
                @error("masukan")
                <p class="mt-2 text-sm text-red-800">
                    {{ $message }}
                </p>
            @enderror
            </div>
            <button type="submit" class="py-3 transition-all duration-300 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 bg-black hover:bg-slate-800 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Kirim Pesan</button>
        </form>
    </div>
  </section>
