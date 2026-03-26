<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 15 Mahasiswa Dummy
        $users = User::factory(15)->create();

        // 2. Buat 25 Proyek Karya, didistribusikan secara acak ke 15 mahasiswa tadi
        $projects = Project::factory(25)->recycle($users)->create();

        // 3. Simulasikan Interaksi (Komentar & Like)
        foreach ($projects as $project) {

            // Random: 0 sampai 5 komentar per proyek
            $commentCount = rand(0, 5);
            for ($i = 0; $i < $commentCount; $i++) {
                Comment::factory()->create([
                    'project_id' => $project->id,
                    'user_id' => $users->random()->id, // Dikomentari oleh mahasiswa acak
                ]);
            }

            // Random: 0 sampai 10 like per proyek
            $likeCount = rand(0, 10);
            $likers = $users->random($likeCount); // Ambil sejumlah mahasiswa acak

            foreach ($likers as $liker) {
                Like::create([
                    'project_id' => $project->id,
                    'user_id' => $liker->id,
                ]);
            }
        }
    }
}
