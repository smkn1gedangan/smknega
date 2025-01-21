<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify CAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>Verify You're Not a Robot</h1>
    <form action="{{ route('captcha.store') }}" method="POST">
        @csrf
        <div  class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}"></div>
        @error('g-recaptcha-response')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <button type="submit">Verify</button>
    </form>
</body>
</html>
