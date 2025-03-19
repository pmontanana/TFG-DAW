<div x-data="{ open: false, focusIndex: -1 }" class="relative inline-block text-left" @mouseenter="open = true" @mouseleave="open = false" @keydown.window.escape="open = false">
    <div>
        <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-white bg-gray-800 shadow-xs hover:bg-gray-700 focus:outline-none " id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open" @keydown.arrow-down.prevent="open = true; focusIndex = 0">
            {{ $slot }}
            <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div x-show="open" class="absolute right-0 z-10 w-56 origin-top-right rounded-md bg-white  shadow-lg ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" @mouseenter="open = true" @mouseleave="open = false" @keydown.arrow-down.prevent="focusIndex = (focusIndex + 1) % 3" @keydown.arrow-up.prevent="focusIndex = (focusIndex - 1 + 3) % 3" @keydown.enter.prevent="document.getElementById('menu-item-' + focusIndex).click()">
        <div class="py-1" role="none">
            <x-dropdown-nav-link href="/pizzas" :active="request()->is('pizzas')" x-bind:class="{ 'bg-gray-100': focusIndex === 0 }" @mouseenter="focusIndex = 0">Pizzas</x-dropdown-nav-link>
            <x-dropdown-nav-link href="/pasta" :active="request()->is('pasta')" x-bind:class="{ 'bg-gray-100': focusIndex === 1 }" @mouseenter="focusIndex = 1">Pasta</x-dropdown-nav-link>
            <x-dropdown-nav-link href="/hamburguesas" :active="request()->is('hamburguesas')" x-bind:class="{ 'bg-gray-100': focusIndex === 2 }" @mouseenter="focusIndex = 2">Hamburguesas</x-dropdown-nav-link>
        </div>
    </div>
</div>
