@extends("backend.layouts.main")

@section("title","dashboard")
@section("content")
    <h1 class="text-center text-2xl">Selamat Datang {{ auth()->user()->name }}</h1>
@endsection


@section("js")
<!-- <script>
    // Close the dropdown menu if the user clicks outside of it
   
        function checkScreenWidth() {
            if (window.innerWidth < 700) {
                alert("layar hp anda di bawah 700 piksel , gunakan layar diatas 700 piksel")
                window.location.href = '/';
            }
        }

        window.onload = checkScreenWidth;

        window.onresize = checkScreenWidth;
        
</script> -->
@endsection
