<footer class="bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-800 pt-16 pb-8 mt-auto w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8 mb-12">
            <div class="md:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('logo_sigma.png') }}" alt="brand logo" class="w-32 h-8">
                    </a>
                    {{-- <div
                        class="w-8 h-8 rounded bg-violet-600 flex items-center justify-center text-white font-space-grotesk font-bold text-xl">
                        S</div>
                    <span
                        class="font-space-grotesk font-bold text-xl tracking-tight text-zinc-900 dark:text-white">SIGMA</span> --}}
                </div>
                <p class="font-roboto text-sm text-zinc-600 dark:text-zinc-400 max-w-sm mb-6 leading-relaxed"
                    x-text="lang === 'id' ? 'Platform edukasi dan pameran inovasi digital karya mahasiswa Prodi Pendidikan Informatika. Mewadahi kreativitas, menginspirasi generasi.' : 'Educational platform and digital innovation exhibition for Informatics Education students. Fostering creativity, inspiring generations.'">
                    Platform edukasi dan pameran inovasi digital karya mahasiswa Pendidikan Informatika. Mewadahi
                    kreativitas, menginspirasi generasi.
                </p>

                <div class="flex items-center gap-4">
                    <a href="https://pif.trunojoyo.ac.id/" target="_blank"
                        class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-violet-600 hover:text-white dark:hover:bg-violet-500 dark:hover:text-white transition-all shadow-sm"><svg
                            class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg></a>
                    <a href="https://www.instagram.com/pif.utm/" target="_blank"
                        class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-violet-600 hover:text-white dark:hover:bg-violet-500 dark:hover:text-white transition-all shadow-sm"><svg
                            class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></rect>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg></a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-violet-600 hover:text-white dark:hover:bg-violet-500 dark:hover:text-white transition-all shadow-sm"><svg
                            class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg></a>
                </div>
            </div>

            <div>
                <h3 class="font-space-grotesk font-bold text-zinc-900 dark:text-zinc-50 mb-4"
                    x-text="lang === 'id' ? 'Navigasi' : 'Navigation'">Navigasi</h3>
                <ul class="space-y-3 text-sm font-roboto">
                    <li><a href="{{ url('/') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Beranda' : 'Home'">Beranda</a></li>
                    <li><a href="{{ url('/about') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Tentang SIGMA' : 'About SIGMA'">Tentang SIGMA</a></li>
                    <li><a href="{{ url('/gallery') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Galeri Karya' : 'Project Gallery'">Galeri Karya</a></li>
                    <li><a href="{{ url('/contact') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Hubungi Kami' : 'Contact Us'">Hubungi Kami</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-space-grotesk font-bold text-zinc-900 dark:text-zinc-50 mb-4"
                    x-text="lang === 'id' ? 'Akses' : 'Access'">Akses</h3>
                <ul class="space-y-3 text-sm font-roboto">
                    <li><a href="{{ route('login') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Masuk Akun' : 'Login'">Masuk Akun</a></li>
                    <li><a href="{{ route('register') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Daftar Mahasiswa' : 'Student Register'">Daftar Mahasiswa</a></li>
                    <li><a href="{{ url('/#faq') }}"
                            class="text-zinc-600 dark:text-zinc-400 hover:text-violet-600 dark:hover:text-violet-600 transition"
                            x-text="lang === 'id' ? 'Bantuan (FAQ)' : 'Help (FAQ)'">Bantuan (FAQ)</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-zinc-200 dark:border-zinc-800 text-center text-xs text-zinc-500 font-roboto">
            &copy; 2026 SIGMA - <span
                x-text="lang === 'id' ? 'Pendidikan Informatika' : 'Informatics Education'">Pendidikan
                Informatika</span>. All rights reserved.
        </div>
    </div>
</footer>