@extends('layouts.app')

@section('title', 'Dashboard | StorePanel')

@section('content')
    <x-ui.page-header
        title="Dashboard"
        description="Resumen general de tu inventario y actividad reciente."
    >
        <x-slot:actions>
            <x-ui.button-link
                href="{{ route('productos.create') }}"
                variant="primary"
            >
                + Nuevo producto
            </x-ui.button-link>
        </x-slot:actions>
    </x-ui.page-header>

    {{-- Tarjetas estadísticas --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

        <x-ui.card>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Total de productos
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        {{ number_format($totalProductos, 0, ',', '.') }}
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        Productos registrados
                    </p>
                </div>

                <div class="flex size-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 7 12 3 4 7m16 0-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Precio promedio
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        Bs. {{ number_format((float) $precioPromedio, 2, ',', '.') }}
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        Promedio por producto
                    </p>
                </div>

                <div class="flex size-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4-9.5c0-1.4-1.8-2.5-4-2.5s-4 1.1-4 2.5 1.8 2.5 4 2.5 4 1.1 4 2.5S14.2 16 12 16s-4-1.1-4-2.5M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" />
                    </svg>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Precio más alto
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        Bs. {{ number_format((float) $precioMaximo, 2, ',', '.') }}
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        Mayor precio registrado
                    </p>
                </div>

                <div class="flex size-12 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m3 17 6-6 4 4 8-8M15 7h6v6" />
                    </svg>
                </div>
            </div>
        </x-ui.card>

    </div>

    {{-- Actividad reciente y accesos rápidos --}}
    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">

        <div class="xl:col-span-2">
            <x-ui.card>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-base font-semibold text-gray-900">
                            Último producto registrado
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Información del registro más reciente.
                        </p>
                    </div>

                    <x-ui.badge variant="info">
                        Actividad reciente
                    </x-ui.badge>
                </div>

                @if ($ultimoProducto)
                    <div class="mt-6 flex flex-col gap-4 rounded-xl border border-gray-200 p-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex min-w-0 items-center gap-4">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-lg font-bold text-indigo-700">
                                #
                            </div>

                            <div class="min-w-0">
                                <p class="truncate font-semibold text-gray-900">
                                    {{ $ultimoProducto->nombre }}
                                </p>

                                <p class="mt-1 text-sm text-gray-500">
                                    Registrado el
                                    {{ $ultimoProducto->created_at?->format('d/m/Y') ?? 'Fecha no disponible' }}
                                </p>

                                <p class="mt-1 text-sm font-medium text-indigo-700">
                                    Bs. {{ number_format((float) $ultimoProducto->precio, 2, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <x-ui.button-link
                            href="{{ route('productos.show', $ultimoProducto) }}"
                            variant="secondary"
                            size="sm"
                        >
                            Ver detalles
                        </x-ui.button-link>
                    </div>
                @else
                    <div class="mt-6 rounded-xl border border-dashed border-gray-300 px-4 py-10 text-center">
                        <p class="font-semibold text-gray-900">
                            Todavía no hay productos
                        </p>

                        <p class="mt-2 text-sm text-gray-500">
                            Registra tu primer producto para comenzar.
                        </p>

                        <div class="mt-5">
                            <x-ui.button-link
                                href="{{ route('productos.create') }}"
                                variant="primary"
                            >
                                Crear primer producto
                            </x-ui.button-link>
                        </div>
                    </div>
                @endif
            </x-ui.card>
        </div>

        <div>
            <x-ui.card>
                <h2 class="text-base font-semibold text-gray-900">
                    Accesos rápidos
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Accede a las funciones principales.
                </p>

                <div class="mt-5 space-y-3">
                    <a
                        href="{{ route('productos.index') }}"
                        class="flex items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-indigo-200 hover:bg-indigo-50"
                    >
                        <span class="flex size-10 items-center justify-center rounded-lg bg-indigo-100 text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 7h16M4 12h16M4 17h16" />
                            </svg>
                        </span>

                        <span>
                            <span class="block text-sm font-semibold text-gray-900">
                                Ver productos
                            </span>
                            <span class="mt-1 block text-xs text-gray-500">
                                Administrar inventario
                            </span>
                        </span>
                    </a>

                    <a
                        href="{{ route('productos.create') }}"
                        class="flex items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-indigo-200 hover:bg-indigo-50"
                    >
                        <span class="flex size-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 5v14m-7-7h14" />
                            </svg>
                        </span>

                        <span>
                            <span class="block text-sm font-semibold text-gray-900">
                                Nuevo producto
                            </span>
                            <span class="mt-1 block text-xs text-gray-500">
                                Registrar un producto
                            </span>
                        </span>
                    </a>
                </div>
            </x-ui.card>
        </div>

    </div>
@endsection
