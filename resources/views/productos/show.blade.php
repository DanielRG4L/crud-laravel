@extends('layouts.app')

@section('title', 'Detalle del producto | StorePanel')

@section('content')
    <x-ui.page-header
        title="Detalle del producto"
        description="Consulta toda la información del producto seleccionado."
    >
        <x-slot:actions>
            <x-ui.button-link
                href="{{ route('productos.edit', $producto) }}"
                variant="primary"
            >
                Editar producto
            </x-ui.button-link>
        </x-slot:actions>
    </x-ui.page-header>

    <div class="mx-auto max-w-4xl">
        <x-ui.card>
            {{-- Identificación del producto --}}
            <div class="flex flex-col gap-4 border-b border-gray-100 pb-6 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-700">
                        <span class="text-xl font-bold">#</span>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Producto registrado
                        </p>

                        <h2 class="mt-1 break-words text-xl font-bold text-gray-900">
                            {{ $producto->nombre }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Identificador: {{ $producto->id }}
                        </p>
                    </div>
                </div>

                <x-ui.badge variant="info">
                    Registro #{{ $producto->id }}
                </x-ui.badge>
            </div>

            {{-- Datos del producto --}}
            <div class="grid gap-6 py-6 sm:grid-cols-2">
                <div class="rounded-xl bg-gray-50 p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Precio de venta
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-indigo-700">
                        Bs. {{ number_format((float) $producto->precio, 2, ',', '.') }}
                    </p>
                </div>

                <div class="rounded-xl bg-gray-50 p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Fecha de registro
                    </p>

                    <p class="mt-2 text-lg font-semibold text-gray-900">
                        {{ $producto->created_at?->format('d/m/Y') ?? 'No disponible' }}
                    </p>

                    <p class="mt-1 text-sm text-gray-500">
                        {{ $producto->created_at?->format('H:i') ?? '' }}
                    </p>
                </div>
            </div>

            {{-- Descripción --}}
            <div class="border-t border-gray-100 pt-6">
                <h3 class="text-sm font-semibold text-gray-900">
                    Descripción
                </h3>

                <p class="mt-3 whitespace-pre-line text-sm leading-6 text-gray-600">
                    {{ $producto->descripcion ?: 'Este producto no tiene una descripción registrada.' }}
                </p>
            </div>

            {{-- Acciones --}}
            <div class="mt-6 flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
                <x-ui.button-link
                    href="{{ route('productos.index') }}"
                    variant="secondary"
                >
                    Volver al listado
                </x-ui.button-link>

                <x-ui.button-link
                    href="{{ route('productos.edit', $producto) }}"
                    variant="primary"
                >
                    Editar producto
                </x-ui.button-link>
            </div>
        </x-ui.card>
    </div>
@endsection
