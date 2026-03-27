<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
        darkMode: localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        lang: localStorage.getItem('lang') || 'id'
    }" x-init="
        $watch('darkMode', val => localStorage.setItem('darkMode', val));
        $watch('lang', val => localStorage.setItem('lang', val));
    " x-bind:class="{ 'dark': darkMode }" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('favicon_sigma.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_sigma.png') }}">
    <title>Lupa Sandi - SIGMA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Styles Latar Belakang Estetik Kiri */
        .mesh-gradient {
            background-color: #09090b;
            /* zinc-950 */
            background-image:
                radial-gradient(at 0% 0%, hsla(263, 67%, 33%, 0.3) 0, transparent 50%),
                radial-gradient(at 100% 100%, hsla(160, 84%, 39%, 0.2) 0, transparent 50%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@hotwired/turbo@8.0.4/dist/turbo.es2017-umd.js"></script>

    <script>
        document.addEventListener("turbo:load", function() {
            if (window.Turbo) {
                Turbo.setProgressBarDelay(0);
            }
        });
    </script>

    <style>
        .turbo-progress-bar {
            height: 3px !important;
            background-color: #8b5cf6 !important;
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.8), 0 0 5px rgba(139, 92, 246, 0.5);
            z-index: 99999 !important;
            transition: width 300ms ease-out, opacity 150ms 150ms ease-in !important;
        }
    </style>
</head>

<body
    class="font-roboto antialiased text-zinc-900 bg-white dark:bg-zinc-950 dark:text-zinc-50 transition-colors duration-500 selection:bg-violet-500 selection:text-white">

    <main class="min-h-screen flex flex-col md:flex-row overflow-hidden">

        <div
            class="hidden md:flex md:w-1/2 lg:w-3/5 relative mesh-gradient items-center justify-center p-12 lg:p-20 overflow-hidden">
            <div class="absolute inset-0 z-0 opacity-[0.04]"
                style="background-image: linear-gradient(#ffffff 1px, transparent 1px), linear-gradient(90deg, #ffffff 1px, transparent 1px); background-size: 50px 50px;">
            </div>

            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-violet-600/20 rounded-full filter blur-[120px] animate-pulse"
                style="animation-duration: 4s;"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[400px] h-[400px] bg-emerald-500/10 rounded-full filter blur-[100px] animate-pulse"
                style="animation-duration: 6s;"></div>

            <div class="relative z-10 w-full max-w-2xl" x-data="statsCounter()" x-init="observe()">
                <div class="space-y-8">
                    <div data-aos="fade-down"
                        class="inline-block px-4 py-2 glass rounded-2xl font-space-grotesk text-violet-400 text-sm font-bold tracking-widest uppercase mb-2 shadow-lg">
                        Powered by SIGMA
                    </div>

                    <h1 data-aos="fade-up" data-aos-delay="100"
                        class="text-6xl lg:text-7xl xl:text-8xl font-space-grotesk font-bold text-white leading-[1.1] tracking-tighter">
                        <span x-text="lang === 'id' ? 'Kembalikan' : 'Regain'">Kembalikan</span> <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 via-fuchsia-400 to-emerald-400"
                            x-text="lang === 'id' ? 'Akses Anda.' : 'Your Access.'">
                            Akses Anda.
                        </span>
                    </h1>

                    <p data-aos="fade-up" data-aos-delay="200"
                        class="text-zinc-400 text-xl font-roboto max-w-md leading-relaxed">
                        <span
                            x-text="lang === 'id' ? 'Jangan khawatir, kami akan membantu Anda memulihkan akses ke akun SIGMA Anda dengan cepat dan aman.' : 'Don\'t worry, we will help you recover access to your SIGMA account quickly and securely.'">Jangan
                            khawatir, kami akan membantu Anda memulihkan akses ke akun SIGMA Anda dengan cepat dan
                            aman.</span>
                    </p>

                    <div class="grid grid-cols-2 gap-4 sm:gap-6 mt-12">
                        <div data-aos="fade-up" data-aos-delay="300"
                            class="glass p-6 sm:p-8 rounded-3xl border-l-4 border-l-violet-500/50 hover:bg-white/5 transition-colors shadow-2xl">
                            <div class="text-white text-4xl sm:text-5xl font-bold font-space-grotesk mb-2">
                                <span x-text="karya">0</span>+
                            </div>
                            <div class="text-zinc-400 text-sm sm:text-base font-medium font-roboto"
                                x-text="lang === 'id' ? 'Karya Mahasiswa' : 'Student Projects'">Karya Mahasiswa</div>
                        </div>

                        <div data-aos="fade-up" data-aos-delay="400"
                            class="glass p-6 sm:p-8 rounded-3xl border-l-4 border-l-emerald-500/50 hover:bg-white/5 transition-colors shadow-2xl">
                            <div class="text-white text-4xl sm:text-5xl font-bold font-space-grotesk mb-2">
                                <span x-text="mahasiswa">0</span>+
                            </div>
                            <div class="text-zinc-400 text-sm sm:text-base font-medium font-roboto"
                                x-text="lang === 'id' ? 'Mahasiswa Aktif' : 'Active Students'">Mahasiswa Aktif</div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="absolute bottom-10 left-10 text-[10rem] font-bold text-white/[0.02] select-none pointer-events-none font-space-grotesk">
                SIGMA
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-2/5 flex flex-col relative bg-white dark:bg-zinc-950 min-h-screen">

            <div class="absolute top-0 left-0 w-full p-6 sm:p-8 flex justify-between items-start z-20">
                <a href="javascript:history.back()" data-aos="fade-down"
                    class="inline-flex items-center gap-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-400 transition-colors group bg-zinc-50 dark:bg-zinc-900 px-3 py-2 sm:px-4 sm:py-2.5 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-800">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="hidden sm:inline" x-text="lang === 'id' ? 'Kembali' : 'Back'">Kembali</span>
                </a>

                <div data-aos="fade-down" data-aos-delay="100" class="flex items-center gap-2 sm:gap-3">
                    <div class="relative" x-data="{ langOpen: false }">
                        <button @click="langOpen = !langOpen" @click.away="langOpen = false" type="button"
                            class="flex items-center gap-1 text-sm font-medium text-zinc-600 dark:text-zinc-300 hover:text-violet-600 transition-colors p-2.5 rounded-xl bg-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-zinc-800 border border-zinc-200 dark:border-zinc-800 shadow-sm">
                            <span x-text="lang === 'id' ? 'ID' : 'EN'" class="font-space-grotesk font-bold">ID</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="langOpen ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="langOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            x-cloak
                            class="absolute right-0 mt-2 w-36 bg-white dark:bg-zinc-900 rounded-xl shadow-lg border border-zinc-200 dark:border-zinc-800 py-2 overflow-hidden z-50">
                            <button @click="lang = 'id'; langOpen = false"
                                class="flex items-center gap-2 w-full text-left px-4 py-2.5 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors"
                                :class="lang === 'id' ? 'font-bold text-violet-600 dark:text-violet-400' : ''">🇮🇩
                                Indonesia</button>
                            <button @click="lang = 'en'; langOpen = false"
                                class="flex items-center gap-2 w-full text-left px-4 py-2.5 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors"
                                :class="lang === 'en' ? 'font-bold text-violet-600 dark:text-violet-400' : ''">🇬🇧
                                English</button>
                        </div>
                    </div>

                    <button @click="darkMode = !darkMode" type="button"
                        class="p-2.5 rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors shadow-sm"
                        aria-label="Toggle Dark Mode">
                        <svg x-show="!darkMode" x-cloak class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <svg x-show="darkMode" x-cloak class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <div
                class="flex-grow flex flex-col justify-center px-6 sm:px-12 lg:px-16 xl:px-20 w-full max-w-xl mx-auto pt-28 pb-10">

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="mb-10 text-left">
                    <div data-aos="fade-down" class="md:hidden mb-8">
                        <img src="{{ asset('logo_sigma.png') }}" alt="SIGMA Logo" width="150">
                    </div>

                    <h2 data-aos="fade-up"
                        class="font-space-grotesk text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-3">
                        <span x-text="lang === 'id' ? 'Lupa Kata Sandi?' : 'Forgot Password?'">Lupa Kata Sandi?</span>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="100"
                        class="font-roboto text-zinc-500 dark:text-zinc-400 text-sm sm:text-base leading-relaxed">
                        <span
                            x-text="lang === 'id' ? 'Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan pengaturan ulang kata sandi.' : 'No problem. Just let us know your email address and we will email you a password reset link.'">
                            Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan email
                            berisi tautan pengaturan ulang kata sandi.
                        </span>
                    </p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6 w-full">
                    @csrf

                    <div data-aos="fade-up" data-aos-delay="200" class="space-y-2">
                        <label for="email"
                            class="block font-space-grotesk text-sm font-bold text-zinc-700 dark:text-zinc-300"
                            x-text="lang === 'id' ? 'Alamat Email' : 'Email Address'">Alamat Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3.5 bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl placeholder-zinc-400 focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all outline-none font-roboto shadow-sm"
                            :placeholder="lang === 'id' ? 'contoh@email.com' : 'example@email.com'">
                        @error('email')
                        <p class="text-sm text-rose-500 font-roboto mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div data-aos="fade-up" data-aos-delay="300" class="pt-4">
                        <button type="submit"
                            class="w-full flex justify-center items-center gap-2 bg-violet-600 dark:bg-violet-600 text-white dark:text-white font-bold py-4 rounded-xl hover:bg-violet-500 dark:hover:bg-violet-500 hover:text-white dark:hover:text-white transition-all duration-300 shadow-lg hover:-translate-y-0.5 group">
                            <span class="font-space-grotesk"
                                x-text="lang === 'id' ? 'Kirim Tautan Reset' : 'Email Reset Link'">Kirim Tautan
                                Reset</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <div data-aos="fade-up" data-aos-delay="400"
                    class="mt-8 text-center border-t border-zinc-200 dark:border-zinc-800 pt-8">
                    <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400 font-roboto">
                        <span x-text="lang === 'id' ? 'Ingat kata sandi Anda?' : 'Remember your password?'">Ingat kata
                            sandi Anda?</span>
                        <a href="{{ route('login') }}"
                            class="font-bold text-violet-600 dark:text-violet-600 ml-1 hover:underline transition-all"
                            x-text="lang === 'id' ? 'Masuk di sini' : 'Sign in here'">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('statsCounter', () => ({
                karya: 0, targetKarya: 245,
                mahasiswa: 0, targetMahasiswa: 128,
                started: false,
                observe() {
                    let observer = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting && !this.started) {
                            this.started = true;
                            this.animate(this.targetKarya, 'karya');
                            this.animate(this.targetMahasiswa, 'mahasiswa');
                        }
                    }, { threshold: 0.5 });
                    observer.observe(this.$el);
                },
                animate(target, prop) {
                    let startTimestamp = null;
                    const duration = 2500;
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
            }));
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 20,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    </script>
</body>

</html>