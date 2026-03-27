<x-frontend-layout>

    <div x-data="{ mobileFilterOpen: false, currentCategory: '{{ request('category') ?? 'Semua' }}' }"
        x-init="if(window.location.hash) { setTimeout(() => { const el = document.querySelector(window.location.hash); if(el) el.scrollIntoView({ behavior: 'smooth' }); }, 400); }"
        class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-24 flex flex-col gap-10 min-h-screen relative z-10">

        <div data-aos="fade-up" data-aos-duration="800"
            class="text-center md:text-left flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <h1 class="font-space-grotesk text-4xl md:text-5xl font-bold text-zinc-900 dark:text-white mb-3">
                    <span x-text="lang === 'id' ? 'Galeri Inovasi' : 'Innovation Gallery'">Galeri Inovasi</span>
                </h1>
                <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-lg max-w-2xl"
                    x-text="lang === 'id' ? 'Eksplorasi ratusan karya dan inovasi teknologi yang dikembangkan oleh mahasiswa Pendidikan Informatika.' : 'Explore hundreds of technological innovations and creations developed by Informatics Education students.'">
                    Eksplorasi ratusan karya dan inovasi teknologi yang dikembangkan oleh mahasiswa Pendidikan
                    Informatika.
                </p>
            </div>
        </div>

        @if(!request('search') && isset($featuredProjects) && $featuredProjects->count() > 0)
        <div data-aos="fade-up" data-aos-delay="200" x-data="{
                activeSlide: 0,
                slidesCount: {{ $featuredProjects->count() }},
                interval: null,
                init() { this.startAutoplay(); },
                startAutoplay() { this.interval = setInterval(() => { this.next(); }, 5000); },
                stopAutoplay() { clearInterval(this.interval); },
                next() { this.activeSlide = this.activeSlide === this.slidesCount - 1 ? 0 : this.activeSlide + 1; },
                prev() { this.activeSlide = this.activeSlide === 0 ? this.slidesCount - 1 : this.activeSlide - 1; }
            }" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()"
            class="relative w-full h-[400px] md:h-[450px] lg:h-[500px] rounded-[2rem] md:rounded-[2.5rem] overflow-hidden bg-zinc-950 shadow-2xl group border border-zinc-200 dark:border-zinc-800">

            <div class="flex h-full w-full transition-transform duration-700 ease-in-out"
                :style="'transform: translateX(-' + (activeSlide * 100) + '%)'">
                @foreach($featuredProjects as $item)
                <div class="w-full h-full flex-shrink-0 relative">
                    <a href="{{ url('/project/' . $item->slug) }}" class="absolute inset-0 z-20"></a>

                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                        class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-1000 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/60 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-zinc-950/80 via-transparent to-transparent">
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-10 lg:p-14 z-10">
                        <div class="flex gap-3 mb-4 relative z-30">
                            <span
                                class="px-3 py-1.5 bg-amber-500 text-zinc-950 text-xs font-bold rounded-xl uppercase tracking-wider flex items-center gap-1.5 shadow-lg">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                                    </path>
                                </svg>
                                Sorotan
                            </span>
                            <span
                                class="px-3 py-1.5 bg-white/20 backdrop-blur-md text-white border border-white/20 text-xs font-bold rounded-xl uppercase tracking-wider shadow-lg">
                                {{ $item->category }}
                            </span>
                        </div>

                        <div class="block max-w-4xl relative z-30">
                            <h2
                                class="font-space-grotesk text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 transition-colors line-clamp-2 leading-tight drop-shadow-lg group-hover:text-violet-400">
                                {{ $item->title }}
                            </h2>
                        </div>
                        <p
                            class="font-roboto text-zinc-300 text-sm md:text-base max-w-3xl line-clamp-2 mb-6 md:mb-8 drop-shadow relative z-30">
                            {{ $item->short_description }}
                        </p>

                        <div class="flex items-center gap-3 relative z-30">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($item->user->name) }}&backgroundColor=8b5cf6"
                                alt="Author"
                                class="w-12 h-12 rounded-full border-2 border-white/20 shadow-lg bg-zinc-800">
                            <div>
                                <p class="text-white font-bold text-sm md:text-base drop-shadow">{{ $item->user->name }}
                                </p>
                                <p class="text-xs text-zinc-400 tracking-wider font-medium">Pendidikan Informatika</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button @click="prev()"
                class="absolute left-4 lg:left-6 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center rounded-full bg-black/20 hover:bg-black/50 text-white backdrop-blur-md border border-white/10 transition-all opacity-0 group-hover:opacity-100 -translate-x-4 group-hover:translate-x-0 z-30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button @click="next()"
                class="absolute right-4 lg:right-6 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center rounded-full bg-black/20 hover:bg-black/50 text-white backdrop-blur-md border border-white/10 transition-all opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0 z-30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <div class="absolute bottom-6 md:bottom-8 right-6 md:right-10 flex items-center gap-2 z-30">
                <template x-for="i in slidesCount">
                    <button @click="activeSlide = i - 1"
                        class="h-2.5 rounded-full transition-all duration-300 shadow-lg"
                        :class="activeSlide === i - 1 ? 'w-8 bg-violet-500' : 'w-2.5 bg-white/50 hover:bg-white/90'"></button>
                </template>
            </div>
        </div>
        @endif

        <div id="explore" data-aos="fade-up" data-aos-delay="200"
            class="flex flex-col lg:flex-row gap-4 p-4 rounded-3xl bg-white/50 dark:bg-zinc-900/30 backdrop-blur-sm border border-zinc-200 dark:border-zinc-800 shadow-sm relative z-20 items-center scroll-mt-32">

            <form method="GET" action="{{ url('/gallery') }}" class="relative w-full lg:w-80 flex-shrink-0">
                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                <div
                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-400 group-focus-within:text-violet-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    :placeholder="lang === 'id' ? 'Cari karya atau pembuat...' : 'Search projects or creators...'"
                    class="w-full pl-11 pr-4 py-3 bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 focus:bg-white dark:focus:bg-zinc-950 focus:border-violet-500 focus:ring-2 focus:ring-violet-500/10 rounded-2xl text-sm text-zinc-900 dark:text-white transition-all outline-none">
            </form>

            <div class="hidden lg:block w-px h-10 bg-zinc-200 dark:bg-zinc-800 flex-shrink-0"></div>

            <div class="md:hidden relative w-full">
                <button @click="mobileFilterOpen = !mobileFilterOpen"
                    class="w-full flex items-center justify-between px-5 py-3 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-sm font-medium text-zinc-700 dark:text-zinc-300 transition-all">
                    <span class="truncate">
                        <span x-text="lang === 'id' ? 'Kategori:' : 'Category:'">Kategori:</span>
                        <span
                            class="text-violet-600 dark:text-violet-400 font-bold ml-1">{{ request('category') ?? 'Semua' }}</span>
                    </span>
                    <svg class="w-5 h-5 transition-transform flex-shrink-0 ml-2"
                        :class="mobileFilterOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="mobileFilterOpen" @click.away="mobileFilterOpen = false" x-cloak
                    class="absolute top-full mt-2 w-full p-3 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl shadow-xl flex flex-col gap-1.5 z-30 max-h-60 overflow-y-auto">
                    <a href="{{ url('/gallery') }}{{ request('search') ? '?search='.request('search') : '' }}#explore"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition-colors {{ !request('category') || request('category') == 'Semua' ? 'bg-violet-600 text-white' : 'text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">Semua</a>
                    @foreach($categories as $cat)
                    <a href="{{ url('/gallery') }}?category={{ urlencode($cat) }}{{ request('search') ? '&search='.request('search') : '' }}#explore"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition-colors {{ request('category') == $cat ? 'bg-violet-600 text-white' : 'text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">{{ $cat }}</a>
                    @endforeach
                </div>
            </div>

            <div
                class="hidden md:flex flex-nowrap items-center gap-2 w-full overflow-x-auto pb-2 lg:pb-0 scrollbar-hide">
                <a href="{{ url('/gallery') }}{{ request('search') ? '?search='.request('search') : '' }}#explore"
                    class="flex-shrink-0 px-5 py-2.5 rounded-2xl text-sm font-medium transition-all whitespace-nowrap {{ !request('category') || request('category') == 'Semua' ? 'bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 shadow-lg' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500 hover:text-violet-600' }}"><span
                        x-text="lang === 'id' ? 'Semua' : 'All'">Semua</span></a>
                @foreach($categories as $cat)
                <a href="{{ url('/gallery') }}?category={{ urlencode($cat) }}{{ request('search') ? '&search='.request('search') : '' }}#explore"
                    class="flex-shrink-0 px-5 py-2.5 rounded-2xl text-sm font-medium transition-all whitespace-nowrap {{ request('category') == $cat ? 'bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 shadow-lg' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500 hover:text-violet-600' }}">{{ $cat }}</a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 relative z-10">
            @forelse($projects as $index => $item)
            <div data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}"
                class="relative group bg-white dark:bg-zinc-900/50 rounded-[2.5rem] p-4 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500/50 dark:hover:border-violet-500/50 hover:shadow-2xl hover:shadow-violet-500/10 transition-all duration-500 flex flex-col h-full">

                <a href="{{ url('/project/' . $item->slug) }}" class="absolute inset-0 z-20 rounded-[2.5rem]"></a>

                <div class="relative h-64 sm:h-56 rounded-[2rem] overflow-hidden bg-zinc-100 dark:bg-zinc-800 mb-5">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 via-zinc-950/20 to-transparent">
                    </div>

                    <div class="absolute top-5 left-5 right-5 flex justify-between items-start z-10">
                        <span
                            class="px-3 py-1.5 bg-violet-600/80 backdrop-blur-sm text-white border border-white/10 text-[10px] font-bold rounded-lg uppercase tracking-wide shadow-md">
                            {{ $item->category }}
                        </span>
                    </div>

                    <div
                        class="absolute bottom-5 left-5 right-5 z-10 translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        <div class="flex gap-2 flex-wrap">
                            @foreach(array_slice($item->tags, 0, 3) as $tag)
                            <span
                                class="text-[10px] font-mono font-bold px-2 py-1 bg-zinc-950/80 text-emerald-400 border border-zinc-700 rounded-lg">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="px-3 pb-3 flex flex-col flex-grow">
                    <div class="block mb-2.5">
                        <h3
                            class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors line-clamp-2 leading-tight">
                            {{ $item->title }}
                        </h3>
                    </div>

                    <p class="font-roboto text-sm text-zinc-600 dark:text-zinc-400 line-clamp-2 mb-6 flex-grow">
                        {{ $item->short_description }}
                    </p>

                    <div
                        class="flex items-center justify-between pt-5 border-t border-zinc-100 dark:border-zinc-800 mt-auto">
                        <div class="flex items-center gap-2.5 relative z-30">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($item->user->name) }}&backgroundColor=8b5cf6"
                                alt="Author"
                                class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 shadow-sm">
                            <div>
                                <p class="text-xs font-bold text-zinc-900 dark:text-white leading-none mb-1">
                                    {{ $item->user->name }}</p>
                                <p class="text-[9px] font-medium text-zinc-500 tracking-wider">Pendidikan Informatika
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 relative z-30">
                            <div
                                class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-xl bg-zinc-50 dark:bg-zinc-800/50 text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-800">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                <span class="text-xs font-bold">{{ $item->likes_count }}</span>
                            </div>
                            <div
                                class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-xl bg-zinc-50 dark:bg-zinc-800/50 text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-800">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                <span class="text-xs font-bold">{{ $item->views_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div data-aos="fade-up" data-aos-delay="300"
                class="col-span-1 md:col-span-2 lg:col-span-3 py-24 text-center flex flex-col items-center justify-center bg-white dark:bg-zinc-900/50 rounded-[3rem] border border-dashed border-zinc-300 dark:border-zinc-700 relative z-10">
                <svg class="w-20 h-20 text-zinc-300 dark:text-zinc-700 mb-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white mb-3"
                    x-text="lang === 'id' ? 'Karya Tidak Ditemukan' : 'No Projects Found'">Karya Tidak Ditemukan</h3>
                <p class="font-roboto text-zinc-600 dark:text-zinc-400 max-w-lg mb-8"
                    x-text="lang === 'id' ? 'Maaf, kami tidak dapat menemukan karya yang sesuai dengan kata kunci atau filter yang Anda pilih.' : 'Sorry, we couldn\'t find any projects matching the keyword or filter you selected.'">
                    Maaf, kami tidak dapat menemukan karya yang sesuai dengan kata kunci atau filter yang Anda pilih.
                </p>
                <a href="{{ url('/gallery') }}#explore"
                    class="px-7 py-3 bg-violet-600 hover:bg-violet-700 text-white rounded-2xl font-medium transition-colors shadow-md shadow-violet-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span x-text="lang === 'id' ? 'Reset Pencarian' : 'Reset Search'">Reset Pencarian</span>
                </a>
            </div>
            @endforelse
        </div>

        @if($projects->hasPages())
        <div class="mt-8 flex justify-center scale-90 md:scale-100">
            <div
                class="p-2.5 rounded-full bg-white dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 shadow-sm backdrop-blur-sm flex items-center gap-1.5 z-20 relative">
                @if ($projects->onFirstPage())
                <span
                    class="w-11 h-11 rounded-full flex items-center justify-center text-zinc-300 dark:text-zinc-700 bg-zinc-100/50 dark:bg-zinc-800/30 border border-zinc-200/50 dark:border-zinc-800/50 cursor-not-allowed transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </span>
                @else
                <a href="{{ $projects->previousPageUrl() }}"
                    class="w-11 h-11 rounded-full flex items-center justify-center text-zinc-600 dark:text-zinc-400 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500 hover:bg-violet-50 dark:hover:bg-violet-950/50 hover:text-violet-600 dark:hover:text-violet-400 shadow-sm transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                @endif

                @php
                $start = max(1, $projects->currentPage() - 1);
                $end = min($projects->lastPage(), $start + 2);
                if ($end - $start < 2) { $start=max(1, $end - 2); } @endphp @if($start> 1)
                    <a href="{{ $projects->url(1) }}"
                        class="w-11 h-11 hidden sm:flex items-center justify-center text-sm font-bold rounded-full bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 hover:border-violet-500 hover:text-violet-600 dark:hover:text-violet-400 transition-all duration-300">1</a>
                    @if($start > 2)
                    <span
                        class="w-11 h-11 hidden sm:flex items-center justify-center text-sm text-zinc-400 dark:text-zinc-600">...</span>
                    @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++) <a href="{{ $projects->url($i) }}"
                        class="w-11 h-11 flex items-center justify-center text-sm font-bold rounded-full transition-all duration-300 {{ $projects->currentPage() == $i ? 'bg-zinc-950 dark:bg-white text-white dark:text-zinc-950 shadow-lg' : 'bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 hover:border-violet-500 hover:text-violet-600 dark:hover:text-violet-400' }}">
                        {{ $i }}</a>
                        @endfor

                        @if($end < $projects->lastPage())
                            @if($end < $projects->lastPage() - 1)
                                <span
                                    class="w-11 h-11 hidden sm:flex items-center justify-center text-sm text-zinc-400 dark:text-zinc-600">...</span>
                                @endif
                                <a href="{{ $projects->url($projects->lastPage()) }}"
                                    class="w-11 h-11 hidden sm:flex items-center justify-center text-sm font-bold rounded-full bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 hover:border-violet-500 hover:text-violet-600 dark:hover:text-violet-400 transition-all duration-300">{{ $projects->lastPage() }}</a>
                                @endif

                                @if ($projects->hasMorePages())
                                <a href="{{ $projects->nextPageUrl() }}"
                                    class="w-11 h-11 rounded-full flex items-center justify-center text-zinc-600 dark:text-zinc-400 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500 hover:bg-violet-50 dark:hover:bg-violet-950/50 hover:text-violet-600 dark:hover:text-violet-400 shadow-sm transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                @else
                                <span
                                    class="w-11 h-11 rounded-full flex items-center justify-center text-zinc-300 dark:text-zinc-700 bg-zinc-100/50 dark:bg-zinc-800/30 border border-zinc-200/50 dark:border-zinc-800/50 cursor-not-allowed transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                                @endif
            </div>
        </div>
        @endif

    </div>
</x-frontend-layout>