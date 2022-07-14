<?php


namespace App\Http\Services;
use App\Http\Repositories\MessageRepository;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function getAll()
    {
        return $this->messageRepository->getAll();
    }

    public function save($request, $user){

        if ($user !== null){
            $validated = $request->validate([
                "message" => "required|string|min:3",
            ]);

            $validated["name"] = $user->name." ".$user->surname;
            $validated["email"] = $user->email;
            $validated["number"] = $user->phone;

            return $this->messageRepository->save($validated);
        }

        $validated = $request->validate([
            "name" => "required|string|min:2",
            "email" => "required|string|min:12",
            "number" => "required||max:13|min:9",
            "message" => "required|string|min:3",
        ]);

        return $this->messageRepository->save($validated);
    }

    public function delete(){

    }

}
