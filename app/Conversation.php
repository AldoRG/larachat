<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public $fillable = ['sender_id', 'receiver_id', 'new_messages', 'name', 'image'];
    public $timestamps = true;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chat()
    {
        return $this->hasMany(ConversationUser::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getImageAttribute($value)
    {
        if (is_null($value))
            return $this->users()->orderBy('id', 'DESC')->first()->image;
        return $value;
    }
}
