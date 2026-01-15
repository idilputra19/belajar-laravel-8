<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


//mengunakan closure
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "IDIL PUTRA",
        "email" => "idilputra.com@gmail.com",
        "image" => "idil.jpg"
    ]);
});



//menggunakan controller
// --- BAGIAN YANG DIPERBAIKI (Hapus duplikasi) ---
Route::get('/posts', [postController::class, 'index']);

// --- BAGIAN SINGLE POST ---
//route model binding dengan slug
Route::get('/posts/{post:slug}', [postController::class, 'show']);
// --- SELESAI BAGIAN SINGLE POST ---

//kategori all categories
route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

//kategori
// Route Category (Penting: pakai view 'posts' saja biar tidak perlu bikin file baru)
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post by Category : $category->name",
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

//author
// Route::get('/authors/{user:username}', function (User $author) {
//     return view('posts', [
//         // Judul dinamis mengambil nama user
//         'title' => "Post By Author : $author->name",
        
//         // Gunakan load() untuk mencegah N+1 Problem
//         // Kita load 'category' dan 'author' agar query lebih cepat
//         'posts' => $author->posts->load('category', 'author'), 
//     ]);
// });

Route::get('/authors/{user:username}', function (User $author) {
    // HAPUS baris dd(...) yang tadi
    
    return view('posts', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author'),  // model eager lazy loading
    ]);
});