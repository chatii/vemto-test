@props([
    'name',
    'label',
    'value',
    'checked' => false
])

@php
    $checked = !! $checked
@endphp

<div class="form-check">
    <input type="hidden" id="{{ $name }}-hidden" name="{{ $name }}" value="0">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        value="1"
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'form-check-input']) }}
    >
    @if($label ?? null)
        <label class="form-check-label" for="{{ $name }}">
            {{ $label }}
        </label>
    @endif
</div>

@error($name)
    @include('components.inputs.partials.error')
@enderror