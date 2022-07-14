<?php


namespace App\Http\Repositories;


use App\Models\Message;

class MessageRepository
{
    protected $message;

    public function __construct(Message $message){
        $this->message = $message;
    }

    public function getAll()
    {
        return $this->message::all();
    }

    public function save($validated){

        return $this->message::create($validated);

    }

    public function delete(){

    }
}
