<a {{
    $attributes->merge([
        'class' =>
            'block w-full px-4 py-2 text-left text-sm leading-5 ' .
            'text-gm-text hover:bg-gm-surface-2 ' .
            'focus:outline-none focus:bg-gm-surface-2 ' .
            'transition duration-150 ease-in-out'
    ])
}}>
    {{ $slot }}
</a>
