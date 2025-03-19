@props(['active' => false])

<a {{ $attributes->merge(['class' => $active ? 'block px-4 py-2 text-sm text-gray-700 focus:bg-gray-200 focus:outline-none bg-gray-400 text-white' : 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none']) }}
   aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
