<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view("pages.profileSettings", ["user" => $this->userService->getUserById(Auth::id())]);
    }

    public function update(Request $request)
    {
        try {
            $this->userService->updateUser($request);
        } catch (ValidationException $e) {
            $messages = [];
            foreach ($e->errors() as $error) {
                for ($i = 0; $i < count($error); $i++) {
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
