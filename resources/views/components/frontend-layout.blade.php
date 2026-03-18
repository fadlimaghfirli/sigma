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
    <title>SIGMA - Showcase Inovasi & Galeri Mahasiswa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        AOS.init({ once: true, offset: 60, duration: 900, easing: 'ease-out-cubic' });
    </script>
</body>

</html>