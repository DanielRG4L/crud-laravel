@props([
    'label',
    'name',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'error' => null,
    'rows' => 4,
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

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        {{ $attributes->class([
            'block w-full rounded-xl border bg-white px-4 py-3 text-sm text-gray-900 shadow-sm outline-none transition placeholder:text-gray-400',
            'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100' => $error,
            'border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100' => ! $error,
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @if ($error)
        <p class="mt-1.5 text-sm text-red-600">
            {{ $error }}
        </p>
    @endif
</div>
