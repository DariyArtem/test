<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "phone",
        "surname",
        "country",
        "region",
        "city",
        "role_id",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        "password",
        "remember_token",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes["password"] = Hash::make($password);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class, "user_id")
            ->orderBy('updated_at', 'desc');
    }


    public function post(){
        return $this->hasMany(Book::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "user_id");
    }
    public function isAdmin()
    {
        return $this->role()->where("name", "Admin");
    }

    public static function checkRole($role_id)
    {
//В модели не должно быть логики!! Вынести в репозиторий
        if ($role_id === 1) {
            return "User";
        } elseif ($role_id === 2) {
            return "Admin";
        }

        return "Admin";
    }
}
