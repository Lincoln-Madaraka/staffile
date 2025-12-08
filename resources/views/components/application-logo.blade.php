@props([
    'src' => asset('import/assets/logo.png'),
    'alt' => config('app.name', 'GiftMed') . ' Logo',
])

<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    {{ $attributes->merge([
        'class' => 'h-20 w-20 rounded-full object-cover border border-gm-border bg-gm-surface2'
    ]) }}
/>
