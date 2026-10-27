<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StorePanel | Gestión inteligente de inventario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">

    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex size-11 items-center justify-center rounded-xl bg-indigo-600 text-lg font-bold text-white">
                    S
                </span>
                <span>
                    <span class="block text-lg font-bold tracking-tight">StorePanel</span>
                    <span class="block text-xs text-gray-500">Gestión de inventario</span>
                </span>
            </a>

            <a
                href="{{ route('dashboard') }}"
                class="rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-100"
            >
                Ir al dashboard
            </a>
        </div>
    </header>

    <main>
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute -right-32 -top-32 size-96 rounded-full bg-indigo-100/70 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-40 -left-32 size-96 rounded-full bg-blue-100/60 blur-3xl"></div>

            <div class="relative mx-auto grid max-w-7xl items-center gap-14 px-6 py-20 lg:grid-cols-2 lg:px-8 lg:py-28">

                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-white px-3 py-1.5 text-xs font-semibold text-indigo-700 shadow-sm">
                        <span class="size-2 rounded-full bg-indigo-500"></span>
                        Proyecto de gestión de inventario y ventas
                    </span>

                    <h1 class="mt-7 max-w-2xl text-4xl font-bold tracking-tight text-gray-950 sm:text-5xl lg:text-6xl lg:leading-[1.1]">
                        Tu inventario,
                        <span class="text-indigo-600">bajo control.</span>
                    </h1>

                    <p class="mt-6 max-w-xl text-base leading-7 text-gray-600 sm:text-lg sm:leading-8">
                        Administra productos, consulta precios y organiza tu inventario desde una interfaz sencilla, moderna y fácil de utilizar.
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="{{ route('dashboard') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700"
                        >
                            Explorar dashboard
                            <span aria-hidden="true">→</span>
                        </a>

                        <a
                            href="{{ route('productos.index') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-6 py-3.5 text-sm font-semibold text-gray-700 transition hover:border-gray-300 hover:bg-gray-50"
                        >
                            Ver productos
                        </a>
                    </div>

                    <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-gray-500">
                        <span class="flex items-center gap-2">
                            <span class="font-bold text-indigo-600">✓</span>
                            Operaciones CRUD
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="font-bold text-indigo-600">✓</span>
                            Búsqueda y filtros
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="font-bold text-indigo-600">✓</span>
                            Estadísticas
                        </span>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-4 rounded-3xl bg-indigo-200/40 blur-2xl"></div>

                    <div class="relative overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-2xl shadow-gray-900/10">
                        <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                            <div class="flex items-center gap-2">
                                <span class="size-2.5 rounded-full bg-red-400"></span>
                                <span class="size-2.5 rounded-full bg-amber-400"></span>
                                <span class="size-2.5 rounded-full bg-green-400"></span>
                            </div>
                            <span class="text-xs font-medium text-gray-400">Vista previa · StorePanel</span>
                        </div>

                        <div class="p-5 sm:p-7">
                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-xs font-medium text-gray-500">Panel de administración</p>
                                    <h2 class="mt-1 text-xl font-bold text-gray-900">Resumen general</h2>
                                </div>
                                <span class="rounded-lg bg-indigo-50 px-3 py-2 text-xs font-semibold text-indigo-700">
                                    Inventario
                                </span>
                            </div>

                            <div class="mt-7 grid grid-cols-2 gap-4">
                                <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">
                                    <p class="text-xs text-gray-500">Productos</p>
                                    <p class="mt-2 text-2xl font-bold text-gray-900">CRUD</p>
                                    <p class="mt-1 text-xs text-gray-500">Gestión completa</p>
                                </div>

                                <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">
                                    <p class="text-xs text-gray-500">Consultas</p>
                                    <p class="mt-2 text-2xl font-bold text-indigo-600">Search</p>
                                    <p class="mt-1 text-xs text-gray-500">Búsqueda y filtros</p>
                                </div>
                            </div>

                            <div class="mt-5 rounded-xl border border-gray-100 p-4">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-gray-800">Funciones del sistema</p>
                                    <span class="text-xs text-gray-400">Resumen</span>
                                </div>

                                <div class="mt-4 space-y-4">
                                    @foreach ([
                                        ['Gestión de productos', 'bg-indigo-500', 'w-full'],
                                        ['Estadísticas', 'bg-emerald-500', 'w-4/5'],
                                        ['Filtros de búsqueda', 'bg-blue-500', 'w-3/4'],
                                    ] as [$label, $color, $width])
                                        <div>
                                            <div class="mb-2 flex items-center justify-between text-xs">
                                                <span class="font-medium text-gray-600">{{ $label }}</span>
                                                <span class="text-gray-400">Disponible</span>
                                            </div>
                                            <div class="h-2 overflow-hidden rounded-full bg-gray-100">
                                                <div class="{{ $color }} {{ $width }} h-full rounded-full"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <p class="mt-5 text-center text-xs text-gray-400">
                                Vista ilustrativa de las funcionalidades del proyecto
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="border-y border-gray-200 bg-white">
            <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 sm:grid-cols-3 lg:px-8">

                <div>
                    <div class="flex size-11 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                        <span class="text-xl font-bold">01</span>
                    </div>
                    <h3 class="mt-4 font-semibold text-gray-900">Gestión de productos</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-500">
                        Registra productos, modifica información, consulta detalles y elimina registros.
                    </p>
                </div>

                <div>
                    <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <span class="text-xl font-bold">02</span>
                    </div>
                    <h3 class="mt-4 font-semibold text-gray-900">Búsqueda eficiente</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-500">
                        Localiza productos por nombre o descripción y filtra por rangos de precios.
                    </p>
                </div>

                <div>
                    <div class="flex size-11 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                        <span class="text-xl font-bold">03</span>
                    </div>
                    <h3 class="mt-4 font-semibold text-gray-900">Dashboard dinámico</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-500">
                        Consulta estadísticas calculadas a partir de los datos almacenados.
                    </p>
                </div>

            </div>
        </section>
    </main>

    <footer class="bg-gray-950">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-8 sm:flex-row sm:items-center sm:justify-between lg:px-8">
            <div>
                <p class="font-semibold text-white">StorePanel</p>
                <p class="mt-1 text-sm text-gray-400">
                    Proyecto desarrollado por GENERATION.
                </p>
            </div>

            <p class="text-xs text-gray-500">
                © {{ date('Y') }} StorePanel · Proyecto de Inventario y Ventas
            </p>
        </div>
    </footer>

</body>
</html>
