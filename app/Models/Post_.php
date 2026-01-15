<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
     private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "IDIL PUTRA",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "IDIL PUTRAsssssssssssssssssss",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod."
        ],
    ];

public static function all() {
    return collect(self::$blog_posts);

}

public static function find($slug) {
    $posts = static::all();
    return $posts ->firstWhere('slug', $slug);
}
}