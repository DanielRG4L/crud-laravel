<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'StorePanel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    <div class="flex min-h-screen items-stretch">

        {{-- Menú lateral --}}
        <x-app.sidebar />

        {{-- Área principal --}}
        <div class="flex min-w-0 flex-1 flex-col">

            {{-- Barra superior --}}
            <x-app.topbar />

            {{-- Contenido específico de cada página --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>
