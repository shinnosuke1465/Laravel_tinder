<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChatRoomUser;
use App\Models\ChatMessage;

class ChatRoom extends Model
{
    use HasFactory;
    public function chatRoomUsers()
    {
        return $this->hasMany(ChatRoomUser::class);
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
