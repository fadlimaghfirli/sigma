<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        $komentarID = [
            'Wah, keren banget projectnya! Sangat menginspirasi.',
            'UI/UX-nya rapi banget, mantap!',
            'Fiturnya sangat bermanfaat untuk masyarakat. Lanjutkan!',
            'Boleh tahu pakai library apa saja untuk animasinya?',
            'Karya yang luar biasa, sukses terus ya!',
            'Ide yang sangat *out of the box*! Bermanfaat banget.',
            'Desainnya modern dan responsif, *clean code* juga pastinya.',
            'Semoga bisa dikembangkan jadi startup beneran nih, *good job*!',
        ];

        return [
            'body' => fake()->randomElement($komentarID),
        ];
    }
}
