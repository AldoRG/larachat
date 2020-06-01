<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $fillable = ['sender_id', 'receiver_id', 'message', 'conversation_id'];
    public $timestamps = true;
    protected $appends = ['created'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function conversation()
    {
        return $this->belongsTo('App\Conversation');
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->format('h:i A, l');
        return $this->created_at->format('h:i A, l F jS');
    }
}
