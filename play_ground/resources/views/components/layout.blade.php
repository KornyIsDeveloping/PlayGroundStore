<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PlayGroundStore</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @vite(['resources/js/app.js','resources/js/toggler.js', 'resources/css/app.css'])
    </head>
    <body class="h-full">
    <div class="min-h-full">
        <nav class="bg-custom-light dark:bg-custom-dark">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://img.freepik.com/premium-vector/stick-controller-art_262962-275.jpg" alt="Game controller">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="/products" :active="request()->is('products')">Games</x-nav-link>
                                <x-nav-link href="/wishlist" :active="request()->is('wishlist')">Wishlist</x-nav-link>
                                <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <div class="flex flex-col justify-center ml-3 mr-5">
                                <input type="checkbox" name="light-switch" id="light-switch" class="light-switch sr-only" />
                                <label class="relative cursor-pointer p-2" for="light-switch">
                                    <svg class="dark:hidden" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-slate-300" d="M7 0h2v2H7zM12.88 1.637l1.414 1.415-1.415 1.413-1.413-1.414zM14 7h2v2h-2zM12.95 14.433l-1.414-1.413 1.413-1.415 1.415 1.414zM7 14h2v2H7zM2.98 14.364l-1.413-1.415 1.414-1.414 1.414 1.415zM0 7h2v2H0zM3.05 1.706 4.463 3.12 3.05 4.535 1.636 3.12z" />
                                        <path class="fill-slate-400" d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z" />
                                    </svg>
                                    <svg class="hidden dark:block" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-slate-400" d="M6.2 1C3.2 1.8 1 4.6 1 7.9 1 11.8 4.2 15 8.1 15c3.3 0 6-2.2 6.9-5.2C9.7 11.2 4.8 6.3 6.2 1Z" />
                                        <path class="fill-slate-500" d="M12.5 5a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 5Z" />
                                    </svg>
                                    <span class="sr-only">Switch to light / dark version</span>
                                </label>
                            </div>
                            @guest
                                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endguest
                                @auth
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <x-form-button>Log Out</x-form-button>
                                    </form>
                                @endauth
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="bg-custom-light-button inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/products" :active="request()->is('products')">Games</x-nav-link>
                    <x-nav-link href="/wishlist" :active="request()->is('wishlist')">Wishlist</x-nav-link>
                    <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://c4.wallpaperflare.com/wallpaper/702/705/75/rocket-raccoon-baby-groot-artwork-hd-wallpaper-preview.jpg" alt="Guardian of the Galaxy">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Kornuletz</div>
                            <div class="text-sm font-medium leading-none text-gray-400">korny@dev.com</div>
                        </div>
                        <button type="button" class="bg-custom-light-button ml-auto flex-shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-custom-light dark:bg-custom-dark">
            <div class="bg-custom-light dark:bg-custom-dark mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-custom-dark-text">{{ $heading }}</h1>
                @admin
                    <x-button href="/products/create">Add a new Game</x-button>
                @endadmin
            </div>
        </header>
        <main class="bg-custom-light dark:bg-custom-dark">
            <div class="bg-custom-light dark:bg-custom-dark mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
