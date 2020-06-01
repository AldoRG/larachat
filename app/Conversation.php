<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public $fillable = ['sender_id', 'receiver_id', 'new_messages'];
    public $timestamps = true;
    protected $with = ['receiver', 'sender'];

    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
