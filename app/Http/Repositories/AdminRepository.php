<?php


namespace App\Http\Repositories;


use App\Models\User;

class AdminRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save($validated, $id, $status)
    {
        $user = $this->user->find($id);
        $user->role_id = $validated["role"];
        $user->status = $status;
        $user->save();

       return $user->fresh();
    }

}
