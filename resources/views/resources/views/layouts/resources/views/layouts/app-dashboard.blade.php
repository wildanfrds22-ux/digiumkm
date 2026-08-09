<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>DigiUMKM</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex">

    @include('layouts.sidebar')

    <main class="flex-1">

        <div class="bg-white shadow p-5">

            <h1 class="text-2xl font-bold">
                DigiUMKM
            </h1>

        </div>

        <div class="p-8">

            @yield('content')

        </div>

    </main>

</div>

</body>

</html>
