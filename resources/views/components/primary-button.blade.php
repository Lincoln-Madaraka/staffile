<button {{ $attributes->merge([
    'type' => 'submit',
    'class' =>
        'inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg ' .
        'font-semibold text-xs uppercase tracking-widest ' .
        'bg-gm-primary text-white border border-transparent ' .
        'hover:bg-gm-primaryHover ' .
        'focus:outline-none focus:ring-2 focus:ring-gm-primary/40 focus:ring-offset-0 ' .
        'active:opacity-90 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
