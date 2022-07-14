<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $table = "favourites";

    protected $fillable = [
        "user_id",
        "post_id",
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function post()
    {
        return $this->hasMany(Book::class, 'post_id');
    }
}
