<x-frontend-layout>

    <div x-data="{ 
            showModal: false, 
            shareSuccess: false,
            copyLink() {
                // FUNGSI SEBENAR: Menyalin URL halaman semasa ke clipboard
                navigator.clipboard.writeText(window.location.href);
                // RESPONS VISUAL: Tunjukkan keadaan 'Tersalin'
                this.shareSuccess = true;
                // Tetapkan semula selepas 3 saat
                setTimeout(() => this.shareSuccess = false, 3000);
            }
        }" class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-24 min-h-screen relative z-10">

        <a href="{{ url('/gallery') }}"
            class="inline-flex items-center gap-2 text-zinc-500 hover:text-violet-600 dark:text-zinc-400 dark:hover:text-violet-400 transition-colors font-medium text-sm mb-10 group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Galeri
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            <div class="lg:col-span-4 order-1">
                <div class="lg:sticky lg:top-32 space-y-8">

                    <div data-aos="fade-right">
                        <div class="flex items-center gap-3 mb-4">
                            <span
                                class="px-3 py-1.5 bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-300 text-xs font-bold rounded-xl uppercase tracking-wider">
                                {{ $project->category }}
                            </span>
                            <span class="text-zinc-400 text-sm">•</span>
                            <span
                                class="text-zinc-500 text-sm font-medium">{{ $project->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                        <h1
                            class="font-space-grotesk text-3xl lg:text-4xl font-bold text-zinc-900 dark:text-white leading-tight mb-6">
                            {{ $project->title }}
                        </h1>
                    </div>

                    <a href="{{ url('/profile/'.$project->user->id) }}" data-aos="fade-right" data-aos-delay="100"
                        class="flex items-center gap-4 p-4 rounded-2xl bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500 transition-all group">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($project->user->name) }}&backgroundColor=8b5cf6"
                            alt="Author"
                            class="w-12 h-12 rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800">
                        <div>
                            <p
                                class="text-base font-bold text-zinc-900 dark:text-white group-hover:text-violet-600 transition-colors">
                                {{ $project->user->name }}
                            </p>
                            <p class="text-xs font-medium text-zinc-500 uppercase tracking-wider">Mahasiswa Informatika
                            </p>
                        </div>
                    </a>

                    @if($project->team_members)
                    <div data-aos="fade-right" data-aos-delay="150"
                        class="p-5 rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950/30 shadow-sm">
                        <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em] mb-4">Anggota Tim</p>
                        <ul class="space-y-3">
                            @foreach($project->team_members as $member)
                            <li class="flex items-center gap-3 text-sm text-zinc-700 dark:text-zinc-300 font-medium">
                                <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                                {{ $member }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div data-aos="fade-right" data-aos-delay="200" id="interaction"
                        class="flex flex-col gap-4 scroll-mt-32">

                        <div class="flex items-center gap-4">
                            @auth
                            <form action="{{ route('project.like', $project->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 p-3 rounded-xl border transition-all duration-300 {{ $hasLiked ? 'bg-pink-50 dark:bg-pink-500/10 border-pink-200 dark:border-pink-500/30 text-pink-500' : 'bg-white dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 hover:border-pink-500 hover:text-pink-500' }}">
                                    <svg class="w-5 h-5" fill="{{ $hasLiked ? 'currentColor' : 'none' }}"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                    <span class="font-bold text-sm">{{ $project->likes_count }}</span>
                                </button>
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                class="flex-1 flex items-center justify-center gap-2 p-3 rounded-xl border bg-white dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 hover:border-pink-500 hover:text-pink-500 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                <span class="font-bold text-sm">{{ $project->likes_count }}</span>
                            </a>
                            @endauth

                            <div
                                class="flex-1 flex items-center justify-center gap-2 p-3 rounded-xl border bg-zinc-50 dark:bg-zinc-900/50 border-zinc-200 dark:border-zinc-800 text-zinc-500 dark:text-zinc-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                <span class="font-bold text-sm">{{ $project->views_count }}</span>
                            </div>
                        </div>
                    </div>

                    @if($project->demo_url || $project->repo_url)
                    <div data-aos="fade-right" data-aos-delay="300"
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-3 pt-6 border-t border-zinc-200 dark:border-zinc-800">
                        @if($project->demo_url)
                        <button @click="showModal = true"
                            class="w-full px-4 py-3 rounded-xl bg-violet-600 hover:bg-violet-700 text-white font-medium flex items-center justify-center gap-2 transition-colors shadow-md shadow-violet-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                            Demo Produk
                        </button>
                        @endif

                        @if($project->repo_url)
                        <button @click="showModal = true"
                            class="w-full px-4 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 dark:bg-white dark:hover:bg-zinc-200 text-white dark:text-zinc-900 font-medium flex items-center justify-center gap-2 transition-colors shadow-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Source Code
                        </button>
                        @endif
                    </div>
                    @endif

                    <div data-aos="fade-right" data-aos-delay="400"
                        class="pt-6 border-t border-zinc-200 dark:border-zinc-800">
                        <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider mb-3">Teknologi Digunakan</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tags as $tag)
                            <span
                                class="text-xs font-mono font-bold px-3 py-1.5 bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700 rounded-lg shadow-sm">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 order-2 lg:order-2">

                <div data-aos="fade-up"
                    class="relative w-full h-[300px] sm:h-[400px] md:h-[500px] rounded-[2.5rem] overflow-hidden bg-zinc-100 dark:bg-zinc-800 mb-10 shadow-2xl border border-zinc-200 dark:border-zinc-800">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                        class="absolute inset-0 w-full h-full object-cover">
                </div>

                <div data-aos="fade-up" data-aos-delay="100"
                    class="prose prose-zinc dark:prose-invert prose-lg max-w-none font-roboto text-zinc-700 dark:text-zinc-300 mb-16">
                    {!! nl2br(e($project->content)) !!}
                </div>

                <div class="w-full h-px bg-zinc-200 dark:bg-zinc-800 mb-12"></div>

                <div id="comments" class="scroll-mt-32">
                    <h3 class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white mb-8">
                        Diskusi & Komentar ({{ $project->comments->count() }})
                    </h3>

                    @auth
                    <form action="{{ route('project.comment', $project->id) }}" method="POST"
                        class="mb-10 flex gap-4 bg-zinc-50 dark:bg-zinc-900/50 p-4 md:p-6 rounded-[2rem] border border-zinc-200 dark:border-zinc-800">
                        @csrf
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode(Auth::user()->name) }}&backgroundColor=10b981"
                            alt="Me"
                            class="w-12 h-12 rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-100 hidden sm:block">
                        <div class="flex-grow">
                            <textarea name="body" rows="3" required placeholder="Tulis pendapat atau apresiasi Anda..."
                                class="w-full px-5 py-4 rounded-2xl bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 focus:ring-2 focus:ring-violet-500 outline-none resize-none text-zinc-900 dark:text-white shadow-sm mb-4"></textarea>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-7 py-3 bg-violet-600 hover:bg-violet-700 text-white rounded-xl font-medium transition-colors shadow-md shadow-violet-500/20">Kirim
                                    Komentar</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div
                        class="mb-10 p-8 rounded-[2rem] bg-zinc-50 dark:bg-zinc-900/50 border border-dashed border-zinc-300 dark:border-zinc-700 text-center">
                        <p class="text-zinc-600 dark:text-zinc-400 mb-6 font-medium">Anda harus masuk (login) untuk
                            bergabung dalam diskusi.</p>
                        <a href="{{ route('login') }}"
                            class="inline-block px-8 py-3 bg-zinc-900 hover:bg-zinc-800 dark:bg-white dark:hover:bg-zinc-200 text-white dark:text-zinc-900 rounded-xl font-bold transition-colors shadow-lg">Masuk
                            Sekarang</a>
                    </div>
                    @endauth

                    <div class="flex flex-col gap-5 mb-24">
                        @forelse($project->comments->sortByDesc('created_at') as $comment)
                        <div
                            class="flex gap-4 p-5 md:p-6 rounded-[2rem] bg-white dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 shadow-sm transition-all hover:shadow-md">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($comment->user->name) }}&backgroundColor=6366f1"
                                alt="User" class="w-10 h-10 md:w-12 md:h-12 flex-shrink-0 rounded-full bg-zinc-200">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <h4 class="font-bold text-zinc-900 dark:text-white">{{ $comment->user->name }}</h4>
                                    <span class="text-xs font-medium text-zinc-400 dark:text-zinc-500">•
                                        {{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-zinc-600 dark:text-zinc-300 text-sm md:text-base leading-relaxed">
                                    {{ $comment->body }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="py-12 text-center text-zinc-500">
                            <p>Belum ada komentar.</p>
                        </div>
                        @endforelse
                    </div>

                    @if(isset($relatedProjects) && $relatedProjects->count() > 0)
                    <div data-aos="fade-up" class="pt-16 border-t border-zinc-200 dark:border-zinc-800">
                        <h3 class="font-space-grotesk text-3xl font-bold text-zinc-900 dark:text-white mb-10">Karya
                            Terkait</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                            @foreach($relatedProjects as $relIndex => $rel)
                            <div data-aos="fade-up" data-aos-delay="{{ ($relIndex % 3) * 100 }}"
                                class="relative group bg-white dark:bg-zinc-900/50 rounded-[2.5rem] p-4 border border-zinc-200 dark:border-zinc-800 hover:border-violet-500/50 dark:hover:border-violet-500/50 hover:shadow-2xl hover:shadow-violet-500/10 transition-all duration-500 flex flex-col h-full">

                                <a href="{{ url('/project/' . $rel->slug) }}"
                                    class="absolute inset-0 z-20 rounded-[2.5rem]"></a>

                                <div
                                    class="relative h-56 rounded-[2rem] overflow-hidden bg-zinc-100 dark:bg-zinc-800 mb-5">
                                    <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-90 group-hover:opacity-100">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 via-zinc-950/20 to-transparent">
                                    </div>

                                    <div class="absolute top-5 left-5 right-5 flex justify-between items-start z-10">
                                        <span
                                            class="px-3 py-1.5 bg-violet-600/80 backdrop-blur-sm text-white border border-white/10 text-[10px] font-bold rounded-lg uppercase tracking-wide shadow-md">
                                            {{ $rel->category }}
                                        </span>
                                    </div>
                                </div>

                                <div class="px-3 pb-3 flex flex-col flex-grow">
                                    <div class="block mb-2.5">
                                        <h3
                                            class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors line-clamp-1 leading-tight mb-2">
                                            {{ $rel->title }}
                                        </h3>
                                    </div>
                                    <p
                                        class="font-roboto text-sm text-zinc-600 dark:text-zinc-400 line-clamp-2 mb-6 flex-grow">
                                        {{ $rel->short_description }}
                                    </p>

                                    <div
                                        class="flex items-center justify-between pt-5 border-t border-zinc-100 dark:border-zinc-800 mt-auto">
                                        <div class="flex items-center gap-2.5 relative z-30">
                                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode($rel->user->name) }}&backgroundColor=8b5cf6"
                                                alt="Author"
                                                class="w-8 h-8 rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800 shadow-sm">
                                            <div>
                                                <p
                                                    class="text-xs font-bold text-zinc-900 dark:text-white leading-none mb-1">
                                                    {{ $rel->user->name }}</p>
                                                <p
                                                    class="text-[9px] font-medium text-zinc-500 uppercase tracking-wider">
                                                    Informatika</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2 relative z-30">
                                            <div
                                                class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-xl bg-zinc-50 dark:bg-zinc-800/50 text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-800">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                    </path>
                                                </svg>
                                                <span class="text-xs font-bold">{{ $rel->likes_count }}</span>
                                            </div>
                                            <div
                                                class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-xl bg-zinc-50 dark:bg-zinc-800/50 text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-800">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                                <span class="text-xs font-bold">{{ $rel->views_count }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div x-show="showModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" x-cloak>
            <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" @click="showModal = false"
                class="absolute inset-0 bg-zinc-950/60 backdrop-blur-md"></div>

            <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                class="relative w-full max-w-lg bg-white dark:bg-zinc-900 rounded-[2.5rem] shadow-2xl border border-zinc-200 dark:border-zinc-800 overflow-hidden">
                <div
                    class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-violet-600 via-emerald-500 to-blue-500">
                </div>
                <div class="p-8 sm:p-10 text-center">
                    <div
                        class="w-20 h-20 bg-violet-100 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 rounded-3xl flex items-center justify-center mx-auto mb-6 rotate-3">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white mb-3">Mode Simulasi
                        Aktif</h3>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 mb-8 leading-relaxed">
                        Maaf, tautan demo dan repositori dinonaktifkan sementara karena ini adalah proyek simulasi. Kami
                        ingin menjaga Anda tetap di dalam ekosistem SIGMA!
                    </p>
                    <button @click="showModal = false"
                        class="w-full py-4 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 rounded-2xl font-bold hover:opacity-90 transition-opacity shadow-xl">
                        Mengerti, Terima Kasih
                    </button>
                </div>
                <button @click="showModal = false"
                    class="absolute top-6 right-6 text-zinc-400 hover:text-zinc-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</x-frontend-layout>