<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $prefix = ['Sistem Informasi', 'Aplikasi Mobile', 'Website Berita', 'Game Edukasi', 'Sistem Pakar', 'Platform E-Commerce', 'Dashboard Analitik', 'Sistem Pendeteksi AI', 'Media Pembelajaran Interaktif', 'Aplikasi Augmented Reality'];
        $suffix = ['Pendeteksi Penyakit Tanaman', 'Manajemen Rumah Sakit', 'Pemantauan Cuaca Berbasis IoT', 'Belajar Matematika Dasar', 'Pariwisata Lokal', 'Pengenalan Wajah', 'Manajemen Inventaris Gudang', 'Pendeteksi Hoaks', 'Pemilah Sampah Otomatis'];

        $title = fake()->randomElement($prefix) . ' ' . fake()->randomElement($suffix);

        $descriptions = [
            "Proyek ini bertujuan untuk memecahkan masalah efisiensi waktu dalam rutinitas sehari-hari menggunakan teknologi terbaru. Dibangun dengan fokus pada antarmuka pengguna yang bersih dan mudah dipahami.",
            "Karya ini adalah hasil dari penelitian selama 3 bulan mengenai perilaku pengguna internet. Aplikasi ini dilengkapi dengan algoritma pintar yang dapat merekomendasikan konten secara akurat.",
            "Sebuah platform inovatif yang dirancang khusus untuk membantu UMKM mendigitalkan bisnis mereka. Dilengkapi dengan fitur pelacakan inventaris secara real-time dan laporan penjualan otomatis.",
            "Fokus utama dari pengembangan perangkat lunak ini adalah aksesibilitas. Kami memastikan bahwa sistem ini dapat digunakan oleh semua kalangan, termasuk mereka yang memiliki keterbatasan visual.",
            "Ini adalah prototipe dari sistem keamanan cerdas berbasis Internet of Things (IoT). Sistem ini dapat dipantau langsung melalui smartphone dan akan memberikan notifikasi instan jika terdeteksi anomali."
        ];

        // ====================================================================
        // [MANUAL & BANYAK] DAFTAR 15 LINK GAMBAR PRODUK IT (MOCKUP/UI/UX)
        // Sudah Diverifikasi Visualnya Sesuai Tema
        // ====================================================================
        $images = [
            // Theme: Website & Landing Pages
            'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1502945015378-0e284ca1a5be?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1547658719-da2b51169166?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?q=80&w=1200&auto=format&fit=crop',

            // Theme: Dashboard & Information Systems
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1543286386-713bdd548da4?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1511376777868-611b54f68947?q=80&w=1200&auto=format&fit=crop',

            // Theme: Mobile Apps (iOS/Android UI)
            'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1551652640-696b97ac2923?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1581291518655-951832679813?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1603969403148-69c4b33a5d36?q=80&w=1200&auto=format&fit=crop',

            // Theme: Games & Digital Arts
            'https://images.unsplash.com/photo-1580894908361-967195033215?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1531591022136-eb8b0da1e6d0?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1200&auto=format&fit=crop',
        ];

        $shortDesc = fake()->randomElement($descriptions);

        return [
            'user_id' => User::factory(),
            'team_members' => fake()->boolean(40) ? [fake()->name(), fake()->name()] : null, // 40% kemungkinan proyek kelompok
            'title' => $title,
            'slug' => Str::slug($title . '-' . Str::random(5)),
            'short_description' => Str::limit($shortDesc, 120),
            'content' => $shortDesc . "\n\n" . "Selain itu, sistem ini juga dirancang agar scalable (mudah dikembangkan) di masa depan. Pengujian telah dilakukan kepada 50 responden dengan hasil kepuasan mencapai 92%.",
            'category' => fake()->randomElement(['Tugas Akhir', 'Praktikum', 'Kompetisi', 'Riset Dasar', 'Tugas Mata Kuliah']),
            'tags' => fake()->randomElements(['Laravel', 'React', 'Vue', 'Python', 'AI', 'IoT', 'UI/UX', 'Tailwind', 'Flutter', 'Data Science'], rand(2, 4)),

            // [DI SINI PERUBAHANNYA] Kembali ke cara manual & acak
            'image_url' => fake()->randomElement($images),

            'is_highlight' => fake()->boolean(20),
            'views_count' => fake()->numberBetween(50, 2000),
            'demo_url' => fake()->boolean(70) ? fake()->url() : null,
            'repo_url' => fake()->url(),
        ];
    }
}
