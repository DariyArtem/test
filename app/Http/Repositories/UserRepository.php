<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save($validated){
        $user = User::create($validated);

        Auth::loginUsingId($user->id);
        return $user;
    }

    public function getAll()
    {
        return $this->user::all();
    }

    public function getBlogAuthorById($id)
    {
        return $this->user::where('role_id', $id)->first();
    }

    public function getUserById($id)
    {
        return $this->user::where("id", $id)->get();
    }

    public function update($validated, $imagePath){

        $user = $this->user::find(Auth::id());

        if ($imagePath !== '/'){

            Storage::delete($user->picture);
            $user->picture = $imagePath;

        }

        $user->name = $validated["name"];
        $user->surname = $validated["surname"];
        $user->phone = $validated["phone"];
        $user->country = $validated["country"];
        $user->region = $validated["region"];
        $user->city = $validated["city"];
        $user->about = $validated["about"];
        $user->save();

        return $user->fresh();

    }

}
