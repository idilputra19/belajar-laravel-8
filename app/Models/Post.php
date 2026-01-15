<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;
   //fil   lable fields
    // protected $fillable = [
    //     'category_id',
    //     'title', 
    //     'excerpt', 
    //     'body', 
    //     'slug', 
    //     'author'       
    // ];

    protected $guarded = ['id']; //  tidak bisa di isi massal
    protected $with = ['category', 'author']; //eager loading otomatis setiap manggil model post


    public function category() {
        return $this->belongsTo(Category::class); //relasi many to one model post sudah berelasi dengan model category
    }
    public function author()
{
    // Ini memberitahu Laravel: 
    // "Post ini milik satu User, lihat kolom 'user_id' sebagai kuncinya"
    return $this->belongsTo(User::class , 'user_id');
    
}

}