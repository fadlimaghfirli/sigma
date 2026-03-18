<x-frontend-layout>

    <div x-data="{ 
            kategoriAktif: 'semua', 
            filterJenis: 'semua',
            searchQuery: '',
            dropdownOpen: false,
            get dropdownOptions() {
                return this.lang === 'id' 
                ? { 'semua': 'Semua Jenis Proyek', 'tugas_akhir': 'Tugas Akhir / Skripsi', 'praktikum': 'Tugas Praktikum', 'kompetisi': 'Proyek Kompetisi' }
                : { 'semua': 'All Project Types', 'tugas_akhir': 'Final Project / Thesis', 'praktikum': 'Practicum Task', 'kompetisi': 'Competition Project' };
            }
         }"
        class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-24 flex flex-col gap-12 min-h-screen relative z-10">

        <div data-aos="fade-down" data-aos-duration="800" class="text-center md:text-left">
            <h1 class="font-space-grotesk text-4xl md:text-5xl font-bold text-zinc-900 dark:text-white mb-3">
                <span x-text="lang === 'id' ? 'Galeri Inovasi' : 'Innovation Gallery'">Galeri Inovasi</span>
            </h1>
            <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-lg max-w-2xl"
                x-text="lang === 'id' ? 'Eksplorasi mahakarya digital, aplikasi, dan purwarupa dari mahasiswa Pendidikan Informatika.' : 'Explore digital masterpieces, applications, and prototypes from Informatics Education students.'">
                Eksplorasi mahakarya digital, aplikasi, dan purwarupa dari mahasiswa Pendidikan Informatika.
            </p>
        </div>

        <div class="w-full flex flex-col gap-4 border-b border-zinc-200 dark:border-zinc-800 pb-12">
            <div data-aos="fade-up" data-aos-delay="300" class="flex items-center gap-2 mb-2">
                <span class="flex h-3 w-3 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-rose-500"></span>
                </span>
                <h2 class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white"
                    x-text="lang === 'id' ? 'Sorotan Bulan Ini' : 'Highlights of the Month'">Sorotan Bulan Ini</h2>
            </div>

            <div data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1200" x-data="{ 
                    activeSlide: 1, 
                    slideCount: 3, 
                    timer: null,
                    next() { this.activeSlide = this.activeSlide < this.slideCount ? this.activeSlide + 1 : 1; },
                    prev() { this.activeSlide = this.activeSlide > 1 ? this.activeSlide - 1 : this.slideCount; },
                    startTimer() { this.timer = setInterval(() => { this.next() }, 6000); },
                    stopTimer() { clearInterval(this.timer); }
                 }" x-init="startTimer()" @mouseenter="stopTimer()" @mouseleave="startTimer()"
                class="relative w-full h-[580px] sm:h-[600px] lg:h-[420px] rounded-[2rem] overflow-hidden shadow-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 group">

                <div class="relative w-full h-full">
                    <div x-show="activeSlide === 1" x-transition.opacity.duration.700ms
                        class="absolute inset-0 w-full h-full flex flex-col lg:flex-row">
                        <div
                            class="w-full lg:w-1/2 h-64 sm:h-72 lg:h-full relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop"
                                alt="Highlight 1"
                                class="w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear"
                                :class="activeSlide === 1 ? 'scale-110' : 'scale-100'">
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span
                                    class="px-3 py-1.5 bg-zinc-900/80 backdrop-blur-md text-white text-[10px] sm:text-xs font-bold rounded-lg uppercase tracking-wide shadow-md border border-white/10"
                                    x-text="lang === 'id' ? 'Tugas Akhir' : 'Final Project'">Tugas Akhir</span>
                            </div>
                        </div>
                        <div
                            class="w-full lg:w-1/2 flex-1 p-6 sm:p-8 lg:p-10 flex flex-col justify-center relative bg-white dark:bg-zinc-900">
                            <div x-show="activeSlide === 1"
                                x-transition:enter="transition ease-out duration-700 delay-300"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="flex-1 flex flex-col justify-center">
                                <span
                                    class="font-mono text-emerald-500 dark:text-emerald-400 font-bold uppercase tracking-wider text-xs mb-2 block">[
                                    MACHINE LEARNING ]</span>
                                <h3
                                    class="font-space-grotesk text-2xl lg:text-4xl font-bold text-zinc-900 dark:text-white mb-3 leading-tight">
                                    Sistem Deteksi Emosi Siswa AI</h3>
                                <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm lg:text-base mb-6 line-clamp-3 lg:line-clamp-4 leading-relaxed"
                                    x-text="lang === 'id' ? 'Penerapan model Machine Learning untuk mendeteksi tingkat kebosanan dan antusiasme siswa selama pembelajaran daring secara real-time.' : 'Implementation of a Machine Learning model to detect student boredom and enthusiasm during online learning in real-time.'">
                                    Penerapan model Machine Learning untuk mendeteksi tingkat kebosanan dan antusiasme
                                    siswa selama pembelajaran daring secara real-time.
                                </p>

                                <div class="flex items-center justify-between mt-auto mb-4 lg:mb-8">
                                    <div class="flex items-center gap-3">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fadli&backgroundColor=8b5cf6"
                                            alt="Kreator"
                                            class="w-10 h-10 rounded-full border-2 border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800">
                                        <div>
                                            <p class="text-zinc-900 dark:text-white text-sm font-bold">Fadli Maghfirli
                                            </p>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="text-violet-600 dark:text-violet-400 font-medium text-sm flex items-center gap-1 hover:gap-2 transition-all shrink-0">Detail
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg></a>
                                </div>
                            </div>

                            <div
                                class="border-t border-zinc-200 dark:border-zinc-800 pt-4 flex items-center justify-between shrink-0">
                                <div class="flex items-center gap-2">
                                    <button @click="activeSlide = 1"
                                        :class="activeSlide === 1 ? 'w-8 bg-violet-600' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                    <button @click="activeSlide = 2"
                                        :class="activeSlide === 2 ? 'w-8 bg-emerald-500' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                    <button @click="activeSlide = 3"
                                        :class="activeSlide === 3 ? 'w-8 bg-blue-500' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                </div>

                                <div class="flex items-center gap-2">
                                    <button @click="prev()"
                                        class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-violet-600 hover:text-white transition-colors flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button @click="next()"
                                        class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-violet-600 hover:text-white transition-colors flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeSlide === 2" x-transition.opacity.duration.700ms
                        class="absolute inset-0 w-full h-full flex flex-col lg:flex-row" x-cloak>
                        <div
                            class="w-full lg:w-1/2 h-64 sm:h-72 lg:h-full relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                            <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=1200&auto=format&fit=crop"
                                alt="Highlight 2"
                                class="w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear"
                                :class="activeSlide === 2 ? 'scale-110' : 'scale-100'">
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span
                                    class="px-3 py-1.5 bg-zinc-900/80 backdrop-blur-md text-white text-[10px] sm:text-xs font-bold rounded-lg uppercase tracking-wide shadow-md border border-white/10"
                                    x-text="lang === 'id' ? 'Praktikum' : 'Practicum'">Praktikum</span>
                            </div>
                        </div>
                        <div
                            class="w-full lg:w-1/2 flex-1 p-6 sm:p-8 lg:p-10 flex flex-col justify-center relative bg-white dark:bg-zinc-900">
                            <div x-show="activeSlide === 2"
                                x-transition:enter="transition ease-out duration-700 delay-300"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="flex-1 flex flex-col justify-center">
                                <span
                                    class="font-mono text-emerald-500 dark:text-emerald-400 font-bold uppercase tracking-wider text-xs mb-2 block">[
                                    CYBER SECURITY ]</span>
                                <h3
                                    class="font-space-grotesk text-2xl lg:text-4xl font-bold text-zinc-900 dark:text-white mb-3 leading-tight">
                                    Vulnerability Scanner Lokal</h3>
                                <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm lg:text-base mb-6 line-clamp-3 lg:line-clamp-4 leading-relaxed"
                                    x-text="lang === 'id' ? 'Tools keamanan jaringan yang dirancang menggunakan Python untuk memindai kerentanan dasar pada server institusi pendidikan secara mandiri.' : 'Network security tools designed using Python to independently scan for basic vulnerabilities on educational institution servers.'">
                                    Tools keamanan jaringan yang dirancang menggunakan Python untuk memindai kerentanan
                                    dasar pada server institusi pendidikan secara mandiri.
                                </p>

                                <div class="flex items-center justify-between mt-auto mb-4 lg:mb-8">
                                    <div class="flex items-center gap-3">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti&backgroundColor=10b981"
                                            alt="Kreator"
                                            class="w-10 h-10 rounded-full border-2 border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800">
                                        <div>
                                            <p class="text-zinc-900 dark:text-white text-sm font-bold">Siti Masruroh</p>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="text-emerald-600 dark:text-emerald-400 font-medium text-sm flex items-center gap-1 hover:gap-2 transition-all shrink-0">Detail
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg></a>
                                </div>
                            </div>

                            <div
                                class="border-t border-zinc-200 dark:border-zinc-800 pt-4 flex items-center justify-between shrink-0">
                                <div class="flex items-center gap-2">
                                    <button @click="activeSlide = 1"
                                        :class="activeSlide === 1 ? 'w-8 bg-violet-600' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                    <button @click="activeSlide = 2"
                                        :class="activeSlide === 2 ? 'w-8 bg-emerald-500' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                    <button @click="activeSlide = 3"
                                        :class="activeSlide === 3 ? 'w-8 bg-blue-500' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button @click="prev()"
                                        class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-emerald-500 hover:text-white transition-colors flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button @click="next()"
                                        class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-emerald-500 hover:text-white transition-colors flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeSlide === 3" x-transition.opacity.duration.700ms
                        class="absolute inset-0 w-full h-full flex flex-col lg:flex-row" x-cloak>
                        <div
                            class="w-full lg:w-1/2 h-64 sm:h-72 lg:h-full relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                            <img src="https://images.unsplash.com/photo-1618477388954-7852f32655ec?q=80&w=1200&auto=format&fit=crop"
                                alt="Highlight 3"
                                class="w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear"
                                :class="activeSlide === 3 ? 'scale-110' : 'scale-100'">
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span
                                    class="px-3 py-1.5 bg-zinc-900/80 backdrop-blur-md text-white text-[10px] sm:text-xs font-bold rounded-lg uppercase tracking-wide shadow-md border border-white/10"
                                    x-text="lang === 'id' ? 'Kompetisi' : 'Competition'">Kompetisi</span>
                            </div>
                        </div>
                        <div
                            class="w-full lg:w-1/2 flex-1 p-6 sm:p-8 lg:p-10 flex flex-col justify-center relative bg-white dark:bg-zinc-900">
                            <div x-show="activeSlide === 3"
                                x-transition:enter="transition ease-out duration-700 delay-300"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="flex-1 flex flex-col justify-center">
                                <span
                                    class="font-mono text-blue-500 dark:text-blue-400 font-bold uppercase tracking-wider text-xs mb-2 block">[
                                    WEB APP / LARAVEL ]</span>
                                <h3
                                    class="font-space-grotesk text-2xl lg:text-4xl font-bold text-zinc-900 dark:text-white mb-3 leading-tight">
                                    Marketplace Freelance Kampus</h3>
                                <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm lg:text-base mb-6 line-clamp-3 lg:line-clamp-4 leading-relaxed"
                                    x-text="lang === 'id' ? 'Aplikasi berbasis web inovatif untuk menghubungkan mahasiswa yang memiliki keahlian IT dengan berbagai proyek lepas di lingkungan universitas.' : 'An innovative web-based application to connect students with IT skills to various freelance projects within the university environment.'">
                                    Aplikasi berbasis web inovatif untuk menghubungkan mahasiswa yang memiliki keahlian
                                    IT dengan berbagai proyek lepas di lingkungan universitas.
                                </p>

                                <div class="flex items-center justify-between mt-auto mb-4 lg:mb-8">
                                    <div class="flex items-center gap-3">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Aditya&backgroundColor=3b82f6"
                                            alt="Kreator"
                                            class="w-10 h-10 rounded-full border-2 border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800">
                                        <div>
                                            <p class="text-zinc-900 dark:text-white text-sm font-bold">M. Aditya F.</p>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="text-blue-600 dark:text-blue-400 font-medium text-sm flex items-center gap-1 hover:gap-2 transition-all shrink-0">Detail
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg></a>
                                </div>
                            </div>

                            <div
                                class="border-t border-zinc-200 dark:border-zinc-800 pt-4 flex items-center justify-between shrink-0">
                                <div class="flex items-center gap-2">
                                    <button @click="activeSlide = 1"
                                        :class="activeSlide === 1 ? 'w-8 bg-violet-600' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                    <button @click="activeSlide = 2"
                                        :class="activeSlide === 2 ? 'w-8 bg-emerald-500' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                    <button @click="activeSlide = 3"
                                        :class="activeSlide === 3 ? 'w-8 bg-blue-500' : 'w-2 bg-zinc-300 dark:bg-zinc-700 hover:bg-zinc-400 dark:hover:bg-zinc-500'"
                                        class="h-2 rounded-full transition-all duration-500"></button>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button @click="prev()"
                                        class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-blue-600 hover:text-white transition-colors flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button @click="next()"
                                        class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-blue-600 hover:text-white transition-colors flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-6 pt-4">
            <h2 data-aos="fade-up" class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white"
                x-text="lang === 'id' ? 'Eksplorasi Semua Karya' : 'Explore All Projects'">Eksplorasi Semua Karya</h2>

            <div data-aos="fade-up" data-aos-delay="100"
                class="flex flex-col sm:flex-row gap-4 items-center justify-between bg-white dark:bg-zinc-900 p-3 rounded-2xl shadow-sm border border-zinc-200 dark:border-zinc-800 relative z-30">
                <div class="relative w-full sm:w-2/3 flex items-center">
                    <svg class="w-5 h-5 text-zinc-400 absolute left-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" x-model="searchQuery"
                        :placeholder="lang === 'id' ? 'Cari nama proyek, teknologi, atau kreator...' : 'Search projects, tech, or creators...'"
                        class="w-full bg-transparent border-none text-zinc-900 dark:text-zinc-50 placeholder-zinc-400 focus:ring-0 pl-12 pr-4 py-2 font-roboto outline-none">
                </div>

                <div class="hidden sm:block w-px h-8 bg-zinc-200 dark:bg-zinc-700"></div>

                <div class="w-full sm:w-1/3 relative" @click.away="dropdownOpen = false">
                    <button @click="dropdownOpen = !dropdownOpen" type="button"
                        class="w-full flex items-center justify-between bg-zinc-50 dark:bg-zinc-800/50 hover:bg-zinc-100 dark:hover:bg-zinc-800 px-4 py-2.5 rounded-xl text-sm font-semibold text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700 transition-colors">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-violet-500 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                </path>
                            </svg>
                            <span x-text="dropdownOptions[filterJenis]"></span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 text-zinc-400"
                            :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute top-full left-0 right-0 mt-2 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl shadow-xl overflow-hidden z-50"
                        x-cloak>
                        <template x-for="(label, value) in dropdownOptions" :key="value">
                            <button @click="filterJenis = value; dropdownOpen = false"
                                class="w-full flex items-center px-4 py-3 text-sm text-left transition-colors"
                                :class="filterJenis === value ? 'bg-violet-50 dark:bg-violet-900/20 text-violet-600 dark:text-violet-400 font-bold' : 'text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800'">
                                <span x-text="label"></span>
                                <svg x-show="filterJenis === value" class="w-4 h-4 ml-auto" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </button>
                        </template>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200"
                class="flex overflow-x-auto pb-2 gap-3 snap-x scrollbar-hide w-full relative z-20">
                <button @click="kategoriAktif = 'semua'"
                    :class="kategoriAktif === 'semua' ? 'bg-violet-600 text-white shadow-md shadow-violet-500/20 border-violet-600' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:border-violet-400 border-zinc-200 dark:border-zinc-800'"
                    class="px-6 py-2.5 rounded-full border text-sm font-semibold whitespace-nowrap transition-all duration-300 snap-start"
                    x-text="lang === 'id' ? 'Semua Kategori' : 'All Categories'">Semua Kategori</button>
                <button @click="kategoriAktif = 'web'"
                    :class="kategoriAktif === 'web' ? 'bg-violet-600 text-white shadow-md shadow-violet-500/20 border-violet-600' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:border-violet-400 border-zinc-200 dark:border-zinc-800'"
                    class="px-6 py-2.5 rounded-full border text-sm font-semibold whitespace-nowrap transition-all duration-300 snap-start">Web
                    App</button>
                <button @click="kategoriAktif = 'iot'"
                    :class="kategoriAktif === 'iot' ? 'bg-violet-600 text-white shadow-md shadow-violet-500/20 border-violet-600' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:border-violet-400 border-zinc-200 dark:border-zinc-800'"
                    class="px-6 py-2.5 rounded-full border text-sm font-semibold whitespace-nowrap transition-all duration-300 snap-start">Internet
                    of Things</button>
                <button @click="kategoriAktif = 'uiux'"
                    :class="kategoriAktif === 'uiux' ? 'bg-violet-600 text-white shadow-md shadow-violet-500/20 border-violet-600' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:border-violet-400 border-zinc-200 dark:border-zinc-800'"
                    class="px-6 py-2.5 rounded-full border text-sm font-semibold whitespace-nowrap transition-all duration-300 snap-start">UI/UX
                    Design</button>
                <button @click="kategoriAktif = 'game'"
                    :class="kategoriAktif === 'game' ? 'bg-violet-600 text-white shadow-md shadow-violet-500/20 border-violet-600' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 hover:border-violet-400 border-zinc-200 dark:border-zinc-800'"
                    class="px-6 py-2.5 rounded-full border text-sm font-semibold whitespace-nowrap transition-all duration-300 snap-start">Game
                    Dev</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">

            <div data-aos="fade-up" data-aos-delay="300"
                x-show="(kategoriAktif === 'semua' || kategoriAktif === 'web') && (filterJenis === 'semua' || filterJenis === 'praktikum')"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95"
                class="bg-white dark:bg-zinc-900 rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-zinc-200 dark:border-zinc-800 flex flex-col group">
                <div class="w-full h-56 relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=800&auto=format&fit=crop"
                        alt="Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-emerald-600/90 backdrop-blur-sm text-white text-[10px] sm:text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wide shadow-md">
                        Praktikum</div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-1">
                    <span
                        class="font-mono text-xs font-bold text-violet-600 dark:text-violet-400 uppercase tracking-wider mb-3">[
                        WEB APP ]</span>
                    <h3
                        class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors line-clamp-2">
                        Sistem Ujian CBT Terintegrasi</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">Aplikasi ujian
                        berbasis komputer yang dilengkapi dengan fitur pengawasan AI untuk mendeteksi kecurangan secara
                        real-time.</p>

                    <div class="flex items-center gap-4 text-xs font-semibold text-zinc-500 dark:text-zinc-400 mb-6">
                        <span class="flex items-center gap-1.5 group/like cursor-pointer">
                            <svg class="w-4 h-4 group-hover/like:text-rose-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span class="group-hover/like:text-rose-500 transition-colors">1.2k</span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>4.5k</span>
                        </span>
                    </div>

                    <div
                        class="mt-auto flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800 pt-5 shrink-0">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Delta&backgroundColor=8b5cf6"
                                alt="Kreator" class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700">
                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Tim Delta Tech</span>
                        </div>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-300 group-hover:bg-violet-600 group-hover:text-white transition-colors"
                            aria-label="Lihat Detail">
                            <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="400"
                x-show="(kategoriAktif === 'semua' || kategoriAktif === 'iot') && (filterJenis === 'semua' || filterJenis === 'tugas_akhir')"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95"
                class="bg-white dark:bg-zinc-900 rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-zinc-200 dark:border-zinc-800 flex flex-col group">
                <div class="w-full h-56 relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=800&auto=format&fit=crop"
                        alt="Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-violet-600/90 backdrop-blur-sm text-white text-[10px] sm:text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wide shadow-md">
                        Tugas Akhir</div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-1">
                    <span
                        class="font-mono text-xs font-bold text-emerald-500 dark:text-emerald-400 uppercase tracking-wider mb-3">[
                        INTERNET OF THINGS ]</span>
                    <h3
                        class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors line-clamp-2">
                        Smart Farming Detector</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">Prototipe IoT
                        berbasis mikrokontroler untuk memantau kelembapan tanah dan suhu udara secara otomatis via
                        Telegram.</p>
                    <div class="flex items-center gap-4 text-xs font-semibold text-zinc-500 dark:text-zinc-400 mb-6">
                        <span class="flex items-center gap-1.5 group/like cursor-pointer">
                            <svg class="w-4 h-4 group-hover/like:text-rose-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span class="group-hover/like:text-rose-500 transition-colors">892</span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>3.1k</span>
                        </span>
                    </div>
                    <div
                        class="mt-auto flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800 pt-5 shrink-0">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Budi&backgroundColor=10b981"
                                alt="Kreator" class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700">
                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Budi Santoso</span>
                        </div>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-300 group-hover:bg-emerald-500 group-hover:text-white transition-colors"
                            aria-label="Lihat Detail">
                            <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="500"
                x-show="(kategoriAktif === 'semua' || kategoriAktif === 'uiux') && (filterJenis === 'semua' || filterJenis === 'kompetisi')"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95"
                class="bg-white dark:bg-zinc-900 rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-zinc-200 dark:border-zinc-800 flex flex-col group">
                <div class="w-full h-56 relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop"
                        alt="Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-blue-600/90 backdrop-blur-sm text-white text-[10px] sm:text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wide shadow-md">
                        Kompetisi</div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-1">
                    <span
                        class="font-mono text-xs font-bold text-blue-500 dark:text-blue-400 uppercase tracking-wider mb-3">[
                        UI/UX DESIGN ]</span>
                    <h3
                        class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                        EduLearn: UI/UX Redesign</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">Perancangan ulang
                        antarmuka sistem manajemen pembelajaran (LMS) kampus yang lebih intuitif dan ramah disabilitas.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-semibold text-zinc-500 dark:text-zinc-400 mb-6">
                        <span class="flex items-center gap-1.5 group/like cursor-pointer">
                            <svg class="w-4 h-4 group-hover/like:text-rose-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span class="group-hover/like:text-rose-500 transition-colors">456</span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>1.8k</span>
                        </span>
                    </div>
                    <div
                        class="mt-auto flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800 pt-5 shrink-0">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Kreatif&backgroundColor=3b82f6"
                                alt="Kreator" class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700">
                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Kreatif Studio</span>
                        </div>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-300 group-hover:bg-blue-600 group-hover:text-white transition-colors"
                            aria-label="Lihat Detail">
                            <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="300"
                x-show="(kategoriAktif === 'semua' || kategoriAktif === 'web') && (filterJenis === 'semua' || filterJenis === 'tugas_akhir')"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95"
                class="bg-white dark:bg-zinc-900 rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-zinc-200 dark:border-zinc-800 flex flex-col group">
                <div class="w-full h-56 relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
                        alt="Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-violet-600/90 backdrop-blur-sm text-white text-[10px] sm:text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wide shadow-md">
                        Tugas Akhir</div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-1">
                    <span
                        class="font-mono text-xs font-bold text-violet-600 dark:text-violet-400 uppercase tracking-wider mb-3">[
                        WEB APP ]</span>
                    <h3
                        class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2 group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors line-clamp-2">
                        Sistem Pakar Diagnosa Gizi</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">Membangun website
                        sistem pakar menggunakan metode Forward Chaining untuk mendiagnosa defisiensi gizi anak.</p>
                    <div class="flex items-center gap-4 text-xs font-semibold text-zinc-500 dark:text-zinc-400 mb-6">
                        <span class="flex items-center gap-1.5 group/like cursor-pointer">
                            <svg class="w-4 h-4 group-hover/like:text-rose-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span class="group-hover/like:text-rose-500 transition-colors">312</span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>1.1k</span>
                        </span>
                    </div>
                    <div
                        class="mt-auto flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800 pt-5 shrink-0">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fadli&backgroundColor=8b5cf6"
                                alt="Kreator" class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700">
                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Fadli Maghfirli</span>
                        </div>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-300 group-hover:bg-violet-600 group-hover:text-white transition-colors"
                            aria-label="Lihat Detail">
                            <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="400"
                x-show="(kategoriAktif === 'semua' || kategoriAktif === 'uiux') && (filterJenis === 'semua' || filterJenis === 'praktikum')"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95"
                class="bg-white dark:bg-zinc-900 rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-zinc-200 dark:border-zinc-800 flex flex-col group">
                <div class="w-full h-56 relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                    <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff0f?q=80&w=800&auto=format&fit=crop"
                        alt="Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-emerald-600/90 backdrop-blur-sm text-white text-[10px] sm:text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wide shadow-md">
                        Praktikum</div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-1">
                    <span
                        class="font-mono text-xs font-bold text-blue-500 dark:text-blue-400 uppercase tracking-wider mb-3">[
                        UI/UX DESIGN ]</span>
                    <h3
                        class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                        E-Wallet App Redesign</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">Studi kasus
                        mendesain ulang aplikasi dompet digital populer untuk meningkatkan kemudahan penggunaan pada
                        lansia.</p>
                    <div class="flex items-center gap-4 text-xs font-semibold text-zinc-500 dark:text-zinc-400 mb-6">
                        <span class="flex items-center gap-1.5 group/like cursor-pointer">
                            <svg class="w-4 h-4 group-hover/like:text-rose-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span class="group-hover/like:text-rose-500 transition-colors">670</span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>2.4k</span>
                        </span>
                    </div>
                    <div
                        class="mt-auto flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800 pt-5 shrink-0">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Aditya&backgroundColor=3b82f6"
                                alt="Kreator" class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700">
                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">M. Aditya F.</span>
                        </div>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-300 group-hover:bg-blue-600 group-hover:text-white transition-colors"
                            aria-label="Lihat Detail">
                            <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="500"
                x-show="(kategoriAktif === 'semua' || kategoriAktif === 'game') && (filterJenis === 'semua' || filterJenis === 'kompetisi')"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95"
                class="bg-white dark:bg-zinc-900 rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-zinc-200 dark:border-zinc-800 flex flex-col group">
                <div class="w-full h-56 relative overflow-hidden bg-zinc-200 dark:bg-zinc-800 shrink-0">
                    <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?q=80&w=800&auto=format&fit=crop"
                        alt="Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-zinc-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-blue-600/90 backdrop-blur-sm text-white text-[10px] sm:text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wide shadow-md">
                        Kompetisi</div>
                </div>
                <div class="p-6 md:p-8 flex flex-col flex-1">
                    <span
                        class="font-mono text-xs font-bold text-rose-500 dark:text-rose-400 uppercase tracking-wider mb-3">[
                        GAME DEV ]</span>
                    <h3
                        class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors line-clamp-2">
                        Math Adventure 2D</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-sm mb-4 line-clamp-2">Game edukasi
                        platformer 2D yang dibuat dengan Unity untuk membantu siswa SD belajar matematika dasar secara
                        menyenangkan.</p>
                    <div class="flex items-center gap-4 text-xs font-semibold text-zinc-500 dark:text-zinc-400 mb-6">
                        <span class="flex items-center gap-1.5 group/like cursor-pointer">
                            <svg class="w-4 h-4 group-hover/like:text-rose-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span class="group-hover/like:text-rose-500 transition-colors">1.5k</span>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>6.2k</span>
                        </span>
                    </div>
                    <div
                        class="mt-auto flex items-center justify-between border-t border-zinc-100 dark:border-zinc-800 pt-5 shrink-0">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Unity&backgroundColor=f43f5e"
                                alt="Kreator" class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700">
                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Pixel Team</span>
                        </div>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-300 group-hover:bg-rose-600 group-hover:text-white transition-colors"
                            aria-label="Lihat Detail">
                            <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div data-aos="fade-up" data-aos-delay="100"
            class="mt-16 flex flex-col items-center justify-center gap-4 w-full relative z-10">
            <span class="text-sm text-zinc-500 dark:text-zinc-400 font-roboto"
                x-text="lang === 'id' ? 'Menampilkan 1 hingga 6 dari 245 proyek' : 'Showing 1 to 6 of 245 projects'">Menampilkan
                1 hingga 6 dari 245 proyek</span>

            <nav class="inline-flex items-center gap-1 sm:gap-2">
                <button
                    class="p-2 sm:px-4 sm:py-2 rounded-xl border border-zinc-200 dark:border-zinc-800 text-zinc-400 dark:text-zinc-600 bg-zinc-50 dark:bg-zinc-900 cursor-not-allowed flex items-center gap-1"
                    disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden sm:inline-block font-medium text-sm"
                        x-text="lang === 'id' ? 'Sebelumnya' : 'Prev'">Sebelumnya</span>
                </button>

                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-violet-600 text-white font-bold shadow-md shadow-violet-500/20 text-sm">1</button>
                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-300 bg-white dark:bg-zinc-900 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors text-sm font-medium">2</button>
                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-300 bg-white dark:bg-zinc-900 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors text-sm font-medium">3</button>

                <span class="text-zinc-400 dark:text-zinc-600 px-1">...</span>

                <button
                    class="hidden sm:flex w-10 h-10 items-center justify-center rounded-xl border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-300 bg-white dark:bg-zinc-900 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors text-sm font-medium">41</button>

                <button
                    class="p-2 sm:px-4 sm:py-2 rounded-xl border border-zinc-200 dark:border-zinc-800 text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-900 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors flex items-center gap-1 group">
                    <span class="hidden sm:inline-block font-medium text-sm"
                        x-text="lang === 'id' ? 'Selanjutnya' : 'Next'">Selanjutnya</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </nav>
        </div>

    </div>
</x-frontend-layout>