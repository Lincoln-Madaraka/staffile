@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full px-4 py-2 text-left text-base font-medium ' .
      'text-gm-text bg-gm-surface2 border-l-4 border-gm-primary ' .
      'focus:outline-none transition duration-150 ease-in-out'
    : 'block w-full px-4 py-2 text-left text-base font-medium ' .
      'text-gm-muted border-l-4 border-transparent ' .
      'hover:text-gm-text hover:bg-gm-surface2 hover:border-gm-border ' .
      'focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
