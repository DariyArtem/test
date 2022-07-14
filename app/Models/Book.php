<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $table = "posts";

    protected $fillable = [
        "title",
        "img_path",
        "description",
        "price",
        "author",
        "category_id",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "post_id");
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function favourite()
    {
        return $this->belongsTo(Favourite::class, "post_id");
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

}
