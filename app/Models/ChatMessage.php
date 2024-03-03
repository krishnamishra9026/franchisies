<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

     protected $fillable = [
        'chat_id',
        'user_id',
        'flex',
        'message',
        'sender_reseptent',
        'message_from',
        'message_to',
        'sender',
        'file',
        'receiver',
    ];

    public function sender()
    {
       
    }


    public function reciver()
    {
       // code...
    }
}
