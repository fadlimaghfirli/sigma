<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
        darkMode: localStorage.getItem('darkMode') === 'true',
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
    <title>SIGMA - Showcase Inovasi & Galeri Mahasiswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="module" src="https://cdn.jsdelivr.net/npm/@hotwired/turbo@8.0.4/dist/turbo.es2017-umd.js"></script>

    <script>
        document.addEventListener("turbo:load", function() {
            // Memaksa progress bar muncul tanpa delay (0 ms)
            if (window.Turbo) {
                Turbo.setProgressBarDelay(0);
            }
        });
    </script>

    <style>
        .turbo-progress-bar {
            height: 3px !important;
            background-color: #8b5cf6 !important;
            /* Warna violet utama SIGMA */
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.8), 0 0 5px rgba(139, 92, 246, 0.5);
            z-index: 99999 !important;
            /* Tambahkan efek transisi agar pergerakan bar lebih terlihat mulus dan tidak langsung menghilang */
            transition: width 300ms ease-out, opacity 150ms 150ms ease-in !important;
        }
    </style>
</head>

<body
    class="font-roboto antialiased text-zinc-900 bg-zinc-50 dark:bg-zinc-950 dark:text-zinc-50 transition-colors duration-300 selection:bg-violet-500 selection:text-white flex flex-col min-h-screen relative">

    <x-navbar />

    <main class="flex-grow pb-16">
        {{ $slot }}
    </main>

    <x-footer />

    <button x-data="{ showScrollTop: false }" @scroll.window="showScrollTop = (window.pageYOffset > 400)"
        x-show="showScrollTop" @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-10"
        class="fixed bottom-8 right-8 z-50 p-3 bg-violet-600 text-white rounded-full shadow-lg shadow-violet-500/30 hover:bg-violet-700 hover:-translate-y-1 transition-all focus:outline-none"
        aria-label="Scroll to top" x-cloak>
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Event 'turbo:load' akan dipicu setiap kali halaman diganti tanpa reload tab
        document.addEventListener("turbo:load", function() {
            AOS.init({
                once: true,
                offset: 20,
                duration: 800,
                easing: 'ease-out-cubic',
            });
        });
    </script>

    <script>
        // 1. Tepat sebelum pindah halaman, matikan efek scroll-smooth
        document.addEventListener('turbo:before-visit', () => {
            document.documentElement.classList.remove('scroll-smooth');
        });

        // 2. Saat halaman baru dimuat, paksa ke atas dan nyalakan lagi efeknya
        document.addEventListener('turbo:load', () => {
            // Paksa scroll ke paling atas secara instan
            window.scrollTo(0, 0);
            
            // Beri jeda sangat kecil sebelum menyalakan ulang smooth scroll
            // agar perintah scrollTo di atas benar-benar dieksekusi secara instan
            setTimeout(() => {
                document.documentElement.classList.add('scroll-smooth');
                
                // Refresh AOS agar mendeteksi posisi baru dari paling atas
                if (typeof AOS !== 'undefined') {
                    AOS.refresh();
                }
            }, 10);
        });
    </script>
</body>

</html>