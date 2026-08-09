<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiUMKM</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-700 text-white shadow">
        <div class="max-w-7xl mx-auto flex justify-between items-center p-4">

            <h1 class="text-2xl font-bold">
                DigiUMKM
            </h1>

            <div class="space-x-6">

                <a href="{{ route('dashboard') }}" class="hover:text-gray-200">
                    Dashboard
                </a>

                <a href="{{ route('umkm.index') }}" class="hover:text-gray-200">
                    Data UMKM
                </a>

            </div>

        </div>
    </nav>

    <div class="max-w-7xl mx-auto mt-8">

        @yield('content')

    </div>

</body>
</html>
