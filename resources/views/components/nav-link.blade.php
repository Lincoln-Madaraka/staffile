@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium ' .
      'text-gm-text bg-gm-surface2 border border-gm-border ' .
      'hover:border-gm-primary/50 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium ' .
      'text-gm-muted border border-transparent ' .
      'hover:text-gm-text hover:bg-gm-surface2 hover:border-gm-border ' .
      'transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
