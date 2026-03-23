<x-frontend-layout>
    <div x-data="{ 
            show: !sessionStorage.getItem('sigmaIntroPlayed'), 
            progress: 0,
            init() {
                // Jika intro sudah pernah dimainkan, hentikan proses dan pastikan scroll terbuka
                if (!this.show) {
                    document.body.style.overflow = 'auto';
                    return;
                }
                
                // Kunci scroll saat loading & pastikan layar di paling atas
                document.body.style.overflow = 'hidden';
                window.scrollTo(0, 0);
                
                // Interval 150ms & penambahan angka kecil agar durasi sedikit lebih lama
                let interval = setInterval(() => {
                    this.progress += Math.floor(Math.random() * 6) + 2;
                    
                    if (this.progress >= 100) {
                        this.progress = 100;
                        clearInterval(interval);

                        // 1. [KODE BARU] Sembunyikan elemen AOS SECARA INSTAN tanpa animasi mundur
                        // Dilakukan saat preloader masih 100% menutupi layar
                        let aosElements = document.querySelectorAll('[data-aos]');
                        aosElements.forEach(el => {
                            el.style.transition = 'none'; // Matikan transisi mundur
                            el.classList.remove('aos-animate'); // Sembunyikan elemen
                        });

                        // Kembalikan properti transisi agar nanti bisa dianimasikan lagi
                        setTimeout(() => {
                            aosElements.forEach(el => { el.style.transition = ''; });
                        }, 50);
                        
                        // Tahan lebih lama (800ms) di angka 100% lalu mulai animasi keluar
                        setTimeout(() => { 
                            this.show = false; 
                            document.body.style.overflow = 'auto';
                            sessionStorage.setItem('sigmaIntroPlayed', 'true');
                            
                            // Tunda sedikit untuk memberi waktu browser merender tinggi halaman penuh
                            setTimeout(() => {
                                // Reset animasi elemen hero yang sudah keburu jalan
                                document.querySelectorAll('[data-aos]').forEach(el => {
                                    el.classList.remove('aos-animate');
                                });

                                // PAKSA browser menghitung ulang layout agar AOS dan Alpine sadar perubahan dimensi
                                window.dispatchEvent(new Event('resize'));
                                window.dispatchEvent(new Event('scroll'));
                                
                                if(typeof AOS !== 'undefined') {
                                    AOS.refreshHard(); // Hitung ulang seluruh titik koordinat animasi
                                }
                            }, 600);
                        }, 800);
                    }
                }, 150);
            }
        }" x-show="show" x-transition:leave="transition-all duration-[1500ms] ease-[cubic-bezier(0.7,0,0.3,1)]"
        x-transition:leave-start="opacity-100 scale-100 blur-none" x-transition:leave-end="opacity-0 scale-125 blur-xl"
        class="fixed inset-0 z-[999999] flex flex-col items-center justify-center bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-white origin-center"
        x-cloak>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] sm:w-[500px] sm:h-[500px] bg-violet-500/20 dark:bg-violet-600/20 rounded-full blur-[100px] animate-pulse"
            style="animation-duration: 4s;">
        </div>

        <div class="relative z-10 flex flex-col items-center">

            <div class="flex items-center justify-center mb-8 transition-all duration-700 ease-out"
                :class="progress === 100 ? 'scale-110 -rotate-6' : 'scale-100'">
                <img src="{{ asset('favicon_sigma.png') }}" alt="brand logo" width="120" height="120">
            </div>
            <div class="flex flex-col items-center gap-1 mb-10">
                <span
                    class="text-3xl sm:text-4xl font-space-grotesk font-extrabold tracking-[0.2em] text-zinc-700 dark:text-white">SIGMA</span>
                <span class="text-sm font-roboto text-zinc-600 dark:text-zinc-400">Showcase Inovasi & Galeri
                    Mahasiswa</span>
            </div>

            <div
                class="w-64 sm:w-80 h-1.5 bg-zinc-200 dark:bg-zinc-800 rounded-full overflow-hidden mb-4 relative shadow-inner">
                <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-violet-500 to-emerald-500 transition-all duration-200 ease-out shadow-[0_0_10px_rgba(139,92,246,0.8)]"
                    :style="`width: ${progress}%`"></div>
            </div>

            <div class="font-mono text-sm sm:text-base font-bold tracking-widest flex items-center gap-2 transition-colors duration-500"
                :class="progress === 100 ? 'text-emerald-600 dark:text-emerald-400' : 'text-zinc-500 dark:text-zinc-400'">
                <span x-text="lang === 'id' ? 'MEMUAT' : 'LOADING'"></span>
                <span class="w-12 text-right" x-text="`${progress}%`"></span>
            </div>
        </div>
    </div>

    <section class="relative w-full pt-44 pb-24 flex flex-col items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-[0.15] dark:opacity-[0.07]"
            style="background-image: linear-gradient(to right, #8b5cf6 1px, transparent 1px), linear-gradient(to bottom, #8b5cf6 1px, transparent 1px); background-size: 32px 32px; mask-image: radial-gradient(ellipse at center, black, transparent 75%); -webkit-mask-image: radial-gradient(ellipse at center, black, transparent 75%);">
        </div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none z-0 overflow-hidden">
            <div class="absolute top-10 md:mx-44 left-0 md:left-10 w-72 md:w-96 h-72 md:h-96 bg-violet-600 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[200px] opacity-30 dark:opacity-20 animate-pulse"
                style="animation-duration: 4s;"></div>
            <div class="absolute top-60 md:mx-44 right-0 md:right-10 w-72 md:w-96 h-72 md:h-96 bg-emerald-400 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[200px] opacity-30 dark:opacity-20 animate-pulse"
                style="animation-duration: 5s;"></div>
        </div>

        <div class="relative z-10 px-4 sm:px-6 lg:px-8 w-full max-w-5xl mx-auto flex flex-col items-center text-center">
            <div data-aos="fade-down"
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 dark:bg-zinc-900/70 backdrop-blur-md text-violet-700 dark:text-violet-400 text-sm font-semibold mb-6 border border-violet-200 dark:border-violet-500/30 shadow-sm">
                {{-- <span class="relative flex h-2 w-2"><span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span><span
                        class="relative inline-flex rounded-full h-2 w-2 bg-violet-500"></span></span> --}}
                <span
                    x-text="lang === 'id' ? '🚀  Platform Galeri Karya Mahasiswa Pendidikan Informatika' : '🚀  Informatics Education Student Work Gallery Platform'">Platform
                    Galeri Karya Mahasiswa Pendidikan Informatika</span>
            </div>

            <h1 data-aos="fade-up" data-aos-delay="100"
                class="font-space-grotesk text-5xl md:text-7xl font-bold tracking-tight mb-6 leading-tight">
                <span x-text="lang === 'id' ? 'Showcase Inovasi' : 'Innovation Showcase'">Showcase Inovasi</span>
                <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-emerald-400"
                    x-text="lang === 'id' ? '& Galeri Mahasiswa' : '& Student Gallery'">& Galeri
                    Mahasiswa</span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="200"
                class="font-roboto text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mb-10 bg-white/40 dark:bg-zinc-950/40 backdrop-blur-md p-3 rounded-2xl shadow-sm border border-zinc-200/50 dark:border-zinc-800/50">
                <span
                    x-text="lang === 'id' ? 'Temukan, pelajari, dan apresiasi inovasi teknologi serta media pembelajaran interaktif yang dikembangkan oleh mahasiswa.' : 'Discover, learn, and appreciate technological innovations and interactive learning media developed by students.'">
                    Temukan, pelajari, dan apresiasi inovasi teknologi serta media pembelajaran interaktif yang
                    dikembangkan oleh mahasiswa.
                </span>
            </p>

            <div data-aos="zoom-in" data-aos-delay="300"
                class="w-full max-w-2xl bg-white dark:bg-zinc-900 p-2 rounded-2xl shadow-lg border border-zinc-200 dark:border-zinc-800 flex items-center mb-10 transition-all focus-within:ring-2 focus-within:ring-violet-500 focus-within:border-transparent">
                <svg class="w-6 h-6 text-zinc-400 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text"
                    :placeholder="lang === 'id' ? 'Cari karya, nama pembuat, atau teknologi...' : 'Search for projects, creators, or technology...'"
                    class="w-full bg-transparent border-none text-zinc-900 dark:text-zinc-50 placeholder-zinc-400 focus:ring-0 px-4 py-3 font-roboto outline-none">
                <button
                    class="bg-violet-600 hover:bg-violet-700 text-white font-medium px-6 py-3 rounded-xl transition-colors shrink-0"
                    x-text="lang === 'id' ? 'Cari' : 'Search'">
                    Cari
                </button>
            </div>
        </div>
    </section>

    <section class="relative z-10 w-full bg-white dark:bg-zinc-900 border-y border-zinc-200 dark:border-zinc-800 py-12"
        x-data="statsCounter()" x-init="observe()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up"
                class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-zinc-200 dark:divide-zinc-800">
                <div class="flex flex-col items-center">
                    <span
                        class="text-4xl md:text-5xl font-space-grotesk font-bold text-violet-600 dark:text-violet-400 mb-2">
                        <span x-text="karya">0</span>+
                    </span>
                    <span
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider font-mono"
                        x-text="lang === 'id' ? 'Total Karya' : 'Total Projects'">Total Karya</span>
                </div>
                <div class="flex flex-col items-center">
                    <span
                        class="text-4xl md:text-5xl font-space-grotesk font-bold text-emerald-500 dark:text-emerald-400 mb-2">
                        <span x-text="mahasiswa">0</span>+
                    </span>
                    <span
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider font-mono"
                        x-text="lang === 'id' ? 'Mahasiswa Aktif' : 'Active Students'">Mahasiswa Aktif</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-4xl md:text-5xl font-space-grotesk font-bold text-zinc-900 dark:text-white mb-2">
                        <span x-text="kategori">0</span>
                    </span>
                    <span
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider font-mono"
                        x-text="lang === 'id' ? 'Kategori Inovasi' : 'Categories'">Kategori Inovasi</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-4xl md:text-5xl font-space-grotesk font-bold text-zinc-900 dark:text-white mb-2">
                        <span x-text="pengunjung">0</span>K+
                    </span>
                    <span
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider font-mono"
                        x-text="lang === 'id' ? 'Total Kunjungan' : 'Total Visits'">Total Kunjungan</span>
                </div>
            </div>
        </div>
    </section>

    <section class="relative z-10 py-24 px-4 sm:px-6 lg:px-8 w-full bg-zinc-50 dark:bg-zinc-950">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 lg:gap-20">
            <div data-aos="fade-up" class="md:w-1/2 flex flex-col justify-center">
                <h2 class="font-space-grotesk text-3xl md:text-4xl font-bold mb-6 text-zinc-900 dark:text-white"
                    x-text="lang === 'id' ? 'Mengenal Lebih Dekat SIGMA' : 'Getting to Know SIGMA'">Mengenal Lebih Dekat
                    SIGMA</h2>
                <p class="text-zinc-600 dark:text-zinc-400 text-base leading-relaxed font-roboto mb-6"
                    x-text="lang === 'id' ? 'SIGMA (Showcase Inovasi & Galeri Mahasiswa) adalah repositori digital dan ruang pameran interaktif yang dikhususkan untuk merayakan pencapaian mahasiswa Program Studi Pendidikan Informatika. Sistem ini dirancang bukan hanya sebagai arsip, melainkan sebagai etalase publik yang menghubungkan karya akademis dengan kebutuhan industri dan masyarakat.' : 'SIGMA (Student Innovation Showcase & Gallery) is a digital repository and interactive exhibition space dedicated to celebrating the achievements of Informatics Education students. This system is designed not just as an archive, but as a public showcase connecting academic work with industry and societal needs.'">
                    SIGMA (Showcase Inovasi & Galeri Mahasiswa) adalah repositori digital dan ruang pameran
                    interaktif...
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3 text-zinc-700 dark:text-zinc-300">
                        <svg class="w-6 h-6 text-emerald-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="font-roboto"
                            x-text="lang === 'id' ? 'Meningkatkan visibilitas portofolio mahasiswa.' : 'Increasing the visibility of student portfolios.'">Meningkatkan
                            visibilitas portofolio mahasiswa.</span>
                    </li>
                    <li class="flex items-start gap-3 text-zinc-700 dark:text-zinc-300">
                        <svg class="w-6 h-6 text-emerald-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="font-roboto"
                            x-text="lang === 'id' ? 'Mendorong kolaborasi lintas angkatan dan disiplin ilmu.' : 'Encouraging collaboration across batches and disciplines.'">Mendorong
                            kolaborasi lintas angkatan dan disiplin ilmu.</span>
                    </li>
                    <li class="flex items-start gap-3 text-zinc-700 dark:text-zinc-300">
                        <svg class="w-6 h-6 text-emerald-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="font-roboto"
                            x-text="lang === 'id' ? 'Menjadi referensi media pembelajaran interaktif bagi pendidik.' : 'Serving as a reference for interactive learning media for educators.'">Menjadi
                            referensi media pembelajaran interaktif bagi pendidik.</span>
                    </li>
                </ul>
                <div>
                    <a href="{{ url('/about') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-semibold rounded-xl hover:bg-zinc-800 dark:hover:bg-zinc-100 transition-colors">
                        <span x-text="lang === 'id' ? 'Pelajari Lebih Lanjut' : 'Learn More'">Pelajari Lebih
                            Lanjut</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="md:w-1/2 relative w-full">
                <div
                    class="aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl relative border border-zinc-200 dark:border-zinc-800">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200&auto=format&fit=crop"
                        alt="Mahasiswa Berkolaborasi" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-violet-600/10 mix-blend-multiply dark:mix-blend-overlay"></div>
                </div>
                <div class="absolute md:bottom-5 md:-left-16 -bottom-10 left-10 bg-white dark:bg-zinc-800 p-4 rounded-2xl shadow-xl border border-zinc-100 dark:border-zinc-700 flex items-center gap-4 animate-bounce"
                    style="animation-duration: 3s;">
                    <div
                        class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/40 rounded-full flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-zinc-900 dark:text-white"
                            x-text="lang === 'id' ? 'Inovasi Tiada Henti' : 'Endless Innovation'">Inovasi Tiada Henti
                        </p>
                        <p class="text-xs text-zinc-500 font-roboto"
                            x-text="lang === 'id' ? 'Membangun masa depan' : 'Building the future'">Membangun masa depan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sorotan"
        class="relative z-10 py-24 px-4 sm:px-6 lg:px-8 w-full max-w-7xl mx-auto border-t border-zinc-200 dark:border-zinc-800">
        <div class="mb-12 flex flex-col md:flex-row md:justify-between md:items-end gap-6">
            <div data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-violet-100 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 text-sm font-semibold mb-4">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span x-text="lang === 'id' ? 'Karya Terbaik' : 'Best Projects'">Karya Terbaik</span>
                </div>
                <h2 class="font-space-grotesk text-3xl md:text-4xl font-bold text-zinc-900 dark:text-white">
                    <span x-text="lang === 'id' ? 'Sorotan Bulan Ini' : 'Highlights of the Month'">Sorotan Bulan
                        Ini</span>
                </h2>
                <p class="text-zinc-500 dark:text-zinc-400 text-base mt-2 font-roboto max-w-xl"
                    x-text="lang === 'id' ? 'Proyek dengan inovasi, desain, dan dampak terbaik pilihan redaksi SIGMA.' : 'Projects with the best innovation, design, and impact selected by SIGMA editors.'">
                    Proyek dengan inovasi, desain, dan dampak terbaik pilihan redaksi SIGMA.</p>
            </div>
            <a href="{{ url('/gallery') }}" data-aos="fade-up" data-aos-delay="100"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-xl text-sm font-medium text-violet-600 dark:text-violet-400 hover:bg-violet-50 dark:hover:bg-violet-900/20 transition-colors shadow-sm group">
                <span x-text="lang === 'id' ? 'Lihat Semua Karya' : 'View All Projects'">Lihat Semua Karya</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:h-[600px]">

            <div data-aos="fade-up" data-aos-delay="100"
                class="lg:col-span-8 relative group rounded-3xl overflow-hidden shadow-lg h-[450px] lg:h-full cursor-pointer bg-zinc-900 border dark:border-zinc-800">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop"
                    alt="Highlight 1"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-80">
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/60 to-transparent"></div>

                <div class="absolute top-6 left-6 flex flex-wrap gap-2 z-10">
                    <span
                        class="px-3 py-1.5 bg-violet-600 text-white text-[10px] sm:text-xs font-bold rounded-lg uppercase tracking-wide shadow-md"
                        x-text="lang === 'id' ? 'Tugas Akhir' : 'Final Project'">Tugas Akhir</span>
                    <span
                        class="hidden sm:inline-block px-3 py-1.5 bg-zinc-900/60 backdrop-blur-md text-emerald-400 border border-white/10 text-[10px] sm:text-xs font-mono font-bold rounded-lg uppercase tracking-wide shadow-md">Machine
                        Learning</span>
                </div>

                <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full z-10 flex flex-col justify-end">
                    <h3
                        class="font-space-grotesk text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 group-hover:text-violet-300 transition-colors line-clamp-2">
                        Sistem Deteksi Emosi Siswa AI</h3>
                    <p class="font-roboto text-zinc-300 max-w-2xl line-clamp-2 text-sm md:text-base mb-6"
                        x-text="lang === 'id' ? 'Penerapan model Machine Learning untuk mendeteksi tingkat kebosanan dan antusiasme siswa selama pembelajaran daring secara real-time berdasarkan pengenalan ekspresi wajah.' : 'Implementation of a Machine Learning model to detect student boredom and enthusiasm during online learning in real-time based on facial expression recognition.'">
                        Penerapan model Machine Learning untuk mendeteksi tingkat kebosanan dan antusiasme siswa selama
                        pembelajaran daring secara real-time berdasarkan pengenalan ekspresi wajah.
                    </p>

                    <div class="flex items-center justify-between border-t border-white/20 pt-5 mt-auto">
                        <div class="flex items-center gap-3">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fadli&backgroundColor=8b5cf6"
                                alt="Pembuat" class="w-10 h-10 rounded-full border-2 border-zinc-800 bg-zinc-800">
                            <div>
                                <p class="text-white text-sm font-bold">Fadli Maghfirli</p>
                            </div>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white group-hover:bg-violet-600 group-hover:border-violet-500 transition-all duration-300 shadow-lg shrink-0">
                            <svg class="w-5 h-5 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 flex flex-col gap-6 lg:h-full">

                <div data-aos="fade-up" data-aos-delay="200"
                    class="relative group rounded-3xl overflow-hidden shadow-lg h-[300px] lg:h-1/2 cursor-pointer bg-zinc-900 border dark:border-zinc-800">
                    <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=600&auto=format&fit=crop"
                        alt="Highlight 2"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-80">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/60 to-transparent"></div>

                    <div class="absolute top-5 left-5 flex flex-wrap gap-2 z-10">
                        <span
                            class="px-2.5 py-1 bg-emerald-600 text-white text-[10px] font-bold rounded-lg uppercase tracking-wide shadow-md"
                            x-text="lang === 'id' ? 'Praktikum' : 'Practicum'">Praktikum</span>
                    </div>

                    <div class="absolute bottom-0 left-0 p-5 md:p-6 w-full z-10 flex flex-col justify-end">
                        <h3
                            class="font-space-grotesk text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-emerald-300 transition-colors line-clamp-1">
                            Vulnerability Scanner Lokal</h3>
                        <p class="font-roboto text-zinc-300 line-clamp-2 text-xs md:text-sm mb-4"
                            x-text="lang === 'id' ? 'Tools keamanan jaringan menggunakan Python untuk memindai kerentanan server institusi pendidikan.' : 'Network security tools using Python to scan vulnerabilities in educational institution servers.'">
                            Tools keamanan jaringan menggunakan Python untuk memindai kerentanan server institusi
                            pendidikan.
                        </p>

                        <div class="flex items-center justify-between border-t border-white/20 pt-4 mt-auto">
                            <div class="flex items-center gap-2">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti&backgroundColor=10b981"
                                    alt="Pembuat" class="w-8 h-8 rounded-full border-2 border-zinc-800 bg-zinc-800">
                                <div>
                                    <p class="text-white text-xs font-bold">Siti Masruroh</p>
                                </div>
                            </div>
                            <div
                                class="w-8 h-8 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white group-hover:bg-emerald-600 group-hover:border-emerald-500 transition-all duration-300 shadow-lg shrink-0">
                                <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="relative group rounded-3xl overflow-hidden shadow-lg h-[300px] lg:h-1/2 cursor-pointer bg-zinc-900 border dark:border-zinc-800">
                    <img src="https://images.unsplash.com/photo-1618477388954-7852f32655ec?q=80&w=600&auto=format&fit=crop"
                        alt="Highlight 3"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-80">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/60 to-transparent"></div>

                    <div class="absolute top-5 left-5 flex flex-wrap gap-2 z-10">
                        <span
                            class="px-2.5 py-1 bg-blue-600 text-white text-[10px] font-bold rounded-lg uppercase tracking-wide shadow-md"
                            x-text="lang === 'id' ? 'Kompetisi' : 'Competition'">Kompetisi</span>
                    </div>

                    <div class="absolute bottom-0 left-0 p-5 md:p-6 w-full z-10 flex flex-col justify-end">
                        <h3
                            class="font-space-grotesk text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors line-clamp-1">
                            Marketplace Freelance Kampus</h3>
                        <p class="font-roboto text-zinc-300 line-clamp-2 text-xs md:text-sm mb-4"
                            x-text="lang === 'id' ? 'Aplikasi web penghubung mahasiswa IT dengan proyek lepas di lingkungan universitas.' : 'Web app connecting IT students with freelance projects within the university environment.'">
                            Aplikasi web penghubung mahasiswa IT dengan proyek lepas di lingkungan universitas.
                        </p>

                        <div class="flex items-center justify-between border-t border-white/20 pt-4 mt-auto">
                            <div class="flex items-center gap-2">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Aditya&backgroundColor=3b82f6"
                                    alt="Pembuat" class="w-8 h-8 rounded-full border-2 border-zinc-800 bg-zinc-800">
                                <div>
                                    <p class="text-white text-xs font-bold">M. Aditya F.</p>
                                </div>
                            </div>
                            <div
                                class="w-8 h-8 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white group-hover:bg-blue-600 group-hover:border-blue-500 transition-all duration-300 shadow-lg shrink-0">
                                <svg class="w-4 h-4 -rotate-45 group-hover:rotate-0 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- border-t border-zinc-200 dark:border-zinc-800  --}}
    <section id="alur"
        class="w-full bg-zinc-100 dark:bg-zinc-900/50 py-20 border-y border-zinc-200 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 data-aos="fade-up" class="font-space-grotesk text-3xl font-bold mb-4 text-zinc-900 dark:text-white"
                x-text="lang === 'id' ? 'Bagaimana Cara Bergabung?' : 'How to Join?'">Bagaimana Cara Bergabung?</h2>
            <p data-aos="fade-up" class="text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto mb-12 font-roboto"
                x-text="lang === 'id' ? 'Tiga langkah mudah untuk memamerkan karya inovatif Anda ke publik melalui platform SIGMA.' : 'Three easy steps to showcase your innovative work to the public through the SIGMA platform.'">
                Tiga langkah mudah untuk memamerkan karya inovatif Anda ke publik melalui platform SIGMA.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-0.5 bg-zinc-200 dark:bg-zinc-800 z-0">
                </div>

                <div data-aos="fade-up" data-aos-delay="0"
                    class="relative z-10 bg-white dark:bg-zinc-950 p-8 rounded-3xl shadow-sm border border-zinc-200 dark:border-zinc-800 flex flex-col items-center">
                    <div
                        class="w-20 h-20 bg-violet-100 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-space-grotesk font-bold text-xl mb-2 text-zinc-900 dark:text-white"
                        x-text="lang === 'id' ? '1. Daftar Akun' : '1. Register Account'">1. Daftar Akun</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm"
                        x-text="lang === 'id' ? 'Buat akun menggunakan email mahasiswa aktif untuk verifikasi identitas.' : 'Create an account using an active student email for identity verification.'">
                        Buat akun menggunakan email mahasiswa aktif untuk verifikasi identitas.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100"
                    class="relative z-10 bg-white dark:bg-zinc-950 p-8 rounded-3xl shadow-sm border border-zinc-200 dark:border-zinc-800 flex flex-col items-center">
                    <div
                        class="w-20 h-20 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                    </div>
                    <h3 class="font-space-grotesk font-bold text-xl mb-2 text-zinc-900 dark:text-white"
                        x-text="lang === 'id' ? '2. Unggah Detail Karya' : '2. Upload Project Details'">2. Unggah Detail
                        Karya</h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm"
                        x-text="lang === 'id' ? 'Masukkan informasi proyek, teknologi yang digunakan, dan screenshot menarik.' : 'Enter project information, technologies used, and compelling screenshots.'">
                        Masukkan informasi proyek, teknologi yang digunakan, dan screenshot menarik.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="relative z-10 bg-white dark:bg-zinc-950 p-8 rounded-3xl shadow-sm border border-zinc-200 dark:border-zinc-800 flex flex-col items-center">
                    <div
                        class="w-20 h-20 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-space-grotesk font-bold text-xl mb-2 text-zinc-900 dark:text-white"
                        x-text="lang === 'id' ? '3. Dapatkan Apresiasi' : '3. Gain Appreciation'">3. Dapatkan Apresiasi
                    </h3>
                    <p class="text-zinc-500 dark:text-zinc-400 text-sm"
                        x-text="lang === 'id' ? 'Karya Anda akan tampil di halaman depan dan bisa diakses oleh masyarakat luas.' : 'Your work will be featured on the front page and can be accessed by the public.'">
                        Karya Anda akan tampil di halaman depan dan bisa diakses oleh masyarakat luas.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="relative z-10 py-20 px-4 sm:px-6 lg:px-8 w-full max-w-4xl mx-auto">
        <div data-aos="fade-up" class="text-center mb-10">
            <h2 class="font-space-grotesk text-3xl font-bold text-zinc-900 dark:text-white"
                x-text="lang === 'id' ? 'Pertanyaan yang Sering Diajukan (FAQ)' : 'Frequently Asked Questions (FAQ)'">
                Pertanyaan yang Sering Diajukan (FAQ)</h2>
            <p class="text-zinc-500 dark:text-zinc-400 text-sm mt-2 font-roboto"
                x-text="lang === 'id' ? 'Temukan jawaban untuk pertanyaan umum seputar SIGMA dan cara kerjanya.' : 'Find answers to common questions about SIGMA and how it works.'">
                Temukan jawaban untuk pertanyaan umum seputar SIGMA dan cara kerjanya.</p>
        </div>

        <div class="space-y-4">
            <div x-data="{ open: false }" data-aos="fade-up"
                class="border border-zinc-200 dark:border-zinc-800 rounded-2xl bg-white dark:bg-zinc-900 overflow-hidden shadow-sm">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full p-5 text-left font-space-grotesk font-semibold text-zinc-900 dark:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                    <span
                        x-text="lang === 'id' ? 'Siapa saja yang bisa mengunggah karya di platform ini?' : 'Who can upload projects to this platform?'">Siapa
                        saja yang bisa mengunggah karya di platform ini?</span>
                    <svg class="w-5 h-5 transition-transform text-zinc-400" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition
                    class="px-5 pb-5 pt-2 text-zinc-600 dark:text-zinc-400 text-sm font-roboto border-t border-zinc-100 dark:border-zinc-800/50">
                    <span
                        x-text="lang === 'id' ? 'Hanya mahasiswa aktif Program Studi Pendidikan Informatika yang memiliki akun terverifikasi yang dapat mengunggah karya ke dalam sistem ini.' : 'Only active students of the Informatics Education Study Program with verified accounts can upload their work to this system.'">Hanya
                        mahasiswa aktif Program Studi Pendidikan Informatika yang memiliki akun terverifikasi yang dapat
                        mengunggah karya ke dalam sistem ini.</span>
                </div>
            </div>

            <div x-data="{ open: false }" data-aos="fade-up"
                class="border border-zinc-200 dark:border-zinc-800 rounded-2xl bg-white dark:bg-zinc-900 overflow-hidden shadow-sm">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full p-5 text-left font-space-grotesk font-semibold text-zinc-900 dark:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                    <span
                        x-text="lang === 'id' ? 'Bagaimana cara karya saya bisa masuk ke bagian Sorotan Utama?' : 'How can my work be featured in the Main Highlights?'">Bagaimana
                        cara karya saya bisa masuk ke bagian Sorotan Utama?</span>
                    <svg class="w-5 h-5 transition-transform text-zinc-400" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition
                    class="px-5 pb-5 pt-2 text-zinc-600 dark:text-zinc-400 text-sm font-roboto border-t border-zinc-100 dark:border-zinc-800/50">
                    <span
                        x-text="lang === 'id' ? 'Karya yang masuk ke Sorotan dipilih oleh tim kurator atau dosen berdasarkan tingkat inovasi, kualitas antarmuka, dan dampak positif terhadap sektor pendidikan.' : 'Projects in the Highlights section are selected by curators or lecturers based on innovation, interface quality, and positive impact on the educational sector.'">Karya
                        yang masuk ke Sorotan dipilih oleh tim kurator atau dosen berdasarkan tingkat inovasi, kualitas
                        antarmuka, dan dampak positif terhadap sektor pendidikan.</span>
                </div>
            </div>

            <div x-data="{ open: false }" data-aos="fade-up"
                class="border border-zinc-200 dark:border-zinc-800 rounded-2xl bg-white dark:bg-zinc-900 overflow-hidden shadow-sm">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full p-5 text-left font-space-grotesk font-semibold text-zinc-900 dark:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                    <span
                        x-text="lang === 'id' ? 'Apakah platform ini hanya untuk keperluan Tugas Akhir?' : 'Is this platform only for Final Year Projects?'">Apakah
                        platform ini hanya untuk keperluan Tugas Akhir?</span>
                    <svg class="w-5 h-5 transition-transform text-zinc-400" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition
                    class="px-5 pb-5 pt-2 text-zinc-600 dark:text-zinc-400 text-sm font-roboto border-t border-zinc-100 dark:border-zinc-800/50">
                    <span
                        x-text="lang === 'id' ? 'Sama sekali tidak. Anda juga dapat mengunggah proyek praktikum mata kuliah, purwarupa desain UI/UX, maupun sistem untuk kompetisi perlombaan.' : 'Not at all. You can also upload practicum projects, UI/UX design prototypes, or systems for competitions.'">Sama
                        sekali tidak. Anda juga dapat mengunggah proyek praktikum mata kuliah, purwarupa desain UI/UX,
                        maupun sistem untuk kompetisi perlombaan.</span>
                </div>
            </div>
        </div>
    </section>

    <div x-data="{ 
            showFaqBtn: false,
            checkFaqVisibility() {
                // Jangan munculkan tombol jika preloader masih jalan
                if (document.body.style.overflow === 'hidden') {
                    this.showFaqBtn = false;
                    return;
                }

                const faqSection = document.getElementById('faq');
                if (faqSection) {
                    const rect = faqSection.getBoundingClientRect();
                    // Tombol akan TAMPIL jika bagian atas section FAQ masih di bawah layar
                    this.showFaqBtn = rect.top > (window.innerHeight - 150);
                }
            }
        }" @scroll.window="checkFaqVisibility()" x-init="
            // Cek visibilitas secara berkala saat inisialisasi
            setInterval(() => checkFaqVisibility(), 500);
        " x-show="showFaqBtn" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-y-8 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-8 scale-90" class="fixed bottom-8 left-6 sm:left-8 z-[90]"
        x-cloak>

        <a href="#faq" data-turbo="false"
            class="w-12 h-12 flex items-center justify-center rounded-full bg-white/80 dark:bg-zinc-900/80 backdrop-blur-md border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 shadow-lg hover:shadow-xl hover:scale-110 hover:bg-white dark:hover:bg-zinc-800 transition-all duration-300 group"
            aria-label="FAQ & Bantuan">

            <svg class="w-6 h-6 group-hover:text-zinc-900 dark:group-hover:text-white transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>

            <span
                class="absolute left-14 px-3 py-1.5 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 text-xs font-bold font-roboto rounded-lg opacity-0 -translate-x-2 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300 whitespace-nowrap pointer-events-none shadow-md">
                <span x-text="lang === 'id' ? 'Bantuan FAQ' : 'FAQ Help'">Bantuan FAQ</span>
            </span>
        </a>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('statsCounter', () => ({
                karya: 0, targetKarya: 245,
                mahasiswa: 0, targetMahasiswa: 128,
                kategori: 0, targetKategori: 12,
                pengunjung: 0, targetPengunjung: 85,
                started: false,
                observe() {
                    let observer = new IntersectionObserver((entries) => {
                        // Syarat: Hanya jalan jika overflow body bukan 'hidden' (preloader sudah selesai)
                        if (entries[0].isIntersecting && !this.started && document.body.style.overflow !== 'hidden') {
                            this.started = true;
                            this.animate(this.targetKarya, 'karya');
                            this.animate(this.targetMahasiswa, 'mahasiswa');
                            this.animate(this.targetKategori, 'kategori');
                            this.animate(this.targetPengunjung, 'pengunjung');
                        }
                    }, { threshold: 0.5 });
                    observer.observe(this.$el);

                    // Fallback (Penyelamat): Cek posisi elemen secara manual saat user scroll
                    window.addEventListener('scroll', () => {
                        if (!this.started && document.body.style.overflow !== 'hidden') {
                            let rect = this.$el.getBoundingClientRect();
                            // Jika elemen statistik sudah masuk ke dalam jangkauan layar
                            if (rect.top < window.innerHeight && rect.bottom >= 0) {
                                this.started = true;
                                this.animate(this.targetKarya, 'karya');
                                this.animate(this.targetMahasiswa, 'mahasiswa');
                                this.animate(this.targetKategori, 'kategori');
                                this.animate(this.targetPengunjung, 'pengunjung');
                            }
                        }
                    });
                },
                animate(target, prop) {
                    let startTimestamp = null;
                    const duration = 2000;
                    const step = (timestamp) => {
                        if (!startTimestamp) startTimestamp = timestamp;
                        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                        const ease = 1 - Math.pow(1 - progress, 4);
                        this[prop] = Math.floor(ease * target);
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        }
                    };
                    window.requestAnimationFrame(step);
                }
            }))
        })
    </script>
</x-frontend-layout>