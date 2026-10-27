@extends('layouts.app')

@section('title', 'Productos | StorePanel')

@section('content')
    <x-ui.page-header
        title="Productos"
        description="Administra y organiza los productos de tu inventario."
    >
        <x-slot:actions>
            <a
                href="{{ route('productos.create') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2"
            >
                <span aria-hidden="true">+</span>
                Nuevo producto
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div
            role="status"
            class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800"
        >
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de productos --}}
    <x-ui.card padding="sm">
    @if ($errors->hasAny(['buscar', 'precio_min', 'precio_max']))
        <div
            role="alert"
            class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"
        >
            {{ $errors->first('buscar') ?: $errors->first('precio_min') ?: $errors->first('precio_max') }}
        </div>
    @endif  
    <form
        action="{{ route('productos.index') }}"
        method="GET"
        class="mb-6 rounded-xl border border-gray-200 bg-gray-50 p-4"
    >
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="md:col-span-2">
                <label for="buscar" class="mb-2 block text-sm font-medium text-gray-700">
                    Buscar producto
                </label>

                <input
                    id="buscar"
                    type="search"
                    name="buscar"
                    value="{{ $busqueda }}"
                    placeholder="Nombre o descripción..."
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                >
            </div>

            <div>
                <label for="precio_min" class="mb-2 block text-sm font-medium text-gray-700">
                    Precio mínimo (Bs.)
                </label>

                <input
                    id="precio_min"
                    type="number"
                    name="precio_min"
                    min="0"
                    step="0.01"
                    value="{{ $precioMinimo }}"
                    placeholder="Ej. 10.00"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                >
            </div>

            <div>
                <label for="precio_max" class="mb-2 block text-sm font-medium text-gray-700">
                    Precio máximo (Bs.)
                </label>

                <input
                    id="precio_max"
                    type="number"
                    name="precio_max"
                    min="0"
                    step="0.01"
                    value="{{ $precioMaximo }}"
                    placeholder="Ej. 500.00"
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                >
            </div>
        </div>

        <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:justify-end">
            <x-ui.button-link
                href="{{ route('productos.index') }}"
                variant="secondary"
            >
                Limpiar filtros
            </x-ui.button-link>

            <x-ui.button type="submit" variant="primary">
                Buscar
            </x-ui.button>
        </div>
    </form>


    <div class="mb-6 flex flex-col gap-4 px-2 pt-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-base font-semibold text-gray-900">
                Inventario de productos
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Mostrando {{ $productos->count() }} de {{ $productos->total() }} productos encontrados
            </p>
        </div>

        @if (request()->hasAny(['buscar', 'precio_min', 'precio_max']))
            <x-ui.badge variant="info">
                Filtros aplicados
            </x-ui.badge>
        @else
            <x-ui.badge variant="success">
                Inventario completo
            </x-ui.badge>
        @endif
    </div>

<div class="mb-5 grid grid-cols-1 gap-4 px-2 sm:grid-cols-2">
    <div class="rounded-xl border border-gray-200 bg-white p-4">
        <p class="text-sm font-medium text-gray-500">
            Productos encontrados
        </p>

        <p class="mt-2 text-2xl font-bold tracking-tight text-gray-900">
            {{ $productos->total() }}
        </p>

        <p class="mt-1 text-xs text-gray-500">
            Según la búsqueda y los filtros actuales
        </p>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white p-4">
        <p class="text-sm font-medium text-gray-500">
            En esta página
        </p>

        <p class="mt-2 text-2xl font-bold tracking-tight text-indigo-700">
            {{ $productos->count() }}
        </p>

        <p class="mt-1 text-xs text-gray-500">
            Registros visibles actualmente
        </p>
    </div>
</div>


        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] text-left text-sm">
                <thead>
                    <tr class="border-y border-gray-200 bg-gray-50 text-xs uppercase tracking-wider text-gray-500">
                        <th scope="col" class="px-4 py-3 font-semibold">
                            Producto
                        </th>

                        <th scope="col" class="px-4 py-3 font-semibold">
                            Precio
                        </th>

                        <th scope="col" class="px-4 py-3 font-semibold">
                            Fecha de registro
                        </th>

                        <th scope="col" class="px-4 py-3 text-right font-semibold">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($productos as $producto)
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-4 py-4">
                                <div class="font-semibold text-gray-900">
                                    {{ $producto->nombre }}
                                </div>

                                <div class="mt-1 max-w-xs truncate text-xs text-gray-500">
                                    {{ $producto->descripcion ?: 'Sin descripción' }}
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">
                                Bs. {{ number_format((float) $producto->precio, 2, ',', '.') }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-4 text-gray-600">
                                {{ $producto->created_at?->format('d/m/Y') ?? '—' }}
                            </td>

                            <td class="px-4 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a
                                        href="{{ route('productos.show', $producto) }}"
                                        class="rounded-lg px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 hover:text-gray-900"
                                    >
                                        Ver
                                    </a>

                                    <a
                                        href="{{ route('productos.edit', $producto) }}"
                                        class="rounded-lg px-3 py-2 text-xs font-semibold text-indigo-700 transition hover:bg-indigo-50"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('productos.destroy', $producto) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este producto?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                        >
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-16 text-center">
                                <div class="mx-auto max-w-sm">
                                    <p class="text-base font-semibold text-gray-900">
                                        Aún no hay productos
                                    </p>

                                    <p class="mt-2 text-sm text-gray-500">
                                        Registra tu primer producto para comenzar a organizar el inventario.
                                    </p>

                                    <a
                                        href="{{ route('productos.create') }}"
                                        class="mt-5 inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                    >
                                        Crear primer producto
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        @if ($productos->hasPages())
            <div class="border-t border-gray-200 px-4 py-4">
                {{ $productos->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
