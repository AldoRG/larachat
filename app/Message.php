<?php

namespace App;

use App\Events\MessageSent;
use Illuminate\Database\Eloquent\Model;
use function foo\func;

class Message extends Model
{
    public $fillable = ['user_id', 'receiver_id', 'message', 'conversation_id'];
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

    public function sendMessageNotifications()
    {
        $user_id = $this->user_id;
        $conversation = Conversation::with(['users' => function($query) use ($user_id){
            $query->where('user_id', '!=', $user_id);
        }])->find($this->conversation_id);
        foreach ($conversation->users as $user) {
            $this->target = $user->id;
            broadcast(new MessageSent($this));
        }
    }
}
