<?php


namespace App\Http\Services;


use App\Http\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService
{

    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function save($request, $user)
    {
        if ($user !== null) {

            $validated = $request->validate([
                "message" => "required|string|min:3",
                "post_id" => "required",
                "user_id" => "required|int",
            ]);

            $validated["name"] = $user->name." ".$user->surname;
            $validated["email"] = $user->email;
            $validated["number"] = $user->phone;

            return $this->commentRepository->save($validated);
        }
        $validated = $request->validate([
            "name" => "required|string|min:2",
            "email" => "required|string|min:12",
            "number" => "required|string|min:9|max:13",
            "message" => "required|string|min:2",
            "post_id" => "required",
        ]);
        return $this->commentRepository->save($validated);
    }
}
