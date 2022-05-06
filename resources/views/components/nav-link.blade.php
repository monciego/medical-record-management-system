@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-slate-900 block text-slate-200 truncate transition duration-150 hover:text-slate-200'
            : 'px-3 py-2 rounded-sm mb-0.5 last:mb-0 block text-slate-200 truncate transition duration-150 hover:text-slate-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
