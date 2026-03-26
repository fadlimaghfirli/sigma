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
            'https://images.unsplash.com/photo-1642132652809-8c6ab1971169?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1648134859177-66e35b61e106?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1566241477600-ac026ad43874?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1686061594225-3e92c0cd51b0?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1642052502978-b6c6ea3c3797?q=80&w=1200&auto=format&fit=crop',

            // Theme: Dashboard & Information Systems
            'https://images.unsplash.com/photo-1763718528755-4bca23f82ac3?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1763718432504-7716caff6e99?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop',

            // Theme: Mobile Apps (iOS/Android UI)
            'https://images.unsplash.com/photo-1720135885002-a19131beb73c?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1767449441925-737379bc2c4d?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1767449356630-c60094b1d1b4?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1767449181027-dbca7575f91b?q=80&w=1200&auto=format&fit=crop',

            // Theme: Games & Digital Arts
            'https://images.unsplash.com/photo-1587573089734-09cb69c0f2b4?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1551650975-87deedd944c3?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1620287341639-d141a3a15cfd?q=80&w=1200&auto=format&fit=crop',
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
