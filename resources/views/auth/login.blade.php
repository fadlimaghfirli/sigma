<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', lang: 'id' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SIGMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .mesh-gradient {
            background-color: #09090b;
            background-image: 
                radial-gradient(at 0% 0%, hsla(263,67%,33%,0.3) 0, transparent 50%), 
                radial-gradient(at 100% 100%, hsla(160,84%,39%,0.2) 0, transparent 50%);
        }
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="antialiased bg-white dark:bg-zinc-950 transition-colors duration-500">

    <main class="min-h-screen flex flex-col md:flex-row overflow-hidden">
        
        <div class="hidden md:flex md:w-1/2 lg:w-3/5 relative mesh-gradient items-center justify-center p-12 overflow-hidden">
            
            <div class="absolute inset-0 z-0 opacity-20"
                style="background-image: linear-gradient(#333 1px, transparent 1px), linear-gradient(90deg, #333 1px, transparent 1px); background-size: 50px 50px;">
            </div>

            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-violet-600/20 rounded-full filter blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[400px] h-[400px] bg-emerald-500/10 rounded-full filter blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>

            <div class="relative z-10 w-full max-w-2xl">
                <a href="/" class="inline-flex items-center gap-3 text-zinc-400 hover:text-white mb-16 group transition-all">
                    <div class="p-2 glass rounded-xl group-hover:bg-violet-600 group-hover:border-violet-500 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </div>
                    <span class="font-medium tracking-wide" x-text="lang === 'id' ? 'Kembali ke Beranda' : 'Back to Home'"></span>
                </a>
                
                <div class="space-y-8">
                    <div class="inline-block px-4 py-2 glass rounded-2 font-space-grotesk text-violet-400 text-sm font-bold tracking-widest uppercase mb-4">
                        Powered by SIGMA
                    </div>
                    
                    <h1 class="text-6xl lg:text-8xl font-space-grotesk font-bold text-white leading-none tracking-tighter">
                       Shaping the Future <br> 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 via-fuchsia-400 to-emerald-400">
                            of Academic.
                        </span>
                    </h1>

                    <p class="text-zinc-400 text-xl font-roboto max-w-md leading-relaxed">
                        <span x-text="lang === 'id' ? 'Kelola data akademik dan riset Anda dalam satu platform cerdas yang terintegrasi.' : 'Manage your academic and research data in one intelligent integrated platform.'"></span>
                    </p>

                    <div class="grid grid-cols-2 gap-4 mt-12">
                        <div class="glass p-6 rounded-2xl">
                            <div class="text-white text-2xl font-bold font-space-grotesk">15k+</div>
                            <div class="text-zinc-500 text-sm" x-text="lang === 'id' ? 'Mahasiswa Aktif' : 'Active Students'"></div>
                        </div>
                        <div class="glass p-6 rounded-2xl">
                            <div class="text-white text-2xl font-bold font-space-grotesk">99.9%</div>
                            <div class="text-zinc-500 text-sm" x-text="lang === 'id' ? 'Waktu Aktif' : 'System Uptime'"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-10 left-10 text-[10rem] font-bold text-white/[0.02] select-none pointer-events-none font-space-grotesk">
                SIGMA
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-2/5 flex flex-col relative bg-white dark:bg-zinc-950 p-8 sm:p-12 lg:p-24 justify-center">
            
            <div class="absolute top-8 right-8 flex items-center gap-3">
                <button @click="lang = lang === 'id' ? 'en' : 'id'" class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 dark:border-zinc-800 text-xs font-bold text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-all uppercase">
                    <span x-text="lang"></span>
                </button>

                <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" class="w-10 h-10 flex items-center justify-center rounded-xl border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-all">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
            </div>

            <div class="w-full max-w-sm mx-auto">
                <div class="md:hidden mb-8 text-violet-600 font-bold text-2xl tracking-tighter">SIGMA.</div>

                <div class="mb-10 text-left">
                    <h2 class="font-space-grotesk text-4xl font-bold text-zinc-900 dark:text-white mb-3" x-text="lang === 'id' ? 'Selamat Datang' : 'Welcome Back'"></h2>
                    <p class="font-roboto text-zinc-500 dark:text-zinc-400" x-text="lang === 'id' ? 'Silahkan masuk dengan akun kampus Anda.' : 'Please sign in with your campus account.'"></p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2" x-text="lang === 'id' ? 'Email Kampus' : 'Campus Email'"></label>
                        <input type="email" name="email" required class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-violet-500 outline-none transition-all">
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300" x-text="lang === 'id' ? 'Kata Sandi' : 'Password'"></label>
                            <a href="#" class="text-xs text-violet-600 dark:text-violet-400 hover:underline" x-text="lang === 'id' ? 'Lupa Sandi?' : 'Forgot?'"></a>
                        </div>
                        <input type="password" name="password" required class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-violet-500 outline-none transition-all">
                    </div>

                    <button type="submit" class="w-full bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-bold py-4 rounded-xl hover:bg-violet-600 dark:hover:bg-violet-400 transition-all shadow-lg">
                        <span x-text="lang === 'id' ? 'Masuk' : 'Sign In'"></span>
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-sm text-zinc-500">
                        <span x-text="lang === 'id' ? 'Belum punya akun?' : 'No account?'"></span>
                        <a href="{{ route('register') }}" class="font-bold text-violet-600 ml-1 hover:underline" x-text="lang === 'id' ? 'Daftar' : 'Register'"></a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>