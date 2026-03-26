<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Project;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// RUTE HALAMAN BERANDA
Route::get('/', function () {
    // 1. Ambil 3 karya sorotan terbaru beserta data pembuatnya
    $highlights = Project::with('user')
        ->where('is_highlight', true)
        ->latest()
        ->take(3)
        ->get();

    // 2. Hitung statistik asli dari database
    $totalKarya = Project::count();
    $totalMahasiswa = User::has('projects')->count(); // Hitung mahasiswa yang punya karya saja
    $totalKategori = Project::distinct('category')->count();
    $totalKunjungan = round(Project::sum('views_count') / 1000, 1); // Format ribuan (K)

    // 3. Kirim semua data ke view 'welcome'
    return view('welcome', compact('highlights', 'totalKarya', 'totalMahasiswa', 'totalKategori', 'totalKunjungan'));
});

// RUTE HALAMAN GALERI (Dengan Search, Filter & Pagination)
Route::get('/gallery', function (\Illuminate\Http\Request $request) {
    // 1. Tambahkan withCount('likes')
    $query = Project::with('user')->withCount('likes')->latest();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
                ->orWhere('short_description', 'like', "%{$search}%")
                ->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%");
                });
        });
    }

    if ($request->has('category') && $request->category != '' && $request->category != 'Semua') {
        $query->where('category', $request->category);
    }

    $categories = Project::select('category')->distinct()->pluck('category');

    // 2. Tambahkan withCount('likes') juga di Sorotan
    $featuredProjects = Project::with('user')
        ->withCount('likes')
        ->where('is_highlight', true)
        ->latest()
        ->take(3)
        ->get();

    // 3. Tambahkan fragment('explore') agar otomatis scroll ke bawah saat pindah halaman
    $projects = $query->paginate(9)->withQueryString()->fragment('explore');

    return view('gallery', compact('projects', 'categories', 'featuredProjects'));
});

// ==========================================
// RUTE HALAMAN DETAIL & INTERAKSI
// ==========================================

// 1. Rute Halaman Detail Proyek
Route::get('/project/{slug}', function ($slug) {
    $project = Project::with(['user', 'comments.user'])->withCount('likes')->where('slug', $slug)->firstOrFail();

    $project->increment('views_count');

    // FITUR KARYA TERKAIT: Ambil 3 karya lain dengan kategori sama, kecuali karya ini sendiri
    $relatedProjects = Project::with('user')
        ->withCount('likes')
        ->where('category', $project->category)
        ->where('id', '!=', $project->id)
        ->latest()
        ->take(3)
        ->get();

    $hasLiked = false;
    if (Auth::check()) {
        $hasLiked = $project->likes()->where('user_id', Auth::id())->exists();
    }

    return view('project', compact('project', 'hasLiked', 'relatedProjects'));
});

// 2. Rute Tombol Like (Hanya untuk user yang sudah Login)
Route::post('/project/{id}/like', function ($id) {
    $like = Like::where('project_id', $id)->where('user_id', Auth::id())->first();

    if ($like) {
        $like->delete(); // Jika sudah like, maka klik lagi berarti "Unlike"
    } else {
        Like::create(['project_id' => $id, 'user_id' => Auth::id()]); // Jika belum, maka "Like"
    }

    // Kembali ke halaman sebelumnya dan turun ke bagian interaksi
    return back()->withFragment('interaction');
})->middleware('auth')->name('project.like');

// 3. Rute Kirim Komentar (Hanya untuk user yang sudah Login)
Route::post('/project/{id}/comment', function (Request $request, $id) {
    $request->validate(['body' => 'required|string|max:1000']);

    Comment::create([
        'project_id' => $id,
        'user_id' => Auth::id(),
        'body' => $request->body,
    ]);

    // Kembali ke halaman sebelumnya dan turun ke bagian komentar
    return back()->withFragment('comments');
})->middleware('auth')->name('project.comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/about', 'about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
