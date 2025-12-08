<button {{ $attributes->merge([
    'type' => 'submit',
    'class' =>
        'inline-flex items-center justify-center gap-2 px-4 py-2 ' .
        'rounded-lg font-semibold text-xs uppercase tracking-widest ' .
        'bg-gm-danger text-white border border-transparent ' .
        'hover:opacity-90 active:opacity-80 ' .
        'focus:outline-none focus:ring-2 focus:ring-gm-danger/40 focus:ring-offset-0 ' .
        'transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
