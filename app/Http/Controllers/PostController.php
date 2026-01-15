<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            "title" => "All Posts",
           // "posts" => Post::all()
            "posts" => Post::latest()->get()
        ]);
    }


    // --- BAGIAN SINGLE POST ---
    //  Menggunakan Route Model Binding
    // keterangan: variabel $post diambil dari parameter {post} di route
    public function show(Post $post) {

        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
