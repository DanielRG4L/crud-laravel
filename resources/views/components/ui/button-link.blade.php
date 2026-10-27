@props([
    'href',
    'variant' => 'secondary',
    'size' => 'md',
])

@php
    $variants = [
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700',
        'secondary' => 'border border-gray-200 bg-white text-gray-700 hover:bg-gray-50',
        'danger' => 'bg-red-50 text-red-700 hover:bg-red-100',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-5 py-3 text-base',
    ];

    $classes = 'inline-flex cursor-pointer items-center justify-center rounded-xl font-semibold transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 '
        . ($variants[$variant] ?? $variants['secondary']) . ' '
        . ($sizes[$size] ?? $sizes['md']);
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->class([$classes]) }}
>
    {{ $slot }}
</a>
