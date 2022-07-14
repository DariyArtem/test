<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = "post_category";

    protected $fillable = [
        "category_id",
        "post_id",
    ];

    public function posts()
    {
        return $this->hasMany(Book::class, "post_id");
    }

    public function categories()
    {
        return $this->hasMany(Category::class, "category_id");
    }
}
