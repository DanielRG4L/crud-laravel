@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-xl font-semibold transition-colors duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';

    $variants = [
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700',
        'secondary' => 'border border-gray-200 bg-white text-gray-700 hover:bg-gray-50',
        'danger' => 'bg-red-50 text-red-700 hover:bg-red-100',
        'ghost' => 'text-gray-600 hover:bg-gray-100 hover:text-gray-900',
    ];

    $sizes = [
        'sm' => 'min-h-8 px-3 py-1.5 text-xs',
        'md' => 'min-h-10 px-4 py-2 text-sm',
        'lg' => 'min-h-11 px-5 py-2.5 text-sm',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

<button type="{{ $type }}" {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</button>