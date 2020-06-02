<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\ConversationUser;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index($user_id)
    {
        $user = User::with('chats.users')->find($user_id);
        foreach($user->chats as $chat){
            if (is_null($chat->name)) {
                $chat->name = $chat->users->where('id', '!=', $user_id)->first()->name;
            }
        }
        return response()->json($user->chats);
    }

    public function clearNewMessages($conversation_id)
    {
        $conversation = Conversation::find($conversation_id);
        $conversation->new_messages = 0;
        $conversation->save();
        return response()->json('cleared');
    }

    public function getContacts(Request $request)
    {
        $contacts = User::where('name', 'like', '%'.$request->name.'%')->get();
        return response()->json($contacts);
    }
}
