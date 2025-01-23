<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify CAPTCHA</title>
    <link rel="shortcut icon" href="{{asset("img/static_smkn1Gedangan.jpg")}}" type="image/x-icon">
    @vite(["resources/css/app.css"])
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="w-full p-2 min-h-screen flex flex-wrap flex-col justify-center items-center">
    <img src="{{asset("img/static_smkn1Gedangan.jpg")}}" class="w-20 h-20 bg-white" alt="" srcset="">
    <h1 id="title" class="text-2xl md:text-4xl my-4">Verify You're Not a Robot</h1>
    <form id="captchaForm" class="flex flex-col" action="{{ route('captcha.store') }}" method="POST">
        @csrf
        <div  class="g-recaptcha" data-callback="onCaptchaSuccess" data-sitekey="{{ config('captcha.sitekey') }}" ></div>
        @error('g-recaptcha-response')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <button class="invisible" type="button"></button>
    </form>
</body>
    <script>
        window.onCaptchaSuccess = function() {
        document.getElementById("captchaForm").submit();
        };

    </script>
</html>
