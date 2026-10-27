<aside class="flex min-h-screen w-64 shrink-0 flex-col bg-gray-950 px-4 py-6 text-white">
    {{-- Marca --}}
    <a href="{{ route('productos.index') }}" class="mb-10 flex items-center gap-3 px-2">
        <span class="flex size-10 items-center justify-center rounded-xl bg-indigo-600">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                class="size-5"
                aria-hidden="true"
            >
                <path d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5z" />
                <path d="m4 7.5 8 4.5 8-4.5M12 12v9" />
            </svg>
        </span>

        <span>
            <span class="block text-base font-bold tracking-wide">
                StorePanel
            </span>
            <span class="block text-xs text-gray-400">
                ADMINISTRACIÓN
            </span>
        </span>
    </a>

    {{-- Navegación --}}
    <nav class="flex-1 space-y-1">
        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-500">
            Menú principal
        </p>

        <a
            href="{{ route('productos.index') }}"
            @class([
                'flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-colors',
                'bg-indigo-600 text-white' => request()->routeIs('productos.*'),
                'text-gray-400 hover:bg-gray-800 hover:text-white' => !request()->routeIs('productos.*'),
            ])
        >
            <span>Productos</span>
        </a>
    </nav>

    {{-- Pie del sidebar --}}
    <div class="border-t border-gray-800 pt-4">
        <p class="px-3 text-xs text-gray-500">
            Panel de inventario
        </p>
    </div>
</aside>
