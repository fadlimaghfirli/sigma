<x-frontend-layout>
    <div class="pt-28 flex flex-col gap-y-32 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">

        <section class="w-full text-center max-w-4xl mx-auto relative">
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-violet-500/20 dark:bg-violet-600/20 blur-[100px] rounded-full z-0 pointer-events-none">
            </div>

            <div class="relative z-10">
                <span data-aos="fade-down"
                    class="font-mono text-violet-600 dark:text-violet-400 font-semibold tracking-widest text-xs sm:text-sm uppercase mb-6 block"
                    x-text="lang === 'id' ? 'DI BALIK LAYAR' : 'BEHIND THE SCENES'">DI BALIK LAYAR</span>

                <h1 data-aos="fade-up" data-aos-delay="100"
                    class="font-space-grotesk text-5xl md:text-7xl lg:text-8xl font-extrabold text-zinc-900 dark:text-white mb-8 tracking-tight">
                    <span x-text="lang === 'id' ? 'Membangun' : 'Building'">Membangun</span><br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-emerald-400"
                        x-text="lang === 'id' ? 'Masa Depan.' : 'the Future.'">Masa Depan.</span>
                </h1>

                <p data-aos="fade-up" data-aos-delay="200"
                    class="font-roboto text-zinc-600 dark:text-zinc-400 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto"
                    x-text="lang === 'id' ? 'SIGMA hadir untuk memberikan panggung digital yang layak bagi mahakarya mahasiswa Pendidikan Informatika. Kami merancang sistem ini bukan sekadar sebagai arsip, melainkan etalase inovasi yang mempertemukan talenta dengan peluang.' : 'SIGMA exists to provide a worthy digital stage for the masterpieces of Informatics Education students. We designed this system not just as an archive, but as an innovation showcase connecting talent with opportunities.'">
                    SIGMA hadir untuk memberikan panggung digital yang layak bagi mahakarya mahasiswa Pendidikan
                    Informatika. Kami merancang sistem ini bukan sekadar sebagai arsip, melainkan etalase inovasi yang
                    mempertemukan talenta dengan peluang.
                </p>
            </div>
        </section>

        <section class="w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-8 items-start">

                <div class="lg:col-span-5 lg:sticky lg:top-32" data-aos="fade-right">
                    <div
                        class="w-16 h-16 bg-violet-100 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="font-space-grotesk text-3xl md:text-5xl font-bold text-zinc-900 dark:text-white mb-6"
                        x-text="lang === 'id' ? 'Visi Kami' : 'Our Vision'">Visi Kami</h2>
                    <p class="font-roboto text-zinc-600 dark:text-zinc-400 text-lg md:text-xl leading-relaxed"
                        x-text="lang === 'id' ? 'Menjadi pusat repositori dan galeri digital terdepan yang menginspirasi pengembangan teknologi edukasi, serta menjadi jembatan utama yang menghubungkan kreativitas mahasiswa dengan kebutuhan nyata di era industri digital.' : 'To become the leading digital repository and gallery inspiring educational technology development, and to act as the main bridge connecting student creativity with real needs in the digital industry era.'">
                        Menjadi pusat repositori dan galeri digital terdepan yang menginspirasi pengembangan teknologi
                        edukasi, serta menjadi jembatan utama yang menghubungkan kreativitas mahasiswa dengan kebutuhan
                        nyata di era industri digital.
                    </p>
                </div>

                <div class="lg:col-span-7 flex flex-col gap-8">
                    <h3 class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white border-b border-zinc-200 dark:border-zinc-800 pb-4"
                        x-text="lang === 'id' ? 'Langkah Misi' : 'Our Missions'">Langkah Misi</h3>

                    <div data-aos="fade-up" data-aos-delay="0" class="flex gap-6 items-start group">
                        <div
                            class="font-space-grotesk text-4xl font-black text-zinc-200 dark:text-zinc-800 group-hover:text-emerald-500 transition-colors">
                            01</div>
                        <div>
                            <h4 class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2"
                                x-text="lang === 'id' ? 'Dokumentasi Profesional' : 'Professional Documentation'">
                                Dokumentasi Profesional</h4>
                            <p class="font-roboto text-zinc-600 dark:text-zinc-400 leading-relaxed"
                                x-text="lang === 'id' ? 'Mendokumentasikan karya inovatif, purwarupa, dan aplikasi mahasiswa secara terstruktur agar mudah diakses dan dijadikan referensi lintas angkatan.' : 'Documenting student innovative works, prototypes, and applications in a structured manner for easy access and cross-batch references.'">
                                Mendokumentasikan karya inovatif mahasiswa secara terstruktur.</p>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="100" class="flex gap-6 items-start group">
                        <div
                            class="font-space-grotesk text-4xl font-black text-zinc-200 dark:text-zinc-800 group-hover:text-violet-500 transition-colors">
                            02</div>
                        <div>
                            <h4 class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2"
                                x-text="lang === 'id' ? 'Peningkatan Kualitas' : 'Quality Improvement'">Peningkatan
                                Kualitas</h4>
                            <p class="font-roboto text-zinc-600 dark:text-zinc-400 leading-relaxed"
                                x-text="lang === 'id' ? 'Mendorong peningkatan standar desain antarmuka (UI/UX) dan pengembangan sistem yang relevan dengan tren teknologi industri saat ini.' : 'Encouraging the improvement of UI/UX design standards and system development relevant to current industrial technology trends.'">
                                Mendorong peningkatan standar desain antarmuka (UI/UX) dan pengembangan sistem.</p>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="200" class="flex gap-6 items-start group">
                        <div
                            class="font-space-grotesk text-4xl font-black text-zinc-200 dark:text-zinc-800 group-hover:text-blue-500 transition-colors">
                            03</div>
                        <div>
                            <h4 class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-2"
                                x-text="lang === 'id' ? 'Apresiasi & Kolaborasi' : 'Appreciation & Collaboration'">
                                Apresiasi & Kolaborasi</h4>
                            <p class="font-roboto text-zinc-600 dark:text-zinc-400 leading-relaxed"
                                x-text="lang === 'id' ? 'Memfasilitasi apresiasi dari masyarakat luas serta membuka peluang kolaborasi dengan pihak industri dan institusi terkait lainnya.' : 'Facilitating appreciation from the general public and opening opportunities for collaboration with industry and related institutions.'">
                                Memfasilitasi apresiasi dari masyarakat luas serta membuka peluang kolaborasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="w-full">
            <div class="text-center mb-16">
                <h2 data-aos="fade-up"
                    class="font-space-grotesk text-3xl md:text-5xl font-bold text-zinc-900 dark:text-white"
                    x-text="lang === 'id' ? 'Tim Pengembang' : 'Development Team'">Tim Pengembang</h2>
                <p data-aos="fade-up" data-aos-delay="100"
                    class="text-zinc-500 dark:text-zinc-400 mt-4 font-roboto max-w-2xl mx-auto"
                    x-text="lang === 'id' ? 'Inovator di balik perancangan dan penjaminan mutu sistem SIGMA.' : 'Innovators behind the design and quality assurance of the SIGMA system.'">
                    Inovator di balik perancangan dan penjaminan mutu sistem SIGMA.</p>
            </div>

            <div class="flex flex-col gap-8 w-full max-w-4xl mx-auto mb-10">
                <div data-aos="fade-up"
                    class="flex flex-col sm:flex-row items-center gap-6 sm:gap-10 bg-white dark:bg-zinc-900 p-6 sm:p-8 rounded-[2rem] border border-zinc-200 dark:border-zinc-800 shadow-sm hover:shadow-lg transition-shadow">
                    <div
                        class="w-32 h-32 shrink-0 bg-zinc-100 dark:bg-zinc-800 rounded-full border-4 border-zinc-50 dark:border-zinc-950 overflow-hidden shadow-inner">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fadli&backgroundColor=8b5cf6"
                            alt="Fadli Maghfirli" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3 gap-2">
                            <h3 class="font-space-grotesk font-bold text-2xl text-zinc-900 dark:text-white">Fadli
                                Maghfirli</h3>
                            <span
                                class="inline-block px-3 py-1 bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-400 rounded-full text-xs font-mono font-bold tracking-widest w-max mx-auto sm:mx-0">PROJECT
                                LEAD</span>
                        </div>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm font-roboto mb-4"
                            x-text="lang === 'id' ? 'Mahasiswa Pendidikan Informatika. Mengarahkan arsitektur Fullstack Web dan membangun logika sistem yang kokoh menggunakan Laravel.' : 'Informatics Education student. Directs Fullstack Web architecture and builds robust system logic using Laravel.'">
                            Mahasiswa Pendidikan Informatika. Mengarahkan arsitektur Fullstack Web dan membangun logika
                            sistem yang kokoh menggunakan Laravel.
                        </p>
                        <div class="flex items-center justify-center sm:justify-start gap-4">
                            <a href="#" class="text-zinc-400 hover:text-violet-600 transition-colors"
                                aria-label="GitHub"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg></a>
                            <a href="#" class="text-zinc-400 hover:text-violet-600 transition-colors"
                                aria-label="Instagram"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"></rect>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                </svg></a>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="100"
                    class="flex flex-col sm:flex-row items-center gap-6 sm:gap-10 bg-white dark:bg-zinc-900 p-6 sm:p-8 rounded-[2rem] border border-zinc-200 dark:border-zinc-800 shadow-sm hover:shadow-lg transition-shadow">
                    <div
                        class="w-32 h-32 shrink-0 bg-zinc-100 dark:bg-zinc-800 rounded-full border-4 border-zinc-50 dark:border-zinc-950 overflow-hidden shadow-inner">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Aditya&backgroundColor=10b981"
                            alt="M. Aditya Firmansyah" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3 gap-2">
                            <h3 class="font-space-grotesk font-bold text-2xl text-zinc-900 dark:text-white">M. Aditya
                                Firmansyah</h3>
                            <span
                                class="inline-block px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-mono font-bold tracking-widest w-max mx-auto sm:mx-0">UI/UX
                                DESIGNER</span>
                        </div>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm font-roboto mb-4"
                            x-text="lang === 'id' ? 'Mahasiswa Pendidikan Informatika. Menyajikan pengalaman pengguna yang intuitif serta tata letak visual modern menggunakan TailwindCSS.' : 'Informatics Education student. Presents an intuitive user experience and modern visual layout using TailwindCSS.'">
                            Mahasiswa Pendidikan Informatika. Menyajikan pengalaman pengguna yang intuitif serta tata
                            letak visual modern menggunakan TailwindCSS.
                        </p>
                        <div class="flex items-center justify-center sm:justify-start gap-4">
                            <a href="#" class="text-zinc-400 hover:text-emerald-500 transition-colors"
                                aria-label="GitHub"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg></a>
                            <a href="#" class="text-zinc-400 hover:text-emerald-500 transition-colors"
                                aria-label="Instagram"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"></rect>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                </svg></a>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="flex flex-col sm:flex-row items-center gap-6 sm:gap-10 bg-white dark:bg-zinc-900 p-6 sm:p-8 rounded-[2rem] border border-zinc-200 dark:border-zinc-800 shadow-sm hover:shadow-lg transition-shadow">
                    <div
                        class="w-32 h-32 shrink-0 bg-zinc-100 dark:bg-zinc-800 rounded-full border-4 border-zinc-50 dark:border-zinc-950 overflow-hidden shadow-inner">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti&backgroundColor=3b82f6"
                            alt="Siti Masruroh" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3 gap-2">
                            <h3 class="font-space-grotesk font-bold text-2xl text-zinc-900 dark:text-white">Siti
                                Masruroh</h3>
                            <span
                                class="inline-block px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-full text-xs font-mono font-bold tracking-widest w-max mx-auto sm:mx-0">SYSTEM
                                ANALYST</span>
                        </div>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm font-roboto mb-4"
                            x-text="lang === 'id' ? 'Mahasiswa Pendidikan Informatika. Bertanggung jawab atas alur kebutuhan sistem dan pengujian kelayakan agar platform berjalan stabil.' : 'Informatics Education student. Responsible for system requirements flow and feasibility testing to ensure the platform runs stably.'">
                            Mahasiswa Pendidikan Informatika. Bertanggung jawab atas alur kebutuhan sistem dan pengujian
                            kelayakan agar platform berjalan stabil.
                        </p>
                        <div class="flex items-center justify-center sm:justify-start gap-4">
                            <a href="#" class="text-zinc-400 hover:text-blue-500 transition-colors"
                                aria-label="GitHub"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg></a>
                            <a href="#" class="text-zinc-400 hover:text-blue-500 transition-colors"
                                aria-label="Instagram"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"></rect>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                </svg></a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-frontend-layout>