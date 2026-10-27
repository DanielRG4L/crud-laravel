@extends('layouts.app')

@section('title', 'Editar producto | StorePanel')

@section('content')
    <x-ui.page-header
        title="Editar producto"
        description="Actualiza la información de este producto."
    />

    <div class="mx-auto max-w-3xl">
        <x-ui.card>
            {{-- Información del registro --}}
            <div class="mb-6 flex items-center gap-3 rounded-xl bg-gray-50 p-4">
                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700">
                    <span class="text-lg font-bold">#</span>
                </div>

                <div class="min-w-0">
                    <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                        Editando producto
                    </p>

                    <p class="truncate font-semibold text-gray-900">
                        {{ $producto->nombre }}
                    </p>

                    <p class="text-xs text-gray-500">
                        ID: {{ $producto->id }}
                    </p>
                </div>
            </div>

            <form
                action="{{ route('productos.update', $producto) }}"
                method="POST"
                class="space-y-6"
            >
                @csrf
                @method('PUT')

                {{-- Nombre --}}
                <x-ui.input
                    name="nombre"
                    label="Nombre del producto"
                    placeholder="Ej. Teclado mecánico"
                    :value="$producto->nombre"
                    :required="true"
                    :error="$errors->first('nombre')"
                />

                {{-- Precio --}}
                <x-ui.input
                    name="precio"
                    label="Precio (Bs.)"
                    type="number"
                    placeholder="0.00"
                    :value="$producto->precio"
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
                    :value="$producto->descripcion"
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
                        Guardar cambios
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
@endsection
