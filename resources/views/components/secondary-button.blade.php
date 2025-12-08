<button {{ $attributes->merge([
    'type' => 'button',
    'class' =>
        'inline-flex items-center justify-center gap-2 px-4 py-2 ' .
        'rounded-lg font-semibold text-xs uppercase tracking-widest ' .
        'bg-gm-surface-2 text-gm-text border border-gm-border ' .
        'hover:bg-gm-surface hover:border-gm-primary/40 ' .
        'focus:outline-none focus:ring-2 focus:ring-gm-primary/30 focus:ring-offset-0 ' .
        'disabled:opacity-50 disabled:cursor-not-allowed ' .
        'transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
