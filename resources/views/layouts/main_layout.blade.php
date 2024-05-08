<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIBLE | Page</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col items-center justify-center w-full">
    <header class="w-full">
        @include('/partials/navbar')
    </header>

    <div class="container p-4 flex items-center justify-center flex-col">
        @yield('container')
    </div>

    <footer class="w-full">
        @include('/partials/footer')
    </footer>
</body>
</html>
