<?php


namespace App\Http\Repositories;


use App\Models\Comment;

class CommentRepository
{

    protected $comment;

    public function __construct(Comment $comment){
        $this->comment = $comment;
    }

    public function save($validated){

        return $this->comment::create($validated);
    }

}
