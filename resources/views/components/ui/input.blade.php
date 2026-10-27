@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'error' => null,
])

<div class="w-full">
    <label
        for="{{ $name }}"
        class="mb-2 block text-sm font-medium text-gray-700"
    >
        {{ $label }}

        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        {{ $attributes->class([
            'block w-full rounded-xl border bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm outline-none transition',
            'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100' => $error,
            'border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100' => ! $error,
        ]) }}
    >

    @if ($error)
        <p class="mt-1.5 text-sm text-red-600">
            {{ $error }}
        </p>
    @endif
</div>
