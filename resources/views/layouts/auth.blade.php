<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME')}} | {{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full min-h-screen bg-sky-100">
    @yield('content')
    @vite('resources/js/app.js')
</body>
</html>