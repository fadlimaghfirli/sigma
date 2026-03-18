<x-frontend-layout>
    <div class="pt-28 pb-24 flex flex-col gap-y-16 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 min-h-screen relative z-10">

        <section class="w-full text-center max-w-3xl mx-auto relative">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-emerald-500/20 dark:bg-emerald-600/20 blur-[100px] rounded-full z-0 pointer-events-none"></div>

            <div class="relative z-10">
                <span data-aos="fade-down"
                    class="font-mono text-emerald-600 dark:text-emerald-400 font-semibold tracking-widest text-xs sm:text-sm uppercase mb-6 block"
                    x-text="lang === 'id' ? 'TETAP TERHUBUNG' : 'STAY CONNECTED'">TETAP TERHUBUNG</span>

                <h1 data-aos="fade-up" data-aos-delay="100"
                    class="font-space-grotesk text-5xl md:text-6xl lg:text-7xl font-extrabold text-zinc-900 dark:text-white mb-6 tracking-tight">
                    <span x-text="lang === 'id' ? 'Mari Mulai' : 'Let\'s Start'">Mari Mulai</span><br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-violet-600"
                        x-text="lang === 'id' ? 'Percakapan.' : 'a Conversation.'">Percakapan.</span>
                </h1>

                <p data-aos="fade-up" data-aos-delay="200"
                    class="font-roboto text-zinc-600 dark:text-zinc-400 text-lg leading-relaxed"
                    x-text="lang === 'id' ? 'Punya pertanyaan seputar SIGMA, ingin berkolaborasi, atau sekadar menyapa? Jangan ragu untuk menghubungi tim kami melalui form atau media sosial di bawah ini.' : 'Have questions about SIGMA, want to collaborate, or just say hi? Feel free to reach out to our team via the form or social media below.'">
                    Punya pertanyaan seputar SIGMA, ingin berkolaborasi, atau sekadar menyapa? Jangan ragu untuk menghubungi tim kami.
                </p>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start relative z-10">
            
            <div class="lg:col-span-5 flex flex-col gap-10" data-aos="fade-right" data-aos-delay="300">
                <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2rem] border border-zinc-200 dark:border-zinc-800 shadow-sm">
                    <h3 class="font-space-grotesk text-2xl font-bold text-zinc-900 dark:text-white mb-6"
                        x-text="lang === 'id' ? 'Informasi Kontak' : 'Contact Information'">Informasi Kontak</h3>
                    
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="w-12 h-12 shrink-0 bg-violet-50 dark:bg-violet-900/20 text-violet-600 dark:text-violet-400 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-200">Email</p>
                                <p class="text-zinc-600 dark:text-zinc-400 text-sm font-roboto">hello@sigma-edu.com</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-12 h-12 shrink-0 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-zinc-900 dark:text-zinc-200" x-text="lang === 'id' ? 'Lokasi Kampus' : 'Campus Location'">Lokasi Kampus</p>
                                <p class="text-zinc-600 dark:text-zinc-400 text-sm font-roboto">Gedung Fakultas Ilmu Komputer,<br>Universitas Pendidikan</p>
                            </div>
                        </li>
                    </ul>

                    <hr class="my-8 border-zinc-200 dark:border-zinc-800">

                    <h3 class="font-space-grotesk text-xl font-bold text-zinc-900 dark:text-white mb-4"
                        x-text="lang === 'id' ? 'Media Sosial' : 'Social Media'">Media Sosial</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-violet-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path></svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-blue-500 hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7" data-aos="fade-left" data-aos-delay="400">
                
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" class="mb-6 bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-600 dark:text-emerald-400 px-4 py-3 rounded-xl flex justify-between items-center shadow-sm">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-emerald-600 dark:text-emerald-400 hover:opacity-75">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white dark:bg-zinc-900 p-8 md:p-10 rounded-[2rem] border border-zinc-200 dark:border-zinc-800 shadow-xl flex flex-col gap-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2 font-space-grotesk" x-text="lang === 'id' ? 'Nama Lengkap' : 'Full Name'">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required
                                class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all font-roboto outline-none" 
                                :placeholder="lang === 'id' ? 'Masukkan nama Anda' : 'Enter your name'">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2 font-space-grotesk">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all font-roboto outline-none" 
                                :placeholder="lang === 'id' ? 'alamat@email.com' : 'address@email.com'">
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2 font-space-grotesk" x-text="lang === 'id' ? 'Subjek' : 'Subject'">Subjek</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all font-roboto outline-none" 
                            :placeholder="lang === 'id' ? 'Apa yang ingin Anda diskusikan?' : 'What do you want to discuss?'">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2 font-space-grotesk" x-text="lang === 'id' ? 'Pesan' : 'Message'">Pesan</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all font-roboto outline-none resize-none" 
                            :placeholder="lang === 'id' ? 'Tuliskan pesan Anda di sini...' : 'Write your message here...'"></textarea>
                    </div>

                    <button type="submit" class="mt-2 w-full bg-violet-600 hover:bg-violet-700 text-white font-bold py-4 rounded-xl transition-colors shadow-lg shadow-violet-500/30 flex justify-center items-center gap-2 group">
                        <span x-text="lang === 'id' ? 'Kirim Pesan' : 'Send Message'">Kirim Pesan</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </form>
            </div>
        </section>
    </div>
</x-frontend-layout>