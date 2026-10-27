@extends('layouts.app')

@section('title', 'Productos | StorePanel')

@section('content')
    <x-ui.page-header
        title="Productos"
        description="Administra y organiza tu inventario."
    >
        <x-slot:actions>
            <x-ui.button variant="primary">
                Nuevo producto
            </x-ui.button>
        </x-slot:actions>
    </x-ui.page-header>

    <x-ui.card>
        <h2 class="text-lg font-semibold text-gray-900">
            Tu inventario
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            Aquí mostraremos la tabla de productos.
        </p>
    </x-ui.card>
@endsection
