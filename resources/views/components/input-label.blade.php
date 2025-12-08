@props(['value'])

<label {{ $attributes->merge([
    'class' => 'block text-sm font-medium text-gm-muted'
]) }}>
    {{ $value ?? $slot }}
</label>
