<?php

namespace App\Http\Controllers;

use App\Http\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{

    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request)
    {
        try {
            $this->commentService->save($request, Auth::user());
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
