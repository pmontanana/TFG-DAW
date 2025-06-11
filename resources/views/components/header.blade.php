<nav class="bg-gray-800" x-data="{ mobileMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                        aria-controls="mobile-menu"
                        aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Abrir Menu Principal</span>
                    <svg x-show="!mobileMenuOpen" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-between sm:justify-between">
                <div class="flex flex-col items-center sm:items-start">
                    <div class="flex items-center">
                        <h2 class="text-white text-base font-bold">Cafeteria CLMSkills 2025</h2>
                    </div>

                    <div class="hidden sm:flex items-center space-x-3 mt-1">
                        <div class="flex items-center text-xs md:text-sm text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                            </svg>
                            <span class="ml-1 font-semibold">+34 239 132 123</span>
                        </div>
                        <div class="flex items-center text-xs md:text-sm text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"></path>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"></path>
                            </svg>
                            <span class="ml-1 font-semibold">Lun-Sab: 11:00 - 23:00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <x-nav-link href="/" :active="request()->is('/')">Inicio</x-nav-link>
                        <x-nav-link href="/menus" :active="request()->is('menus')">Menus</x-nav-link>
                        <x-dropdown>Platos</x-dropdown>
                        <x-nav-link href="/buscar" :active="request()->is('buscar*')">Buscar</x-nav-link>
                        <x-nav-link href="/contacto" :active="request()->is('contacto')">Contacto</x-nav-link>

                        @guest
                            <x-nav-link href="/register" :active="request()->is('register')">Registrate</x-nav-link>
                            <x-nav-link href="/login" :active="request()->is('login')">Inicia Sesión</x-nav-link>
                        @else
                            @if(auth()->user()->isAdmin())
                                <x-nav-link href="/admin/dashboard" :active="request()->is('admin*')">Admin</x-nav-link>
                            @endif
                            <x-nav-link href="/mis-reservas" :active="request()->is('mis-reservas')">Mis Reservas</x-nav-link>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-black shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                                    Cerrar Sesión
                                </button>
                            </form>
                        @endguest

                        <a href="/reservas" class="inline-flex items-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-black shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                            Reservar una Mesa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         x-cloak
         class="sm:hidden"
         id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="/" class="block rounded-md {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Inicio</a>
            <a href="/menus" class="block rounded-md {{ request()->is('menus') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Menus</a>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                    Platos
                    <svg class="float-right h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-cloak class="mt-2 space-y-1 pl-4">
                    <a href="/pizzas" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Pizzas</a>
                    <a href="/pasta" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Pasta</a>
                    <a href="/hamburguesas" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Hamburguesas</a>
                </div>
            </div>

            <a href="/buscar" class="block rounded-md {{ request()->is('buscar*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Buscar</a>
            <a href="/contacto" class="block rounded-md {{ request()->is('contacto') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Contacto</a>

            @guest
                <a href="/register" class="block rounded-md {{ request()->is('register') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Registrate</a>
                <a href="/login" class="block rounded-md {{ request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Inicia Sesión</a>
            @else
                @if(auth()->user()->isAdmin())
                    <a href="/admin/dashboard" class="block rounded-md {{ request()->is('admin*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Admin</a>
                @endif
                <a href="/mis-reservas" class="block rounded-md {{ request()->is('mis-reservas') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-base font-medium">Mis Reservas</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                        Cerrar Sesión
                    </button>
                </form>
            @endauth

            <a href="/reservas" class="inline-flex items-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-black shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300 mt-2">
                Reservar una Mesa
            </a>
        </div>
    </div>
</nav>
