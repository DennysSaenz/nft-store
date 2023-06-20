<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js/js/app.js')
    @vite('resources/css/app.css')
    <title>Axios</title>
</head>
<body class="">
    <header>
        <div class="flex justify-center content-center bg-[#14141f]/60 h-10 w-full">

        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer></footer>
</body>
</html>

//fijarme para no hacer un memory leak, dijo Maria u.u
