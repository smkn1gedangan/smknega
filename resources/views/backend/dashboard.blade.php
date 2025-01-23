@extends("backend.layouts.main")

@section("title","dashboard")
@section("content")
<div id="main" class="relative main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">



    <div class="flex flex-wrap justify-center pt-4 md:pt-20 p-8 ">
        <div class=" w-[45%] border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h2 class="font-bold uppercase text-gray-600">statistik pengunjung</h2>
            </div>
            <div class="p-5">
                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-0"), {
                        "type": "line",
                        "data": {
                            "labels": @json($months),
                            "datasets": [{
                                "label": "Views",
                                "data": @json($visitorsData),
                                "fill": false,
                                "borderColor": "rgb(75, 192, 192)",
                                "lineTension": 0.1
                            }]
                        },
                        "options": {}
                    });
                </script>
            </div>
        </div>
        <div class="w-[45%] border-transparent p-2">
          @foreach ($masukans as $masukan)
          <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
            <div class="flex-shrink-0">
                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-800">
                <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                </svg>
                </div>
            </div>
            <div class="w-full ps-3">
                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white mx-3">{{ $masukan->nama }}</span>{{ Str::words($masukan->masukan, 10, '...') }}</div>
                <div class="text-xs text-blue-600 dark:text-blue-500">{{ \Carbon\Carbon::parse($masukan->created_at)->translatedFormat('l, d F Y') }}</div>
                <div class="flex gap-2 justify-evenly items-center">

                    <form action="{{route('deleteMasukan',[Crypt::encrypt($masukan->id)]) }}" method="post" id="delete-form-{{$masukan->id}}">
                        @csrf
                        @method("delete")
                        <button type="button" onclick="confirmDelete({{$masukan->id}})" class="text-xs text-red-600 dark:text-red-500">hapus masukan</button>

                    </form>
                    <button data-modal-target="default-modal-{{$masukan->id}}" data-modal-toggle="default-modal-{{$masukan->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Lihat Masukan
                      </button>
                      <div id="default-modal-{{$masukan->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{ $masukan->nama }}
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal-{{$masukan->id}}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        {{$masukan->masukan}}
                                    </p>

                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                    <button data-modal-hide="default-modal-{{$masukan->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
          @endforeach
        </div>
    </div>



</div>
@endsection


@section("js")
<script>
    /*Toggle dropdown list*/
    function toggleDD(myDropMenu) {
        document.getElementById(myDropMenu).classList.toggle("invisible");
    }
    /*Filter dropdown options*/
    function filterDD(myDropMenu, myDropMenuSearch) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(myDropMenuSearch);
        filter = input.value.toUpperCase();
        div = document.getElementById(myDropMenu);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
            var dropdowns = document.getElementsByClassName("dropdownlist");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('invisible')) {
                    openDropdown.classList.add('invisible');
                }
            }
        }
    }
        function checkScreenWidth() {
            if (window.innerWidth < 700) {
                alert("layar hp anda di bawah 700 piksel , gunakan layar diatas 700 piksel")
                window.location.href = '/';
            }
        }

        window.onload = checkScreenWidth;

        window.onresize = checkScreenWidth;
        function confirmDelete(articleId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Masukan ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak , Batal',
                width: '550px',
                customClass: {
                    popup: 'swal-height'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${articleId}`).submit();
                }
            });
        }
        window.Laravel = {
            successMessage: @json(session('success')),
        };
</script>
@endsection
