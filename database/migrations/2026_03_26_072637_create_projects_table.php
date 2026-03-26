<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relasi ke pembuat
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('content');
            $table->string('category');
            $table->json('tags'); // Menyimpan array teknologi: ["Laravel", "Python"]
            $table->string('image_url');
            $table->boolean('is_highlight')->default(false);
            $table->integer('views_count')->default(0);
            $table->string('demo_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
