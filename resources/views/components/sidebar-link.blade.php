@props([
    'href',
    'active' => false,
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' =>
            ($active
                ? 'bg-white text-[#0FA958]'
                : 'text-white hover:bg-green-600 hover:text-white')
            . ' flex items-center gap-3 px-5 py-3 rounded-2xl transition duration-200'
    ]) }}>

    {{ $slot }}

</a>