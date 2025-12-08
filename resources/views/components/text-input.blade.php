@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' =>
            'w-full rounded-lg border border-gm-border ' .
            'bg-gm-surface text-gm-text ' .
            'placeholder:text-gm-muted ' .
            'focus:border-gm-primary focus:ring focus:ring-gm-primary/30 ' .
            'disabled:opacity-60 disabled:cursor-not-allowed transition'
    ]) !!}
>
