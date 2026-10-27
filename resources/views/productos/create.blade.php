@extends('layouts.app')

@section('title', 'Nuevo producto | StorePanel')

@section('content')
    <x-ui.page-header
        title="Nuevo producto"
        description="Registra un producto para incorporarlo a tu inventario."
    />

    <div class="mx-auto max-w-3xl">
        <x-ui.card>
            <form
                action="{{ route('productos.store') }}"
                method="POST"
                class="space-y-6"
            >
                @csrf

                {{-- Información del producto --}}
                <div class="border-b border-gray-100 pb-5">
                    <h2 class="text-base font-semibold text-gray-900">
                        Información del producto
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Completa los datos básicos del producto.
                    </p>
                </div>

                {{-- Nombre --}}
                <x-ui.input
                    name="nombre"
                    label="Nombre del producto"
                    placeholder="Ej. Teclado mecánico"
                    :required="true"
                    :error="$errors->first('nombre')"
                />

                {{-- Precio --}}
                <x-ui.input
                    name="precio"
                    label="Precio (Bs.)"
                    type="number"
                    placeholder="0.00"
                    :required="true"
                    :error="$errors->first('precio')"
                    step="0.01"
                    min="0"
                />

                {{-- Descripción --}}
                <x-ui.textarea
                    name="descripcion"
                    label="Descripción"
                    placeholder="Describe las características del producto..."
                    :error="$errors->first('descripcion')"
                    :rows="4"
                />

                {{-- Acciones --}}
                <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-5 sm:flex-row sm:justify-end">
                    <x-ui.button-link
                        href="{{ route('productos.index') }}"
                        variant="secondary"
                        size="lg"
                    >
                        Cancelar
                    </x-ui.button-link>

                    <x-ui.button
                        type="submit"
                        variant="primary"
                        size="lg"
                    >
                        Guardar producto
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
@endsection

