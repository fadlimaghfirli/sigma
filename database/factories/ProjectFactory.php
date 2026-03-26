<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(4);

        // Daftar gambar estetis ala IT dari Unsplash
        $images = [
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1618477388954-7852f32655ec?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1200&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=1200&auto=format&fit=crop',
        ];

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title . '-' . Str::random(5)),
            'short_description' => fake()->paragraph(2),
            'content' => fake()->paragraphs(5, true),
            'category' => fake()->randomElement(['Tugas Akhir', 'Praktikum', 'Kompetisi', 'Riset Dasar']),
            'tags' => fake()->randomElements(['Laravel', 'React', 'Vue', 'Python', 'AI', 'IoT', 'UI/UX', 'Tailwind', 'Flutter'], rand(2, 4)),
            'image_url' => fake()->randomElement($images),
            'is_highlight' => fake()->boolean(20), // 20% kemungkinan masuk sorotan
            'views_count' => fake()->numberBetween(50, 2000),
            'demo_url' => fake()->boolean(70) ? fake()->url() : null, // 70% punya demo link
            'repo_url' => fake()->url(),
        ];
    }
}
