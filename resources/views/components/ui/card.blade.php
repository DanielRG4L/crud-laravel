@props([
    'padding' => 'md',
])

@php
    $paddings = [
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
    ];

    $classes = 'rounded-2xl border border-gray-200 bg-white shadow-sm ' . ($paddings[$padding] ?? $paddings['md']);
@endphp

<div {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</div>