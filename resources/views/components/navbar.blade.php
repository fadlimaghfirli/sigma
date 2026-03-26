<nav x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="(scrolled || mobileMenuOpen) ? 'bg-white/80 dark:bg-zinc-950/80 backdrop-blur-lg border-zinc-200 dark:border-zinc-800 shadow-sm' : 'bg-transparent border-transparent'"
    class="fixed w-full z-50 top-0 border-b transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center transition-all duration-300" :class="scrolled ? 'h-16' : 'h-20'">

            <a href="{{ url('/') }}" class="flex flex-row items-center gap-1 cursor-pointer">
                <img src="{{ asset('favicon_sigma.png') }}" alt="brand logo" width="35">
                <span
                    class="font-space-grotesk font-bold text-xl tracking-tight text-zinc-700 dark:text-zinc-200">SIGMA</span>
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="relative text-sm font-medium {{ request()->is('/') ? 'text-violet-600 dark:text-violet-400' : 'text-zinc-600 dark:text-zinc-300 hover:text-violet-600 dark:hover:text-violet-400' }} transition-colors group py-2">
                    <span x-text="lang === 'id' ? 'Beranda' : 'Home'">Beranda</span>
                    <span
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-violet-600 dark:bg-violet-400 transition-all duration-300 rounded-full {{ request()->is('/') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ url('/gallery') }}"
                    class="relative text-sm font-medium {{ request()->is('gallery') ? 'text-violet-600 dark:text-violet-400' : 'text-zinc-600 dark:text-zinc-300 hover:text-violet-600 dark:hover:text-violet-400' }} transition-colors group py-2">
                    <span x-text="lang === 'id' ? 'Galeri' : 'Gallery'">Galeri</span>
                    <span
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-violet-600 dark:bg-violet-400 transition-all duration-300 rounded-full {{ request()->is('gallery') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ url('/about') }}"
                    class="relative text-sm font-medium {{ request()->is('about') ? 'text-violet-600 dark:text-violet-400' : 'text-zinc-600 dark:text-zinc-300 hover:text-violet-600 dark:hover:text-violet-400' }} transition-colors group py-2">
                    <span x-text="lang === 'id' ? 'Tentang' : 'About'">Tentang</span>
                    <span
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-violet-600 dark:bg-violet-400 transition-all duration-300 rounded-full {{ request()->is('about') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <a href="{{ url('/contact') }}"
                    class="relative text-sm font-medium {{ request()->is('contact') ? 'text-violet-600 dark:text-violet-400' : 'text-zinc-600 dark:text-zinc-300 hover:text-violet-600 dark:hover:text-violet-400' }} transition-colors group py-2">
                    <span x-text="lang === 'id' ? 'Kontak' : 'Contact'">Kontak</span>
                    <span
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-0.5 bg-violet-600 dark:bg-violet-400 transition-all duration-300 rounded-full {{ request()->is('contact') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
            </div>

            <div class="flex items-center gap-3 sm:gap-4">

                <div class="relative" x-data="{ langOpen: false }">
                    <button @click="langOpen = !langOpen" @click.away="langOpen = false" type="button"
                        class="flex items-center gap-1 text-sm font-medium text-zinc-600 dark:text-zinc-300 hover:text-violet-600 transition-colors p-2 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800">
                        <span x-text="lang === 'id' ? 'ID' : 'EN'" class="font-space-grotesk font-bold">ID</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="langOpen ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="langOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        x-cloak
                        class="absolute right-0 mt-2 w-36 bg-white dark:bg-zinc-900 rounded-xl shadow-lg border border-zinc-200 dark:border-zinc-800 py-2 overflow-hidden z-50">
                        <button @click="lang = 'id'; langOpen = false"
                            class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
                            :class="lang === 'id' ? 'font-bold text-violet-600 dark:text-violet-400' : ''">🇮🇩
                            Indonesia</button>
                        <button @click="lang = 'en'; langOpen = false"
                            class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
                            :class="lang === 'en' ? 'font-bold text-violet-600 dark:text-violet-400' : ''">🇬🇧
                            English</button>
                    </div>
                </div>

                <button @click="darkMode = !darkMode" type="button"
                    class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors"
                    aria-label="Toggle Dark Mode">
                    <svg x-show="!darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                </button>

                @if (Route::has('login'))
                <div class="hidden sm:flex gap-3 items-center ml-2 border-l border-zinc-200 dark:border-zinc-800 pl-4">
                    @auth
                    <div x-data="{ openProfile: false }" class="relative">
                        <button @click="openProfile = !openProfile" @click.away="openProfile = false"
                            class="flex items-center gap-3 text-sm focus:outline-none group">

                            {{-- Avatar DiceBear --}}
                            <img class="h-9 w-9 rounded-full object-cover border-2 border-zinc-200 dark:border-zinc-700 group-hover:border-violet-400 transition-colors"
                                src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode(Auth::user()->name) }}&backgroundColor=10b981"
                                alt="{{ Auth::user()->name }}">

                            <div
                                class="flex items-center gap-1 text-zinc-700 dark:text-zinc-300 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors">
                                <span class="font-medium truncate max-w-[120px]">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200"
                                    :class="{'rotate-180': openProfile}" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>

                        {{-- Dropdown Profil --}}
                        <div x-show="openProfile" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-4 w-56 bg-white dark:bg-zinc-900 rounded-2xl shadow-xl border border-zinc-100 dark:border-zinc-800 py-2 z-50"
                            style="display: none;">

                            <div class="px-5 py-3 border-b border-zinc-100 dark:border-zinc-800 mb-2">
                                <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 truncate">
                                    {{ Auth::user()->name }}</p>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400 truncate">{{ Auth::user()->email }}
                                </p>
                            </div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-[calc(100%-1rem)] mx-auto text-left px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/30 transition-colors flex items-center gap-2.5 font-medium rounded-xl">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span x-text="lang === 'id' ? 'Keluar' : 'Log Out'">Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium px-4 py-2 rounded-xl border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
                        x-text="lang === 'id' ? 'Masuk' : 'Login'">Masuk</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="text-sm font-medium text-white bg-violet-600 px-4 py-2 rounded-xl hover:bg-violet-700 transition-colors shadow-md shadow-violet-500/20"
                        x-text="lang === 'id' ? 'Daftar' : 'Register'">Daftar</a>
                    @endif
                    @endauth
                </div>
                @endif

                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                    class="md:hidden p-2 text-zinc-600 dark:text-zinc-300 hover:text-violet-600 transition-colors rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4" x-cloak
        class="md:hidden bg-white dark:bg-zinc-950 border-b border-zinc-200 dark:border-zinc-800 absolute w-full left-0 top-full shadow-xl">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="{{ url('/') }}"
                class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->is('/') ? 'text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }} transition-colors"
                x-text="lang === 'id' ? 'Beranda' : 'Home'">Beranda</a>

            <a href="{{ url('/gallery') }}"
                class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->is('gallery') ? 'text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }} transition-colors"
                x-text="lang === 'id' ? 'Galeri' : 'Gallery'">Galeri</a>

            <a href="{{ url('/about') }}"
                class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->is('about') ? 'text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }} transition-colors"
                x-text="lang === 'id' ? 'Tentang' : 'About'">Tentang</a>

            <a href="{{ url('/contact') }}"
                class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->is('contact') ? 'text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }} transition-colors"
                x-text="lang === 'id' ? 'Kontak' : 'Contact'">Kontak</a>

            @if (Route::has('login'))
            @auth
            <div class="mt-4 pt-4 border-t border-zinc-100 dark:border-zinc-800/50">
                <div class="flex items-center gap-4 px-3 mb-4">
                    {{-- Avatar Mobile --}}
                    <img class="h-12 w-12 rounded-full object-cover border-2 border-zinc-200 dark:border-zinc-700"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode(Auth::user()->name) }}&backgroundColor=10b981"
                        alt="{{ Auth::user()->name }}">
                    <div>
                        <div class="font-semibold text-base text-zinc-900 dark:text-zinc-50">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-zinc-500 dark:text-zinc-400">{{ Auth::user()->email }}
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-left text-base font-medium text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span x-text="lang === 'id' ? 'Keluar' : 'Log Out'">Keluar</span>
                    </button>
                </form>
            </div>
            @else
            <div class="pt-4 mt-2 border-t border-zinc-100 dark:border-zinc-800/50 flex flex-col gap-3 px-2">
                <a href="{{ route('login') }}"
                    class="block text-center text-base font-medium px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors"
                    x-text="lang === 'id' ? 'Masuk Akun' : 'Login'">Masuk Akun</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="block text-center text-base font-medium text-white bg-violet-600 px-4 py-3 rounded-xl hover:bg-violet-700 transition-colors shadow-md shadow-violet-500/20"
                    x-text="lang === 'id' ? 'Daftar Akun' : 'Register'">Daftar Akun</a>
                @endif
            </div>
            @endauth
            @endif
        </div>
    </div>
</nav>