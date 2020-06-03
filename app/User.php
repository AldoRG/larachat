<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['image'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function conversations()
    {
        return $this->hasMany('App\Conversation', 'sender_id')->orWhere('receiver_id', $this->id);
    }
    public function allConversations()
    {
        return Conversation::where('sender_id', $this->id)->orWhere('receiver_id', $this->id);
    }

    public function messagesFrom()
    {
        return $this->hasMany('App\Message')->where('from', auth()->id());
    }

    public function messagesTo()
    {
        return $this->hasMany('App\Message')->where('to', auth()->id());
    }

    public function getImageAttribute()
    {
        return "https://api.adorable.io/avatars/285/abott@{$this->id}.png";
    }

    public function chats()
    {
        return $this->belongsToMany(Conversation::class)->withPivot('new_messages');
    }
}
