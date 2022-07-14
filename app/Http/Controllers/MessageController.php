<?php

namespace App\Http\Controllers;

use App\Http\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }
    public function show()
    {
        return view("Admin.pages.messages", ["messages" => $this->messageService->getAll()]);
    }

    public function store(Request $request)
    {
        try {
            $this->messageService->save($request, Auth::user());
        } catch (ValidationException $e){
            $messages = [];
            foreach ($e->errors() as $error){

               for($i=0; $i < count($error); $i++){
                   array_push($messages, $error[$i]);
               }
            }
            return response()->json([
                'status' => false,
                'message' => $messages,
            ], 400);

        }
        return response()->json([
            'status' => true,
            'message' => 'Your data have been sent :)',
        ], 200);
    }

}
